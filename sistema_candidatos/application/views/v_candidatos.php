<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Candidatos</h3>
  </div>
    <div class="panel-body">
        
        <p>
            <a href="<?=base_url('candidatos/novo_candidato') ?>" class="btn btn-primary">Novo Candidato</a>
        </p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome Contato</th>
                    <th>E-mail</th>
                    <th>Telefones</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($consulta->result() as $linha){ ?>
                <tr>
                    <td><?= $linha->candidatos_id; ?></td>
                    <td><?= $linha->candidatos_nome; ?></td>
                    <td><?php
                        $emails = $this->m_candidatos->retorna_emails_candidatos_by_chave($linha->candidatos_id);
                        foreach($emails->result() as $email){
                            echo $email->emails_email."<br>";
                        };
                    ?></td>
                    <td><?php
                        $telefones = $this->m_candidatos->retorna_telefones_candidatos_by_chave($linha->candidatos_id);
                        foreach($telefones->result() as $telefone){
                            echo $telefone->telefones_telefone."<br>";
                        };
                    ?></td>
                    <td><a href="<?= base_url('candidatos/editar_candidato/'.$linha->candidatos_id)?>">Editar</a> | <a href="<?= base_url('candidatos/excluir_candidato/'.$linha->candidatos_id)?>" onclick='return confirma_exclusao'>Excluir</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
        
        
        
    </div>
</div>
    