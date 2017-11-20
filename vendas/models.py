# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models

# Create your models here.
class Produto(models.Model):
    nome = models.CharField(max_length= 32 )
    imagem = models.ImageField(upload_to='vendas/produtos')
    preco = models.DecimalField(max_digits=4, decimal_places=2)
    def __str__(self):
        return self.nome;
class Usuario(object):
    """docstring for ."""
    telefone = models.CharField(max_length= 11 )
    rua = models.CharField(max_length= 250 )
    numero = models.IntegerField( )
    cidade = models.CharField(max_length= 250 )
    bairro = models.CharField(max_length= 250 )
