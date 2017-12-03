<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="https://www.eduzz.com/assets/img/icon/android-icon-48x48.png" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sistema Para Candidatos Eduzz</title>
    <script>
        var base_url = '<?= base_url();?>'
    </script>
    <!-- Jquery -->
    <link href="<?= base_url('includes/jqueryUI/css/jquery-ui.structure.min.css')?>" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link href="<?= base_url('includes/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?= base_url('includes/bootstrap/datepicker/css/datepicker.css')?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= base_url('includes/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?= base_url('includes/bootstrap/datepicker/js/bootstrap-datepicker.js')?>"></script>
    <script src="<?= base_url('includes/jqueryUI/js/jquery.js')?>"></script>
    <script src="<?= base_url('includes/jqueryUI/css/jquery-ui.js')?>"></script>
    
    <script>
    $(function(){
       $( "#busca_candidatos" ).autocomplete({
            source: base_url+"candidatos/autocomplete"
        });
    });
    
    
    </script>
  </head>
   <body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">EDUZZ</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="<?= base_url('candidatos'); ?>">Candidatos</a></li>
        <li><a href="<?= base_url('compromissos')?>">Compromissos</a></li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" id="busca_candidatos" name="busca_candidatos" placeholder="Digite o nome do candidato">
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
              <a href="<?= base_url('configuracoes') ?>" class="dropdown" data-toggle="dropdown">Configurações <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="<?= base_url('usuarios') ?>">Usuários</a></li>
                  <li><a href="<?= base_url('configuracoes') ?>">Configurações Gerais</a></li>
              </ul>
          </li>
        <li><a href="#">Sair</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>
