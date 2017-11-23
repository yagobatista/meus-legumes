# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render
from .carrinho import Carrinho
from vendas.models import Produto
from .forms import FormAddCarrinho
# Create your views here.
def adicionar(request):
    if request.method == 'POST':
        carrinho = Carrinho(request)
        produto = get_object_or_404(Produto, id=id_produto)
        # a view valida o formulário
        form = FormAddCarrinho(request.POST)
        if form.is_valid():  # executa as rotinas de validação para todos os campos do formulário. Quando este método
                             # é chamado, se todos os campos tiverem dados válidos ele irá:
                             # - retornar True
                             # - colocar os dados do form no atributo cleaned_data do formulário
            cd = form.cleaned_data

            # Se o formulário for válido, adicionamos ou atualizamos o
            # produto no carrinho na qtd informada.
            carrinho.adicionar(produto=produto,
                     quantidade=cd['quantidade'],
                     atualiza_quantidade=cd['atualizar'])
        # A view redireciona para o detalhes_do_carrinho URL que irá exibir o conteúdo do carrinho.
        return redirect('carrinho:detalhes_do_carrinho') # Este redirect fará com que a requisição seja redirecionada
                                                         # para http://127.0.0.1:8000/carrinho
