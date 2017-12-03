<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Editar Usuário</h3>
  </div>
    <div class="panel-body">
        <div>
                <div class="col-md-6" style="padding-top: 15px;">
                    <form role="form" method="post" action="<?= base_url('usuarios/salvar') ?>">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?= !empty($usuario->nome)? $usuario->nome: '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= !empty($usuario->email)? $usuario->email: ''  ?>">
                        </div>

                        <div class="form-group">
                            <label for="senha_antiga">Senha Antiga</label>
                            <input type="password" name="senha_antiga" class="form-control">
                            <?php $erro = $this->session->flashdata("erro"); ?>
                            <?php if(!empty($erro)): ?>
                            <?php echo $erro; ?>                    
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="nova_senha">Nova Senha</label>
                            <input type="password" name="nova_senha_2" id="nova_senha_2" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Salvar" class="btn btn-success">
                        </div>
                        <input type="hidden" id="id_usuario" name="id_usuario" value="<?= !empty($usuario->id)? $usuario->id: '' ?>">
                </form>
            </div>
        </div>
    </div>
</div>