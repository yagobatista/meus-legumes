<form id="formEnd" class="form-horizontal topo" method="post" action="painel.php?sessao=10">
<div class="form-group">
    <label class="col-md-4 control-label" for="nome">Nome</label>
    <div class="col-md-4">
        <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md" required="">
    </div>
</div>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-4 control-label" for="email">Email</label>
    <div class="col-md-4">
        <input  name="email" type="email" placeholder="Email" class="form-control input-md" required="">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="telefone">Telefone</label>
    <div class="col-md-4">
        <input  name="telefone" type="text" placeholder="Telefone" class="form-control input-md" required="">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="senha">Senha</label>
    <div class="col-md-4">
        <input  name="senha" type="password" placeholder="Senha" class="form-control input-md" required="">
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label" for="senha1">Confirmar senha</label>
    <div class="col-md-4">
        <input  name="senha1" type="password" placeholder="Senha" class="form-control input-md" required="">
    </div>
</div>
<button class="btn btn-primary" type="submit" name="cadastrar">Criar</button>
</form>
