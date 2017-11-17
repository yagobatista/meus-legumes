<div id="carrinho" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Seu carrinho de compras</h4>
                <div id="cabecalho-carrinho" class="row">
                    <div class='col-md-7 col-xs-6'>
                        <span>item</span>
                    </div>
                    <div class='col-md-3 col-xs-3 '>
                        <span id="quantidadeNoCarrinho">Quantidade</span>
                        <script type="text/javascript">
                          if (screen.width < 430) {
                            document.getElementById("quantidadeNoCarrinho").innerHTML = "Quantid";
                          }
                        </script>
                    </div>
                    <div class="col-md-2 col-xs-3 ">
                        <span>Subtotal</span>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div id="conteudoCa">
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-4">
                            <p id="total"><div id="valorDoTotal"></div></p>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <button type="button" data-dismiss="modal" class="form-control botao comprarMais ">Comprar mais</button>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <a href="#cadastro" onclick="enviaCarrinho()" data-toggle="modal" data-dismiss="modal">
                                <button name="qtd" class="form-control botao finalizar">Finalizar pedido</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
