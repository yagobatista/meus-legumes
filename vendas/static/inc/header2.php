<!DOCTYPE html>
<html lang="pt-br">

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
                    <a class="navbar-brand elem" href="index.php" id="menu0" class="rolar">Meus Legumes</a>
                </div>

                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

      </header>
