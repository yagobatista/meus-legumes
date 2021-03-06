<!DOCTYPE html>
<html lang="pt-BR">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Meus Legumes</title>

        <!-- Bootstrap Core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/mobile.css" rel="stylesheet" media="screen and (max-width: 768px)">
        <!-- Custom CSS -->
        <link href="css/full-slider.css" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">
        <script src="js/produtos.js"></script>
        <script src="js/preco.js"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $.easing.easeInOutExpo = function(x, t, b, c, d) { // definição do efeito que será posteriormente usado no animate
                    if (t == 0) return b;
                    if (t == d) return b + c;
                    if ((t /= d / 2) < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
                    return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b;
                }

                $(".rolar").click(function(event) {
                    event.preventDefault();
                    $('html,body').animate({
                        scrollTop: $(this.hash).offset().top
                    }, {
                        duration: 2000,
                        easing: 'easeInOutExpo' // basta usar o mesmo nome que você definiu acima ;)
                    });
                });
            });
        </script>
    </head>

    <body>
      <header>
        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
                    <a href="#carrinho" data-toggle="modal" class=""><button type="button" class="navbar-toggle"><img src="img/carrinho.png">
      </button></a>
                    <a id="menu0" class="rolar navbar-brand" href="#home">Meus Legumes</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#sobre" id="menu1" class="rolar">Sobre Nós</a>
                        </li>
                        <li>
                            <a href="#menu" id="menu2" class="rolar">Menu</a>
                        </li>
                         <li>
                             <a href="#contato" id="menu3" class="rolar">Contato</a>
                         </li>
                         <li>
                             <a id="carrinho2" href="#carrinho" data-toggle="modal" class="navbar-right"><img src="img/carrinho.png"></a>
                         </li>
                    </ul>
                </div>

                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

      </header>
