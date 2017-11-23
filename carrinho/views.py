# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render,redirect,get_object_or_404
from .carrinho import Carrinho
from vendas.models import Produto
from .forms import FormAddCarrinho
# Create your views here.
def adicionar(request):
    if request.method == 'POST':
        carrinho = Carrinho(request)

        # a view valida o formulário
        form = FormAddCarrinho(request.POST)
        if form.is_valid():  # executa as rotinas de validação para todos os campos do formulário. Quando este método
                             # é chamado, se todos os campos tiverem dados válidos ele irá:
                             # - retornar True
                             # - colocar os dados do form no atributo cleaned_data do formulário
            cd = form.cleaned_data
            produto = Produto.objects.get(id=cd['id_produto'])
            # Se o formulário for válido, adicionamos ou atualizamos o
            # produto no carrinho na qtd informada.
            carrinho.adicionar(produto=produto,
                     quantidade=cd['quantidade'],
                     atualiza_quantidade=cd['atualizar'])
        # A view redireciona para o detalhes_do_carrinho URL que irá exibir o conteúdo do carrinho.
        return redirect('carrinho:detalhes_do_carrinho') # Este redirect fará com que a requisição seja redirecionada
                                                         # para http://127.0.0.1:8000/carrinho
def detalhes_do_carrinho(request):
    # recupera o carrinho que está armazenado na sessão
    carrinho = Carrinho(request)  # Cria o objeto carrinho que irá conter em uma variável de instância carrinho,
                                  # o carrinho de compras armazenado o objeto sessão.
    # carrinho:
    # ========
    #   {'1': {'id': 1, 'quantidade': 5, 'preco': '100'},
    #    '2': {'id': 2, 'quantidade': 3, 'preco': '200'}}

    lista = carrinho.get_lista_de_itens_de_carrinho()

    # lista:
    # =====
    #   [{'id': 1, 'quantidade': 5, 'preco': 100, 'preco_total': 500, 'produto': obj_produto1},
    #    {'id': 2, 'quantidade': 3, 'preco': 200, 'preco_total': 600, 'produto': obj_produto2}}]

    for item in lista:
        item['atualizar_quantidade_form'] = FormAddCarrinho(
            initial={'quantidade': item['quantidade'], 'atualizar': True})

    # lista:
    # =====
    #   [{'id': 1, 'quantidade': 5, 'preco': 100, 'preco_total': 500, 'produto': obj_produto1, 'atualizar_quantidade_form' : obj_form1},
    #    {'id': 2, 'quantidade': 3, 'preco': 200, 'preco_total': 600, 'produto': obj_produto2, 'atualizar_quantidade_form' : obj_form2}}]

    return render(request, 'carrinho/exibe.html', {'carrinho': carrinho, 'lista': lista})


def remover_do_carrinho(request, id_produto):
    # recuperamos o carrinho que se encontra na sessão
    carrinho = Carrinho(request)
    # recuperamos o produto do BD
    produto = get_object_or_404(Produto, id=id_produto)
    # removemos o produto do carrinho
    carrinho.remover(produto)
    # redirecionamos para detalhes_do_carrinho
    return redirect('carrinho:detalhes_do_carrinho')
