<?php include "inc/header2.php"; ?>
<section>
  <div class="container topo">
    <div class="row">
      <?php
          $nome = $_REQUEST["nome"];
          $telefone = $_REQUEST["telefone"];
          $cep = $_REQUEST["cep"];
          $rua = $_REQUEST["rua"];
          $numero = $_REQUEST["numero"];
          $bairro =  $_REQUEST["bairro"];
          $referencia = $_REQUEST["referencia"];
          $complemento = $_REQUEST["complemento"];
          $dataDeEntrega = $_REQUEST["dataDeEntrega"];
          $inicioHora = $_REQUEST["inicioHora"];
          $inicioMinu = $_REQUEST["inicioMinu"];
          $finalHora = $_REQUEST["finalHora"];
          $finalMinu = $_REQUEST["finalMinu"];
          $pagamento = $_REQUEST["radios"];
          $bandeira = $_REQUEST["bandeira"];
          if($nome != NULL && $telefone !=NULL && $cep!=NULL && $rua !=NULL && $numero !=NULL &&
          $bairro!=NULL && $referencia != NULL &&$complemento != NULL &&  $inicioHora !=NULL &&
          $inicioMinu !=NULL && $finalHora !=NULL && $finalMinu !=NULL && $pagamento !=NULL &&
          $bandeira !=NULL && $dataDeEntrega != NULL &&
          is_numeric($telefone) && is_numeric($cep) && is_numeric($numero) && is_numeric($inicioHora) &&
          is_numeric($inicioMinu) && is_numeric($finalHora) && is_numeric($finalMinu) ){
            //validar data de entrega

            //echo "nome: ".$nome ;
            //echo "<br>";
            //echo "telefone: ". $telefone;
            //echo "<br>";
            //echo "cep: ".$cep ;
            //echo "<br>";
            //echo "rua: ".$rua ;
            //echo "<br>";
            //echo "numero: ".$numero ;
            //echo "<br>";
            //echo "bairro: ".$bairro ;
            //echo "<br>";
            //echo"referencia: ". $referencia ;
            //echo "<br>";
            //echo "complemento: ".$complemento ;
            //echo "<br>";
            //echo "hora inicio: ".$inicioHora."h".$inicioMinu ;
            //echo "<br>";
            //echo "hora fim: ".$finalHora."h".$finalMinu;
            //echo"<br>";
            //echo "pagamento: ".$pagamento. " - ".$bandeira ;
            //echo"<br>";
            //echo"Carrinho :";
            //echo"<br>";
            $banco =  mysqli_connect("bdmeuslegumes.mysql.uhserver.com","meuslegumes","meusLe12@","bdmeuslegumes")
            or die("Erro na conexão com o banco de dados.");
            mysqli_set_charset($banco, "utf-8");
            $query = "SELECT * FROM pedido";
            $result = mysqli_query($banco,$query)
            or die('Erro ao consultar pedidos.');
            $qtd = mysqli_num_rows($result);
            $cod = $qtd +1;
            $query = "INSERT INTO pedido  VALUES ($cod,\"recebido\",\"$nome\",\"$telefone\",\"$cep\",\"$rua\",
              $numero,\"$bairro\",\"$complemento\",\"$referencia\",Now(),\"".implode("-",array_reverse(explode("/","$dataDeEntrega")))."\",\"0$inicioHora\",
              \"0$inicioMinu\",\"0$finalHora\",\"0$finalMinu\",\"$pagamento\", NULL);";
            //echo $query;
            $result = mysqli_query($banco,$query)
            or die(mysqli_error($banco));
            $fahou = false;
            for ($i=0; $i < 8 ; $i++) {
              if(isset($_REQUEST["$i"])) {
                //echo "item: $i qtd :".$_REQUEST["$i"]."<br>";
                mysqli_query($banco,"INSERT INTO tem_item VALUES($cod, $i , ".$_REQUEST["$i"].");")
                or die('Erro ao salvar item dos pedidos.');
              }
            }
            if ($result == false) {
               echo "<p>Ocorreu um erro na válidação dos seus dados, por favor tente novamente.</p>";
            }
            else {
              echo "<p>Ola! $nome. Obrigado por confiar no Meus Legumes.</p>";
              echo "<p>Seu pedido de código $cod foi recebido com sucesso.</p>";
            }
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
