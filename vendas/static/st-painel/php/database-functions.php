<?php
     $server = "bdmeuslegumes.mysql.uhserver.com";
     $dbuser = "meuslegumes";
     $dbpassword = "meusLe12@";
     $dbname = "bdmeuslegumes";
     $db =  mysqli_connect($server,$dbuser,$dbpassword,$dbname)
     or die("Erro na conexão com o banco de dados.");
     mysqli_set_charset($db, "utf-8");
  function validateUser($user,$password, &$qtdAcessos){
    global $db;
    $query = "SELECT ID , userName , password , qtdAcessosInvalidos FROM user WHERE userName = \"$user\"  ;";
    $result = mysqli_query($db,$query)
    or die('Error querying database.');
    $vetor = mysqli_fetch_array($result);
    if ($vetor) {
      if ($vetor["qtdAcessosInvalidos"] < 5) {
        if ( $vetor["password"] == $password ) {
          return true;
        }
        else{
          $qtdAcessos = $vetor["qtdAcessosInvalidos"] + 1;
          $query_update_acess = "UPDATE user SET qtdAcessosInvalidos = $qtdAcessos  WHERE ID = ".$vetor["ID"].";";
          $result = mysqli_query($db,$query_update_acess)
          or die('Error querying database.');
          return false;
        }
      }
      else if ($vetor["qtdAcessosInvalidos"] >= 5) {
        $qtdAcessos = $vetor["qtdAcessosInvalidos"];
        return false;
      }
      else {
        return false;
      }
    }

    else {
      $qtdAcessos = NULL;
      return false;
    }

  }
  function cadastrarUsuario ($nome,$email,$telefone,$senha){
    global $db;
    $query = "SELECT ID , userName , password , qtdAcessosInvalidos FROM user WHERE userName = \"$nome\"  ;";
    $result = mysqli_query($db,$query)
    or die('query1.');
    $qtduser = mysqli_num_rows($result);
    if ($qtduser > 1) {
      echo "<p>Usuario já existia.</p>";
      return false;
    }
    else {
      //colocar o email tbm
      $query = "INSERT INTO user ( userName , email  , telefone , password , qtdAcessosInvalidos) VALUES (\"$nome\",\"$email\",\"$telefone\",\"$senha\",0 );";
      $result = mysqli_query($db,$query)
      or die('Error querying database 3.');
      return true;
    }
  }
  function mudar_status_pedidos($cod,$status){
    global $db;
    $query = "UPDATE pedido set status = \"$status\" WHERE codP = $cod ;";
    $result = mysqli_query($db,$query)
    or die('Error querying database.');
  }
  function get_pedidos($cod,$status){
    // coloca um formulario entre a tabela que contem os pedidos para poder atualizalos via post com o metodo get_options_atualizacao
    global $db;
    // if pra proteção extra, contra chamadas indevidas de metodos
    if ($status == "dia" && $cod == NULL) {
      $query = "SELECT codP , nomeC , telefone , dataDeRecebimento , dataDeEntrega, cep, rua, numero , bairro , referencia ,complemento  ,formaDePagamento,status FROM pedido WHERE dataDeEntrega = CURDATE();";
    }
    elseif ($cod !=NULL && $status == NULL) {
      $query = "SELECT codP , nomeC , telefone , dataDeRecebimento , dataDeEntrega, cep, rua, numero , bairro , referencia ,complemento  ,formaDePagamento,status FROM pedido WHERE codP = $cod";
    }
    else {
      $query = "SELECT codP , nomeC , telefone , dataDeRecebimento , dataDeEntrega, cep, rua, numero , bairro , referencia ,complemento  ,formaDePagamento,status FROM pedido WHERE status =\"$status\" ;";
    }
    $result = mysqli_query($db,$query)
    or die('Error querying database.');
    $vetor = mysqli_fetch_array($result);
    $qtdPedidos = mysqli_num_rows($result);
    if ($qtdPedidos >0) {
      include "functions.php";
      get_options_atualizacao($status);
      echo "<table class=\"table table-condensed\">
      <thead>
        <tr>
          <th>marcado</th>
          <th>Cod</th>
          <th>Nome</th>
          <th>Telefone</th>
          <th>Data de recebimento</th>
          <th>Data de entrega</th>
          <th>Endereço</th>
          <th>Pagamento</th>
          <th>carrinho</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
  ";
    }
    else {
      echo "<p>Não há nenhum pedido para essa sessão.</p>";
    }
    $ultimo;
    for ($i=0; $i < $qtdPedidos ; $i++) {
      echo"<tr>";
      echo"<td><input type=\"checkbox\" name=\"".$vetor["codP"]."\"></td>";
      echo"<td>".$vetor["codP"]."</td>";
      echo"<td>".$vetor["nomeC"]."</td>";
      echo"<td>".$vetor["telefone"]."</td>";
      echo"<td>".implode("/",array_reverse(explode("-",$vetor["dataDeRecebimento"])))."</td>";
      echo"<td>".implode("/",array_reverse(explode("-",$vetor["dataDeEntrega"])))."</td>";
      echo"<td><ul>
    <li>
      Endereço
      <ul>
        <li>Cep: ".$vetor["cep"]."</li>
        <li>Rua: ".$vetor["rua"]."</li>
        <li>n: ".$vetor["numero"]."</li>
        <li>Bairro: ".$vetor["bairro"]."</li>
        <li>Referencia: ".$vetor["referencia"]."</li>
        <li>complemento: ".$vetor["complemento"]."</li>
      </ul>
    </li>
  </ul></td>";

      echo"<td><ul>
    <li>
      Carrinho
      <ul>
        <li>cod - nome - preço - quant - valor</li>";
        $queryItens ="SELECT codI , nomei ,  preco , quantidade , quantidade*preco as valor  FROM tem_item NATURAL JOIN item WHERE codP = ".$vetor["codP"]." ;";
        $resultItens = mysqli_query($db,$queryItens)
        or die('Error querying database.');
        $qtdItens = mysqli_num_rows($resultItens);
        $vetor1 = mysqli_fetch_array($resultItens);
        for ($j=0; $j < $qtdItens ; $j++) {
           echo "<li>".$vetor1["codI"]."  -  ".$vetor1["nomei"]."  -  ".$vetor1["preco"]."  -  ".$vetor1["quantidade"]."  -  ".$vetor1["valor"]."</li>";
           $vetor1 = mysqli_fetch_array($resultItens);
        }
        $resultTotal = mysqli_query($db,"SELECT SUM(quantidade*preco) AS total FROM tem_item NATURAL JOIN item WHERE codP = ".$vetor["codP"]." ;")
        or die('Error querying database.');
        $vetorTotal = mysqli_fetch_array($resultTotal);
        echo "<li>Total: ".$vetorTotal["total"]."</li>";
      echo"</ul>
    </li>
  </ul></td>";
      echo"<td>".$vetor["formaDePagamento"]."</td>";
      echo"<td>".$vetor["status"]."</td>";
      echo"</tr>";
      $ultimo = $vetor["codP"];
      $vetor = mysqli_fetch_array($result);
    }
    if ($qtdPedidos >0) {
      echo "</tbody>
  </table>";
     echo "<input style=\"display:none;\" type=\"text\" name=\"ultimo\" value=\"$ultimo\">";
     echo "</form><!-- fim do form de atualização -->";
    }
  }
  function get_produtos(){
    global $db;
    $query = "SELECT codI , nomei , tipo ,  preco FROM item ;";
    $result = mysqli_query($db,$query)
    or die('Error querying database.');
    $vetor = mysqli_fetch_array($result);
    $qtdPedidos = mysqli_num_rows($result);
    if ($qtdPedidos >0) {
      include"php/controle-produtos.php";
      echo "<table class=\"table table-condensed\">
      <thead>
        <tr>
          <th>marcado</th>
          <th>Cod</th>
          <th>Nome</th>
          <th>Tipo</th>
          <th>preço</th>
        </tr>
      </thead>
      <tbody>
  ";
    }
    for ($i=0; $i < $qtdPedidos ; $i++) {
      echo"<tr>";
      echo"<td><input type=\"checkbox\" name=\"".$vetor["codP"]."\"></td>";
      echo"<td>".$vetor["codI"]."</td>";
      echo"<td>".$vetor["nomei"]."</td>";
      echo"<td>".$vetor["tipo"]."</td>";
      echo"<td>".$vetor["preco"]."</td>";
      $vetor = mysqli_fetch_array($result);
    }
    if ($qtdPedidos >0) {
      echo "</tbody>
  </table>";
     echo "</form><!-- fim do form de atualização -->";
    }
  }
  function faturamento($data){
    global $db;
    $query = "SELECT dataDeEntrega,SUM(subtotal) AS total FROM (SELECT codP,nomeC, dataDeEntrega,SUM(quantidade*preco) AS subtotal FROM
pedido NATURAL JOIN tem_item NATURAL JOIN item GROUP BY codP) as subtotoaltabela WHERE dataDeEntrega = \"$data\" ;";
    $result = mysqli_query($db,$query)
    or die('Error querying database.');
    $vetor = mysqli_fetch_array($result);
    if ($vetor["total"] == NULL) {
      echo "<p>Não ouve nenhum pedido pra esse dia.</p>";
    }
    else {
      echo "<p>data $data faturamento total R$ ".$vetor["total"]."</p>";
    }
  }
  ?>
