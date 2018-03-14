<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="tecnico"){
     header('Location: ../index.php?err=2');
    }
	$chamado = $_GET["chamado"];
	
?>
<?php
include("conexao.php");
$itens_por_pagina = 10;
$pagina = intval($_GET['pagina']);
$tecnico = $_SESSION['sess_username'];
$sql_code = "select contador,Local, Técnico, DataHora,Status,servico from chamados1 WHERE  contador='$chamado'";
$execute = $conn->query($sql_code) or die($conn->error);
$produto = $execute->fetch_assoc();
$num = $execute->num_rows;
$num_total = $conn->query("select contador,Local, Técnico, DataHora,Status,servico from chamados1 WHERE  Técnico='$tecnico'")->num_rows;
$num_paginas = ceil($num_total/$itens_por_pagina);
?>
<?php
include("conecta-puxa-dados-admin.php");
// puxar produtos do banco
$sql_code2 = "select * from chamados1 WHERE Status='Aberto' AND Técnico='$tecnico'";
$execute2 = $mysqli->query($sql_code2) or die($mysqli->error);
$produto2 = $execute2->fetch_assoc();
$num2 = $execute2->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fazer Chamado</title>
  <meta charset="utf-8">
  <!Bootstrap>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
  <!Bootstrap traduz calendario>
  <script type="text/javascript" src="/bootstrap/pt-br.js"></script>
 </head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">E-Chamados Técnico</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="Tecnico-Home.php">Home</a></li>
        <li>
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Chamados<span class="caret"></span></a>
		  <ul class="dropdown-menu multi-level">
			<li><a href="Chamados_abertos_tec.php">Chamados em Aberto <span class="badge badge-danger"><?php echo $num2;?></span></a></li>
            <li><a href="Chamados_concluidos_tec.php">Chamados Concluídos</a></li>			
            <li><a href="Ver-chamados-tec.php">Listar Chamado</a></li>
          </ul>
        </li>		
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Sair</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <h2>Dados do Chamado <?php echo $chamado;?></h2>
  <div class="panel panel-default">
    <div class="panel-heading"><strong>Local do chamado:</strong></div>
    <div class="panel-body"><?php echo $produto['Local'];?></div>
	 <div class="panel-heading"><strong>Serviço Solicitado:</strong></div>
    <div class="panel-body"><?php echo $produto['servico'];?></strong></div>
	 <div class="panel-heading"><strong>Data e Hora da abertura do Chamado:</strong></div>
    <div class="panel-body"><?php echo $produto['DataHora'];?></div>
  </div>
</div>
	<div class="container">
  <h2>Preencha:</h2>
<form method="POST" action="Processa-chamado.php">
	 <div class="form-group">
	 <input type="hidden" name="var" id="var" value="<?php print $chamado ?>" />
      <label for="comment">Serviço Executados:</label>
      <textarea name="servicoexe" class="form-control" rows="5" id="servicoexe" /></textarea>
    </div>
	<label for="datetimepicker1">Data e Hora Inicio do Atendimento:</label>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" name="dateFrom" required />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                   $('#datetimepicker1').datetimepicker({
                //format: 'DD/MM/YYYY',
                 locale: 'pt-br'
					});
				});
            </script>
        </div>
	<label for="datetimepicker1">Data e Hora Final do Atendimento:</label>
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker2'>
                        <input type='text' class="form-control" name="dateFrom2" required />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                   $('#datetimepicker2').datetimepicker({
                //format: 'DD/MM/YYYY',
                 locale: 'pt-br'
					});
				});
            </script>
        </div>
    <button type="submit" class="btn btn-default">Salvar Chamado</button>
  </form>
  </div>
</body>
</html>
