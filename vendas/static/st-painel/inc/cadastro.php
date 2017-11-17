<form id="formEnd" class="form-horizontal topo" method="post" action="envio.php">
<div class="form-group">
    <label class="col-md-4 control-label" for="nome">Nome</label>
    <div class="col-md-4">
        <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md" required="">
    </div>
</div>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-4 control-label" for="Telefone">Telefone</label>
    <div class="col-md-4">
        <input id="Telefone" name="telefone" type="text" placeholder="Telefone" class="form-control input-md" required="">

    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="cep">Cep</label>
    <div class="col-md-4">
        <input id="cep" name="cep" type="text" placeholder="Cep" class="form-control input-md">
    </div>
</div>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-4 control-label" for="rua">Rua</label>
    <div class="col-md-4">
        <input id="Rua" name="rua" type="text" placeholder="Rua" class="form-control input-md" required="">

    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="bairro">Bairro</label>
    <div class="col-md-4">
        <select name="bairro" class="form-control" >
             <option value="0"></option>
             <?php include "bairros.php"; ?>
        </select>
    </div>
</div>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-4 control-label" for="numero">Número</label>
    <div class="col-md-2">
        <input id="numero" name="numero" type="number" placeholder="Número" class="form-control input-md" required="">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="referencia">Complemento</label>
    <div class="col-md-4">
        <input id="complemento" name="complemento" type="text" placeholder="Complemento" class="form-control input-md">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="referencia">Referência</label>
    <div class="col-md-4">
        <input id="referencia" name="referencia" type="text" placeholder="Referência" class="form-control input-md">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="cidade">Cidade</label>
    <div class="col-md-4">
        <select id="cidade" name="cidade" class="form-control">
             <option value="1">Niterói</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="referencia">Data da entrega</label>
    <div class="col-md-4">
        <input  name="dataDeEntrega" type="date" placeholder="DD/MM/AAAA" class="form-control input-md">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="horario">Horário de inicio </label>
    <div class="col-md-2">
        <select name="inicioHora" class="form-control">
<option value="7">7h</option>
<option value="8">8h</option>
<option value="9">10h</option>
<option value="10">11h</option>
</select>
    </div>
    <label class="col-md-1 control-label" for="horario">e</label>
    <div class="col-md-2">
        <select name="inicioMinu" class="form-control">
<option value="0">0 minutos</option>
<option value="15">15 minutos</option>
<option value="30">30 minutos</option>
<option value="45">45 minutos</option>
</select>
    </div>
</div>

<!-- Select Basic -->
<div class="form-group">
    <label class="col-md-4 control-label" for="final">até</label>
    <div class="col-md-2">
        <select name="finalHora" class="form-control">
<option value="7">7h</option>
<option value="8">8h</option>
<option value="9">9h</option>
<option value="10">10h</option>
<option value="11">11h</option>
<option value="12">12h</option>
</select>
    </div>
    <label class="col-md-1 control-label" for="horario">e</label>
    <div class="col-md-2">
        <select name="finalMinu" class="form-control">
<option value="0">0 minutos</option>
<option value="15">15 minutos</option>
<option value="30">30 minutos</option>
<option value="45">45 minutos</option>
</select>
    </div>
</div>

<!-- Text input-->


<!-- Multiple Radios (inline) -->

<div class="form-group">
    <label class="col-md-4 control-label" for="radios">Tipo de pagamento</label>
    <div class="col-md-4">
        <label class="radio-inline" for="radios-0">
<input type="radio" name="radios" id="radios-0" value="cartão" onclick="cartao()" checked="true">
Cartão
</label>
        <label class="radio-inline" for="radios-1">
<input type="radio" name="radios" id="radios-1"  value="dinheiro" onclick="troco(true)" >
Dinheiro
</label>
    </div>
    <label id="trocoPara" class="col-md-2 col-xs-6 control-label" for="horario">Bandeira</label>
    <div id="troco" class="col-md-2 col-xs-6">
        <select class='form-control' name='bandeira'>
          <option value='visa'>Visa</option>
          <option value='outro'>Outros </option>
          <option value='master'>Master</option>
          <option value='vale'>Vale</option>
        </select>
    </div>
</div>
<button class="btn btn-primary" type="submit" name="cadastrar">cadastrar</button>
</form>
