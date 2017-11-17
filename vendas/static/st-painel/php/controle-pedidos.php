<?php
$endereco = $_SERVER ['REQUEST_URI'];
echo "<form  action=\"$endereco\" method=\"post\">";
echo "<section class=\"painel-atualizacao topo\">
    <div class=\"row\">
      <div class=\"form-group col-md-3\">
      <select class=\"form-control\" name=\"tipoDeAtualizacao\">";

echo "</select>
      </div>
      <div class=\"form-group  col-md-2 col-md-offset-7\">
      <button type=\"submit\" name=\"atualizar\" class=\"btn btn-primary\">Atualizar</button>
      </div>
    </div>
  </section>";
?>
