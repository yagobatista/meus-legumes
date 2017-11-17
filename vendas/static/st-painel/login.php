<?php include "php/database-functions.php";
   if(isset ($_REQUEST["user"]) && isset($_REQUEST["password"]) ) {
     $user = $_REQUEST["user"];
     $password = $_REQUEST["password"];
     // fazer validação de sql injection
     $qtdAcessos = 0;
     if(validateUser($user,$password,$qtdAcessos)){
       session_start();
       //GRAVA AS VARIÁVEIS NA SESSÃO
       $_SESSION["valido"] = true;
       //REDIRECIONA PARA A PÁGINA QUE VAI EXIBIR OS PRODUTOS
       header("Location: painel.php");
     }
     else {
       session_start();
       $_SESSION["valido"] = false;
       $_SESSION["qtdAcessos"] = $qtdAcessos;
       header("Location: index.php");
       //echo "Acesso invalido! <a href=\"index.php\">Voltar para tela de login.</a>";
     }
    }
   ?>
