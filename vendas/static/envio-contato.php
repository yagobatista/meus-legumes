<?php include "inc/header2.php"; ?>
<section>
  <div class="container topo">
    <div class="row">
      <?php
          $nome = $_REQUEST["nome"];
          $email = $_REQUEST["email"];
          $telefone = $_REQUEST["telefone"];
          $tipo = $_REQUEST["tipo"];
          $mensagem = $_REQUEST["mensagem"];
          if($nome != NULL && $email !=NULL && $telefone !=NULL  && $tipo !=NULL && $mensagem !=NULL  ){
            echo "<p>contato:</p>";
            echo "$nome<br>";
            echo "$email<br>";
            echo "$telefone<br>";
            echo "$tipo<br>";
            echo "$mensagem<br>";
          }
          else{
            echo "<p>Ocorreu um erro na válidação dos seus dados, por favor tente novamente.</p>";
          }

      ?>
    </div>
  </div>
</section>
<footer class="footer-fixed">
     <?php include "inc/footer.php"; ?>
</footer>
<?php include "inc/footer-site.php"; ?>
