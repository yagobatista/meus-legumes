       <?php include"inc/header.php" ?>
        <section id="home">
            <?php include "inc/slider.php"; ?>
        </section>
        <section id="sobre">
            <div class="container topo">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="elemento">Quem Somos</h1>

                    </div>
                </div>
                <div class="row">
                    <div class="co-xs-12 col-sm-6 col-md-6">
                        <p id="paragrafo-sobre">Nós valorizamos o seu trabalho e o seu dinheiro. Por isso selecionamos apenas as melhores frutas, legumes e verduras. Para que você receber na sua casa apenas o que existe de melhor, por um preço que cabe no seu bolso.
                        </p>
                    </div>
                    <div class="co-xs-12 col-sm-6 col-md-6">
                        <img src="img/sobre.jpg" class="imagem">
                    </div>
                </div>
            </div>
        </section>
        <section id="menu">
            <?php include "inc/menu.php"; ?>
            <?php include "php/produtos.php"; ?>
            <div class="container">
                <div id="cabecalho" class="row">
                    <div class="topo col-xs-8 col-xs-offset-2  col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
                        <a href="#carrinho" data-toggle="modal"><button name=\"qtd\" class="form-control botao finalizar finalizarPrincipal">Finalizar compra</button></a>
                    </div>

                </div>
              </div>
        </section>
        <section id="contato">
          <?php include "inc/contato.php"; ?>
        </section>
        <footer >
                <?php include "inc/footer.php"; ?>
        </footer>
        <?php include "inc/carrinho.php"; ?>
        <?php include"inc/cadastro.php"; ?>
        <!-- jQuery -->
<?php include "inc/footer-site.php"; ?>
