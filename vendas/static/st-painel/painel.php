<?php include "php/database-functions.php";
   include "php/verificar-sessao.php";
   if (isset($_REQUEST["atualizar"])) {
     $codUltimo = $_REQUEST["ultimo"];
     for ($i=1; $i < $codUltimo+1 ; $i++) {
       if ($_REQUEST["$i"] == true) {
         if ($_REQUEST["tipoDeAtualizacao"] == "cancelado") {
           mudar_status_pedidos($i,"cancelado");
         }
         else if($_REQUEST["tipoDeAtualizacao"] == "processamento") {
          mudar_status_pedidos($i,"processamento");
         }
         else if($_REQUEST["tipoDeAtualizacao"] == "concluido") {
          mudar_status_pedidos($i,"concluido");
         }
       }
     }
   }
     include "inc/header-painel.php";
     if(isset($_REQUEST["sessao"]) && is_numeric($_REQUEST["sessao"]) && $_REQUEST["sessao"] != NULL && $_REQUEST["sessao"] > 0 && $_REQUEST["sessao"] <= 11){
        if( $_REQUEST["sessao"] == 1) {
           //cadastrar pedido
           include "inc/cadastro.php";
        }
        else if( $_REQUEST["sessao"] == 2){
          //mostrar pedidos em forma de tabela que tenha status de recebido
          get_pedidos(NULL,"recebido");
        }
        else if( $_REQUEST["sessao"] == 3){
          //mostrar pedidos em forma de tabela que tenha status de em processamento
          get_pedidos(NULL,"processamento");
        }
        else if( $_REQUEST["sessao"] == 4){
          //mostrar pedidos em forma de tabela que tenha status de concluido
          get_pedidos(NULL,"concluido");
        }
        else if( $_REQUEST["sessao"] == 5){
          //mostrar pedidos em forma de tabela que tenha status de cancelado
          get_pedidos(NULL,"cancelado");
        }
        else if( $_REQUEST["sessao"] == 6){
          //mostar pedidos que devem ser entregues no dia de hoje
          get_pedidos(NULL,"dia");
        }
        else if( $_REQUEST["sessao"] == 8){
          get_produtos();
        }
        else if( $_REQUEST["sessao"] == 9){
          if (isset($_REQUEST["data"] ) && $_REQUEST["data"] !=NULL ) {
            //validar a data tbm
            //mostra faturamenta para a data
            faturamento($_REQUEST["data"]);
          }else {
            //incluir fomulario de faturamento
              include "inc/form-faturamento.php";
          }
        }
        else if( $_REQUEST["sessao"] == 10 ){
          //criar usuarios novos
          include "php/functions.php";//inporta função que valida dados
          if (validarDado($_REQUEST["nome"]) && validarDado($_REQUEST["email"]) && validarDado($_REQUEST["telefone"])
          && validarDado($_REQUEST["senha"]) && validarDado($_REQUEST["senha1"])) {
            if ($_REQUEST["senha"] == $_REQUEST["senha1"]) {
              //acrescentar mais validações
              if(cadastrarUsuario($_REQUEST["nome"],$_REQUEST["email"],$_REQUEST["telefone"],$_REQUEST["senha"]) == true){
                echo "<p>Cadastro realizado com sucesso.</p>";
              }
              else {
                echo "<p>Cadastro na realizado. :)</p>";
              }
            }
            else {
              echo "<p>Senha não sao iguais</p>";
            }
          }
          else {
            include "inc/user.php";
          }
        }
        else {
          echo "<p>sessão em construção.</p>";
        }
      }
      elseif (isset($_REQUEST["cod"]) && is_numeric($_REQUEST["cod"]) ) {
        get_pedidos($_REQUEST["cod"],NULL);
      }
        else{
          echo "<p>Bem-vindos ao painel de administrador da ST Web Design.</p>";
        }
     include "inc/footer.php";
   ?>
