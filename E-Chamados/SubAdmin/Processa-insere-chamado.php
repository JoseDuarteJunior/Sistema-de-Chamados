<!DOCTYPE html>
<html lang="en">
<head>
  <title>Insere Chamado</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

  <!-- The Modal2 -->
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Atenção</h4>         
        </div>
        <!-- Modal body -->
        <div class="modal-body">
			Chamado Aberto com sucesso !
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
		  <a class="btn btn-success" href="Admin-Home.php">
   Entendido
</a>
        </div>
      </div>
    </div>
  </div>
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="subadim"){
       header('Location: ../index.php?err=2');
    }
?>
<?php
    include_once("conexao.php");
	$local = $_POST['local'];
	$servico = $_POST['servico'];
	$tecnico = $_POST['id'];
	$data_atendimento = $_POST['dateFrom'];
	$status = "Aberto";
    $result_usuario = "INSERT INTO chamados1(Local,DataHora,Técnico,Status,servico) VALUES ('$local','$data_atendimento','$tecnico','$status','$servico')";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(mysqli_affected_rows($conn) != 0){
		echo '<script type="text/javascript"> $("#myModal2").modal("show")</script>';
		}else{
				echo "ERRO";    
            }
?>