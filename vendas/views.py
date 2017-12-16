# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render
from vendas.models import Produto
from carrinho.carrinho import Carrinho
# Create your views here.
def home(request):
    lista = Produto.objects.all()
    carrinho = Carrinho(request)
    return render(request,"vendas/index.html",{"lista":lista,"carrinho":carrinho})
