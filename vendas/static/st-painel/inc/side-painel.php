<nav class="navbar navbar-default" role="navigation">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
    <div class="brand-wrapper">
        <!-- Hamburger -->
        <button type="button" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Brand -->
        <div class="brand-name-wrapper">
            <a class="navbar-brand" href="#">
                Meus Legumes
            </a>
        </div>

        <!-- Search -->
        <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
            <span class="glyphicon glyphicon-search"></span>
        </a>

        <!-- Search body -->
        <div id="search" class="panel-collapse collapse">
            <div class="panel-body">
                <form class="navbar-form" role="search" action="painel.php">
                    <div class="form-group">
                        <input type="integer" name="cod" class="form-control" placeholder="Codigo do pedido">
                    </div>
                    <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Main Menu -->
<div class="side-menu-container">
    <ul class="nav navbar-nav">
        <li ><a href="painel.php?sessao=1"><span class="glyphicon glyphicon-plus"></span>Adicionar pedidos</a></li>
        <li><a href="painel.php?sessao=2"><span class="glyphicon glyphicon-shopping-cart"></span>Pedidos recebidos</a></li>
        <li><a href="painel.php?sessao=3"><span class="glyphicon glyphicon-refresh"></span>Pedidos processamento</a></li>
        <li><a href="painel.php?sessao=4"><span class="glyphicon glyphicon-ok"></span>Pedidos concluidos</a></li>
        <li><a href="painel.php?sessao=5"><span class="glyphicon glyphicon-remove"></span>Pedidos cancelados</a></li>
        <li><a href="painel.php?sessao=6"><span class="glyphicon glyphicon-calendar"></span>Pedidos do dia</a></li>
        <!-- Dropdown-->
        <!--<li class="panel panel-default" id="dropdown">
            <a data-toggle="collapse" href="#dropdown-lvl1">
                <span class="glyphicon glyphicon-user"></span> Sub Level <span class="caret"></span>
            </a>-->
            <!-- Dropdown level 1 -->
            <!--<div id="dropdown-lvl1" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li class="panel panel-default" id="dropdown">
                            <a data-toggle="collapse" href="#dropdown-lvl2">
                                <span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>
                            </a>
                            <div id="dropdown-lvl2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="#">Link</a></li>
                                        <li><a href="#">Link</a></li>
                                        <li><a href="#">Link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </li>-->
        <li><a href="painel.php?sessao=7"><span class="glyphicon glyphicon-search"></span>Pesquisa avançada</a></li>
        <li><a href="painel.php?sessao=8"><span class="glyphicon glyphicon-apple"></span>Produtos</a></li>
        <li><a href="painel.php?sessao=9"><span class="glyphicon glyphicon-file"></span>Faturamento</a></li>
        <li><a href="painel.php?sessao=10"><span class="glyphicon glyphicon-user"></span>Usuarios</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span>Sair</a></li>
    </ul>
</div>
</nav><!-- /.navbar-collapse -->
