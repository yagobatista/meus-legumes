# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render
from vendas.models import Produto
# Create your views here.
def home(request):
    lista = Produto.objects.all()
    return render(request,"vendas/index.html",{"lista":lista})
