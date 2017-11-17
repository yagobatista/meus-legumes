<?php
       session_start();
       //GRAVA AS VARIÁVEIS NA SESSÃO
       $_SESSION["valido"] = false;
       unset($_SESSION["valido"]);
       //REDIRECIONA PARA A PÁGINA QUE VAI EXIBIR OS PRODUTOS
       header("Location: index.php");
   ?>
