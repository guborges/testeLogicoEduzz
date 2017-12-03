<script>
    
    $(function(){
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
       }); 
       
       var hora_compromisso_hora = "<?php echo isset($hora_compromisso_hora)?$hora_compromisso_hora: ""; ?>"
       var hora_compromisso_minuto = "<?php echo isset($hora_compromisso_minuto)?$hora_compromisso_minuto: ""; ?>"
       
       if(hora_compromisso_hora != ''){
            $('#hora_compromisso_hora').val(hora_compromisso_hora);
       }
       if(hora_compromisso_minuto != ''){
            $('#hora_compromisso_minuto').val(hora_compromisso_minuto);
       }
       
       var compromissos_numero = "<?php echo isset($compromissos_numero)?$compromissos_numero: ""; ?>"
       var compromissos_unidade = "<?php echo isset($compromissos_unidade)?$compromissos_unidade: ""; ?>"
       
       if(compromissos_numero != ''){
            $('#compromissos_numero').val(compromissos_numero);
       }
       if(compromissos_unidade != ''){
            $('#compromissos_unidade').val(compromissos_unidade);
       }
   });
   
   function confirma_exclusao(){
       
       if(!confirm("Deseja excluir este compromisso?")){
           return false
       } else {
           return true;
       }
   }
   
   function mostrar_todos(){
       
       var url = '<?= $this->uri->segment(3);?>';
       
       if(url == 0){
           window.location.href='<?= base_url('compromissos/index/all'); ?>';
       }else{
           window.location.href='<?= base_url('compromissos'); ?>';
       }
       
       
   }
</script>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Entrevistas</h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Entrevistas Agendadas</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <?php $parametro = $this->uri->segment(3);?>
                        <div class="col-md-6 "><input type='checkbox' <?= $parametro == 'all'? "checked='true'" : ''; ?> onclick="mostrar_todos()" id="mostrar_todos_compromissos" name="mostrar_todos_compromissos"><label for="mostrar_todos_compromissos">&nbsp;Mostrar todos as entrevistas</label></div>
                        <div class="col-md-6 text-right"><a href="<?= base_url('compromissos');?>" class="btn btn-success">Novo Compromisso</a></div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Lembrete</th>
                                <th style="text-align: center;">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($compromissos->result() as $linha){ ?>
                            <tr>
                                <td><?= $linha->compromissos_descricao; ?></td>
                                <td><?= $linha->compromissos_data_evento; ?></td>
                                <td><?= $linha->compromissos_hora_evento; ?> h</td>
                                <td><?= $linha->compromissos_numero ." ". $linha->compromissos_unidade ?></td>
                                <td style="text-align: center;"><a href="<?= base_url("compromissos/excluir_compromisso/$linha->compromissos_id")?>" onclick="return confirma_exclusao()">Excluir</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Novo Compromisso</h3>
                </div>
                <div class="panel-body">
                    <form for="form" method="POST" action="<?= base_url('compromissos/salvar_compromisso') ?>">
                        <div class="form-group">
                          <label for="data_compromisso">Data do Compromisso</label>
                          <input type="text" class="form-control datepicker" id="data_compromisso" value="<?= isset($data_compromisso)? $data_compromisso:''; ?>" name="data_compromisso" placeholder="Data do Compromisso">
                        </div>
                        <label for="hora_compromisso_hora">Hora do compromisso</label>
                        <div class="form-group" style="margin-bottom: 50px !important;">
                            <div class="col-xs-6">
                                <select name="hora_compromisso_hora" id="hora_compromisso_hora" class="form-control">
                                    <option value="">Horas</option>
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                </select>
                            </div>
                            <div class="col-xs-5">
                                <select name="hora_compromisso_minuto" id="hora_compromisso_minuto" class="form-control">
                                    <option value="">Min</option>
                                    <option value="00">00</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="descricao_compromisso">Descrição</label>
                          <textarea class="form-control" id="descricao_compromisso" name="descricao_compromisso" rows="5" placeholder="Descricao"><?= isset($compromissos_descricao)? $compromissos_descricao:''; ?></textarea>
                        </div>
                        <label for="compromissos_numero">Avisar-me por e-mail em</label>
                        <div class="form-group" style="margin-bottom: 50px !important;"> 
                            <div class="col-xs-7">
                                <select name="compromissos_numero" id="compromissos_numero" class="form-control">
                                    <option value="15" selected="selected">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                </select>
                            </div>
                            <div class="col-xs-5">
                                <select name="compromissos_unidade" id="compromissos_unidade" class="form-control">
                                    <option value="minuto" selected>Minutos</option>
                                    <option value="hora">Horas</option>
                                    <option value="dia">Dias</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                        <input type="hidden" name="id_compromisso" id="id_compromisso" value="<?= isset($id_compromissos)? $id_compromissos: ""; ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>