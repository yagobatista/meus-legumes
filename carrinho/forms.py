from django import forms

OPCOES_DE_QUANTIDADE_PARA_O_PRODUTO = [(i, str(i)+"") for i in range(1, 21)]
class FormAddCarrinho(forms.Form):
    quantidade = forms.TypedChoiceField(label="Quantidade ",
                                        choices=OPCOES_DE_QUANTIDADE_PARA_O_PRODUTO,
                                        coerce=int,
                                        widget=forms.Select(attrs={'class': 'form-control qtd' }))

    id_produto = forms.IntegerField(required=True,             # O default é required=True
                                   widget=forms.HiddenInput)
    atualizar = forms.BooleanField(required=False,             # O default é required=True
                                   initial=False,
                                   widget=forms.HiddenInput)
