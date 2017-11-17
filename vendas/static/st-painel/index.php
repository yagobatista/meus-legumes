<?php include "inc/header.php"; ?>
<div class="container">
    <div class="row">
		<div class="col-md-4 col-md-offset-4 login">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Acesso</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form action="login.php" method="post"  role="form">
              <fieldset>
			    	  	<div class="form-group">
                  <input  class="form-control" type="text" name="user" placeholder="Usuario" value="">
			    		</div>
			    		<div class="form-group">
                <input  class="form-control" type="password" name="password" placeholder="Senha" value="">
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
      <?php session_start();
          if (isset($_SESSION["valido"]) ) {
            if ($_SESSION["valido"]  == false && isset($_SESSION["qtdAcessos"]) ) {
              if ($_SESSION["qtdAcessos"] >= 5) {
                echo "<div class=\"alert alert-danger\">";
                echo "<strong>Acesso invalido!</strong> Você esgotou o seu numero de tentativas de acesso. Por favor, entre em contato com o seu administrador.";
              }
              else {
                echo "<div class=\"alert alert-warning\">";
                echo "<strong>Acesso invalido!</strong> Você fez ".$_SESSION["qtdAcessos"]. " tentativas invalidas, você tem no maximo 5 tentativas.<br>Efetue o login novamente.";
              }
              echo "</div>";
            }
            else{

            }
          }
      ?>
		</div>
	</div>
</div>
</div>
  </body>
</html>
