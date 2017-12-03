<style>
    .tab-pane{
        padding-top: 10px;
    }
    
</style>
    
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Paginação</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
        <form role="form" class="form-inline" method="POST" action="configuracoes/salvar">
            <div class="form-group">
                <label for="itens_por_pagina_clientes">Itens por página (paginação Clientes)</label>
                <input type="text" class="form-control" id="itens_por_pagina_clientes" name="itens_por_pagina_clientes" style="width: 40px;" value="<?= isset($configuracoes->itens_por_pagina_clientes)? $configuracoes->itens_por_pagina_clientes : 5  ?> ">
                <div class="form-grou">
                    <input type="submit" value="salvar" class="form-control">
                </div>
            </div>
        </form>  
      </div>
  </div>

</div>