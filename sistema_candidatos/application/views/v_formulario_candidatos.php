<script>

    $(function(){
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
        
        var tipo_pessoa = "<?= $consulta->candidatos_tipo; ?>";
        
        $('#novo_telefone').on('show.bs.modal', function (e) {
            $('#candidatos_telefone').val('');
            $('#mensagem_erro').hide();
        });
        $('#novo_email').on('show.bs.modal', function (e) {
            $('#candidatos_email').val('');
            $('#mensagem_erro_email').hide();
        });
    });
    
    function salvar_telefone_candidato(){
        var telefone = $('#candidatos_telefone').val();
        var chave = $('#chave').val();
        
        if(telefone == ''){
            $('#mensagem_erro').show();
            $('#candidatos_telefone').focus();
            return false;
        }
        
        $.post(base_url+"candidatos/salvar_telefone_candidato", {
            telefone : telefone,
            chave: chave
        }, function (data){
            $('#div_telefones_cadastrados').html(data);
            $('#novo_telefone').modal('hide')
        });
    }
    
    function salvar_email_candidato(){
        var email = $('#candidatos_email').val();
        var chave = $('#chave').val();
        
        if(email == ''){
            $('#mensagem_erro_email').show();
            $('#candidatos_email').focus();
            return false;
        }
        
        $.post(base_url+"candidatos/salvar_email_candidatos",{
             email: email,
             chave: chave
        }, function (data){
            mostrar_emails(data);
            $('#novo_email').modal('hide');
        });
        
    }
    
    function excluir_telefone(id){
        if(!confirm("Confirma a exclusão?")){
            return false;
        }
        
        var chave = $('#chave').val();
        
        $.post(base_url+"candidatos/excluir_telefone", {
            id_telefone : id,
            chave : chave
        }, function(data){
            mostrar_telefones(data);
        });
    }
    
    function excluir_email(id){
        if(!confirm("Confirma a exclusão?")){
            return false;
        }
        
        var chave = $('#chave').val();
        
        $.post(base_url+"candidatos/excluir_email", {
            id_email : id,
            chave : chave
        }, function(data){
            mostrar_emails(data);
        });
    }
    
    function mostrar_telefones(dados){
        $('#div_telefones_cadastrados').html(dados);
    }
    
    function mostrar_emails(dados){
        $('#div_emails_cadastrados').html(dados);
    }
</script>
<!-- Modal -->
<div class="modal fade" id="novo_telefone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Novo Telefone</h4>
        
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="candidatos_telefone" name="candidatos_telefone" placeholder="Telefone">
        <br>
        <div class="alert alert-danger" role="alert" style="display: none" id="mensagem_erro">Informe um telefone antes de continuar</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" onclick="salvar_telefone_candidato()">Salvar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="novo_email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Novo Email</h4>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="candidatos_email" name="candidatos_email" placeholder="Email">
        <br>
        <div class="alert alert-danger" role="alert" style="display: none" id="mensagem_erro_email">Informe um email antes de continuar</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" onclick='salvar_email_candidato()'>Salvar</button>
      </div>
    </div>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">candidatos</h3>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" role="form" method ="POST" action ="<?= base_url('candidatos/salvar_dados_candidato') ?>">
        <div class="form-group">
            <label for="candidatos_nome" class="col-sm-2 control-label">Nome/Contato</label>
            <div class="col-sm-10">
              <input type="text" value="<?= isset($consulta->candidatos_nome)?$consulta->candidatos_nome:''; ?>" class="form-control" id="candidatos_nome" name="candidatos_nome" placeholder="Nome do Candidato">
            </div>
        </div>
        <div id="pf">
            <div class="form-group">
              <label for="candidatos_rg" class="col-sm-2 control-label">RG</label>
              <div class="col-sm-10">
                <input type="text" value="<?= isset($consulta->candidatos_rg)?$consulta->candidatos_rg:''; ?>" class="form-control" id="candidatos_rg" name="candidatos_rg" placeholder="RG">
              </div>
            </div>
            <div class="form-group">
              <label for="candidatos_cpf" class="col-sm-2 control-label">CPF</label>
              <div class="col-sm-10">
                <input type="text" value="<?= isset($consulta->candidatos_cpf)?$consulta->candidatos_cpf:''; ?>" class="form-control" id="candidatos_cpf" name="candidatos_cpf" placeholder="CPF">
              </div>
            </div>
        </div>
        <div class="form-group">
          <label for="candidatos_cep" class="col-sm-2 control-label">CEP</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="candidatos_cep" name="candidatos_cep" placeholder="CEP">
          </div>
        </div>
        <div class="form-group">
          <label for="candidatos_endereco" class="col-sm-2 control-label">Endereço</label>
          <div class="col-sm-10">
            <input type="text" value="<?= isset($consulta->candidatos_cep)?$consulta->candidatos_cep:''; ?>" class="form-control" id="candidatos_endereco" name="candidatos_endereco" placeholder="Rua, número">
          </div>
        </div>
        <div class="form-group">
          <label for="candidatos_cidade" class="col-sm-2 control-label">Cidade</label>
          <div class="col-sm-10">
            <input type="text" value="<?= isset($consulta->candidatos_cidade)?$consulta->candidatos_cidade:''; ?>" class="form-control" id="candidatos_cidade" name="candidatos_cidade" placeholder="Cidade">
          </div>
        </div>
        <div class="form-group">
          <label for="candidatos_uf" class="col-sm-2 control-label">Estado</label>
          <div class="col-sm-10">
            <select class="form-control" name="candidatos_uf" id="candidatos_uf">
                <option value="">Selecione</option>
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AM">AM</option>
                <option value="AP">AP</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MG">MG</option>
                <option value="MS">MS</option>
                <option value="MT">MT</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="PR">PR</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SE">SE</option>
                <option value="SP">SP</option>
                <option value="TO">TO</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="candidatos_telefones" class="col-sm-2 control-label">Telefones</label>
          <div class="col-sm-10">
              <!-- Button trigger modal -->
                <a href="javascript:;" class="btn btn-primary" data-toggle="modal" data-target="#novo_telefone">Novo Telefone</a>
                <br>
                <div id="div_telefones_cadastrados">
                    <?php if($funcao == "update"){$tabela_telefone;} ?>
                </div>
          </div>
        </div>
        <div class="form-group">
          <label for="candidatos_emails" class="col-sm-2 control-label">Emails</label>
          <div class="col-sm-10">
            <a href="javascript:;"  class="btn btn-primary" data-toggle="modal" data-target="#novo_email">Novo Email</a>
            <div id="div_emails_cadastrados">
                    <?php if($funcao == "update"){$tabela_email;} ?>
            </div>
          </div>
        </div>
        <br>
                
        <div class="form-group">
          <label for="candidatos_data_aniversario" class="col-sm-2 control-label">Data de Nascimento</label>
          <div class="col-sm-10">
            <input type="text" value="<?php if($funcao == "update"){
            
            list($ano, $mes, $dia) = explode("-",$consulta->candidatos_data_aniversario);
            
            echo $dia ."/".$mes."/".$ano; } ?>"
            class="form-control datepicker" id="candidatos_data_aniversario" name="candidatos_data_aniversario">
          </div>
        </div>
        <div class="form-group">
          <label for="candidatos_observacoes" class="col-sm-2 control-label">Observação</label>
          <div class="col-sm-10">
              <textarea id="candidatos_observacoes" name="candidatos_observacoes" class="form-control" rows="5"><?= isset($consulta->candidatos_observacoes)?$consulta->candidatos_observacoes:''; ?></textarea>
          </div>
        </div>
        <input type="hidden" name="chave" id="chave" value="<?php echo isset($chave)? $chave: ''; ?>">
        <input type="hidden" name="id_candidato" id="id_candidato" value="<?php echo isset($id_candidato)? $id_candidato: 0; ?>">
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </div>
    </form>
  </div>
</div>