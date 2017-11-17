<div class="container topo">
  <div class="row">
    <div class="col-md-12 text-center">
        <h1 class="elemento contato-titulo">Contato</h1>
    </div>
    <form class="form-horizontal centralizar-form" action="envio-contato.php" method="post">
      <div class="form-group">
        <label class="col-md-3" for="nome"></label>
        <div class="col-md-6">
          <input class="form-control input-md" type="text" name="nome" placeholder="Nome" value="" required="true">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3" for="email"></label>
        <div class="col-md-6">
          <input class="form-control input-md" type="email" name="email" placeholder="Email mais usado" value="" required="true">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3" for="telefone"></label>
        <div class="col-md-6">
          <input class="form-control input-md" type="text" name="telefone" value="" placeholder="Telefone" required="true">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3" for="tipo"></label>
        <div class="col-md-6">
          <select class="form-control input-md"  name="tipo"  required="true">
            <option value="sugestao">Sugestão</option>
            <option value="cancelamento">Cancelamento</option>
            <option value="reclamação">Reclamação</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3" for="mensagem"></label>
        <div class="col-md-6">
        <textarea class="form-control input-md" name="mensagem" placeholder="Mensagem" required="true" rows="8" ></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-8" for="envio"></label>
        <div class="col-md-2">
          <button class="btn botao" type="submit" name="envio">Enviar</button>
        </div>
      </div>
    </form>
  </div>
</div>
