from django.conf.urls import url,include
from carrinho import views
urlpatterns = [
    url(r'^adicionar/$', views.adicionar, name='adicionar_ao_carrinho'),
    url(r'^remover/$', views.remover_do_carrinho, name='remover_do_carrinho'),
    url(r'^$',views.detalhes_do_carrinho, name='detalhes_do_carrinho'),

]
