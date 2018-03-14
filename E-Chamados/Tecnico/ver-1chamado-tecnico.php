<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="tecnico"){
       header('Location: ../index.php?err=2');
    }
	$chamado = $_GET["chamado"];
?>
<?php
$tecnico = $_SESSION['sess_username'];
include("conecta-puxa-dados-admin.php");
// puxar produtos do banco
$sql_code2 = "select * from chamados1 WHERE Status='Aberto' AND Técnico='$tecnico'";
$execute2 = $mysqli->query($sql_code2) or die($mysqli->error);
$produto2 = $execute2->fetch_assoc();
$num2 = $execute2->num_rows;
?>
<?php
include("conexao.php");
$sql_code = "select contador,Local, Técnico, DataHora,Status,servico,serviexecu,DataHoraAber,DataHoraFim from chamados1 WHERE  contador='$chamado'";
$execute = $conn->query($sql_code) or die($conn->error);
$produto = $execute->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ver Chamado Técnico</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
 
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
  <h2 class="text-center"><strong>Dados do Chamado <?php echo $chamado;?></strong></h2>
        <div class="panel panel-default">
    <div class="panel-heading"><strong>Local do chamado:</strong></div>
    <div class="panel-body"><?php echo $produto['Local'];?></div>
	 <div class="panel-heading"><strong>Serviço Solicitado:</strong></div>
    <div class="panel-body"><?php echo $produto['servico'];?></div>
	 <div class="panel-heading"><strong>Data e Hora da abertura do Chamado:</strong></div>
    <div class="panel-body"><?php echo $produto['DataHora'];?></div>
	<div class="panel-heading"><strong>Serviço Executado:</strong></div>
    <div class="panel-body"><?php echo $produto['serviexecu'];?></div>
	<div class="panel-heading"><strong>Data e Hora Início do Atendimento:</strong></div>
    <div class="panel-body"><?php echo $produto['DataHoraAber'];?></div>
	<div class="panel-heading"><strong>Data e Hora Final do Atendimento:</strong></div>
    <div class="panel-body"><?php echo $produto['DataHoraFim'];?></div>
	<div class="panel-heading"><strong>Status do Chamado:</strong></div>
	<?php if ($produto['Status']=="Aberto"){?>
							
								<div class="panel-body" style="background-color:#F00;"> <?php echo $produto['Status']; ?></div>
								<?php } 
								elseif ($produto['Status']=="Feito") {?>
								<div class="panel-body" style="background-color:#0F0;"> <?php echo $produto['Status']; ?></div>
							<?php } ?>
    
  </div>
</div>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
