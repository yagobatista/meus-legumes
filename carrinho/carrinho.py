from decimal import Decimal
from django.conf import settings
from vendas.models import Produto

class Carrinho(object):

    def __init__(self, request):
        """ Initializa o carrinho de compras. """

        # Para que a sessão possa ser acessada por outros métodos
        self.session = request.session

        # recupera o carrinho da sessão e o salva na variável de instância carrinho
        self.carrinho = self.session.get(settings.CARRINHO_SESSION_ID)

        # Se a sessão não tiver um carrinho
        if not self.carrinho:
            # cria um carrinho vazio e o salva na sessão, e na variável de instância carrinho.
            # carrinho é um dicionário que irá conter pares de chave e valor. A chave será o id de um produto
            # e o valor será um dicionário contendo quantidade e preço.
            self.carrinho = self.session[settings.CARRINHO_SESSION_ID] = {}

        # Observação:
        # -----------
        # Nosso dicionário para o carrinho deve utilizar ids dos produtos como chaves e um dicionário com quantidade
        # e preço como valor, para cada chave. Fazendo isso, podemos garantir que um produto não é adicionado mais de
        # uma vez no carrinho.
        #
        # print(carrinho)  # {1: {'quantidade': 10, 'preco': '100'}}

    def __len__(self):
        """ Conta todos os itens no carrinho. """

        return sum(item['quantidade'] for item in self.carrinho.values())

    def get_lista_de_itens_de_carrinho(self):
        """ Retorna uma lista de itens de carrinho. """

        #   {'1': {'id': 1, 'quantidade': 5, 'preco': '100'},
        #    '2': {'id': 2, 'quantidade': 3, 'preco': '200'}}

        lista = []
        for item in self.carrinho.values():
            produto = Produto.objects.get(id=item['id'])
            lista.append({'id': item['id'],
                          'quantidade': item['quantidade'],
                          'preco': Decimal(item['preco']),
                          'preco_total': item['quantidade'] * Decimal(item['preco']),
                          'produto': produto})
        return lista
        #   [{'id': 1, 'quantidade': 5, 'preco': 100, 'produto': obj_produto1, 'preco_total': 500},
        #    {'id': 2, 'quantidade': 3, 'preco': 200, 'produto': obj_produto2, 'preco_total': 600}}]


    def adicionar(self, produto, quantidade=1, atualiza_quantidade=False):
        """ Adiciona um produto ao carrinho ou atualiza suas quantidades. """

        produto_id = str(produto.id)

        if produto_id not in self.carrinho:
            self.carrinho[produto_id] = {'id': produto_id, 'quantidade': 0, 'preco': str(produto.preco) }

        if atualiza_quantidade:
            self.carrinho[produto_id]['quantidade'] = quantidade
        else:
            self.carrinho[produto_id]['quantidade'] += quantidade

        self.salvar()        # O método salvar é chamado para que o carrinho seja salvo na sessão


    def remover(self, produto):
        """ Remove a produto from the carrinho. """

        produto_id = str(produto.id)

        if produto_id in self.carrinho:
            del self.carrinho[produto_id]
            self.salvar()   # O método salvar é chamado para que o carrinho seja salvo na sessão

    # Nós utilizamos o id do produto como chave no carrinho. Convertemos o ID do produto em um string uma vez que o
    # Django utiliza JSON para serializar dados da sessão e o JSON apenas permite strings. O ID do produto é a chave
    # e o valor que persistimos é um dicionário com quantidade e preço para o produto. O preço do produto é convertido
    # de decimal em string para ser serializado. Finalmente, chamamos o método salvar para salvar o carrinho na sessão.
    # O método salvar salva na sessão todas as mudanças efetuadas no carrinho e marca a sessão como modificada
    # utilizando session.modified = true. Isto diz ao Django que a sessão foi modificada e que necessita ser salva.

    def salvar(self):
        # atualiza o carrinho na sessão
        self.session[settings.CARRINHO_SESSION_ID] = self.carrinho

        # marca a sessão como "modificada" para ter certeza que ela será salva
        self.session.modified = True

    def limpar(self):
        # esvazia o carrinho
        self.session[settings.CARRINHO_SESSION_ID] = {}
        self.session.modified = True

    def get_preco_total(self):
        return sum(Decimal(item['preco']) * item['quantidade'] for item in self.carrinho.values())
