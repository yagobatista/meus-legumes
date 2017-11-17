<?php
//INICIALIZA A SESSÃO
session_start();
//SE NÃO TIVER VARIÁVEIS REGISTRADAS
//RETORNA PARA A TELA DE LOGIN
if( isset($_SESSION["valido"])  ){
   if ($_SESSION["valido"] == false) {
     header("Location: index.php");
   }
}
else {
  header("Location: index.php");
}
?>
