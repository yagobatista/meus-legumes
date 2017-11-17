<form id="form-faturamento" action="painel.php?sessao=9" method="post">
  <div class="form-group">
      <label class="col-md-1 control-label" for="data">Data</label>
      <div class="col-md-4">
          <input  name="data" type="date" placeholder="YYYY=MM-DD" class="form-control input-md" required="">
      </div>
  </div>
  <div class="form-group ">
       <label class="col-md-1 control-label ">raio</label>
       <div class="col-md-4">
        <div class="radio">
         <label class="radio">
          <input name="radio" type="radio" value="dia"/>
          dia
         </label>
        </div>
        <div class="radio">
         <label class="radio">
          <input name="radio" type="radio" value="semana"/>
          semana
         </label>
        </div>
        <div class="radio">
         <label class="radio">
          <input name="radio" type="radio" value="mes"/>
          mês
         </label>
        </div>
       </div>
  </div>
  <div class="col-md-2">
    <button class="btn btn-primary " type="submit" name="cadastrar">Pesquisar</button>    
  </div>
</form>
