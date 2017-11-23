from django.conf.urls import url,include
from carrinho import views
urlpatterns = [
    url(r'adicionar/^$',views.adicionar),
]
