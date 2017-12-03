<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Usuários</h3>
  </div>
    <div class="panel-body">
        <p>
            <a href="<?=base_url('usuarios/novo_usuario') ?>" class="btn btn-primary">Novo Usuário</a>
        </p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios->result() as $linha ): ?>
                <tr>
                    <td><?= $linha->id ?></td>
                    <td><?= $linha->nome ?></td>
                    <td><?= $linha->email ?></td>
                    <td><a href="<?= base_url("usuarios/editar/$linha->id") ?>">Editar</a> | <a href="<?= base_url("usuarios/excluir/$linha->id") ?>">Excluir</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
    