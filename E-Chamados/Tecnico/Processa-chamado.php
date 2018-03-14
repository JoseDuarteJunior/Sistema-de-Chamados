<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chamado feito</title>
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
			Chamado realizado com sucesso !
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
		  <a class="btn btn-success" href="Tecnico-Home.php">
   Entendido
</a>
        </div>
      </div>
    </div>
  </div>
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="tecnico"){
      header('Location: ../index.php?err=2');
    }
		
?>
<?php
    include_once("conexao.php");	
	//parte nova
	$servicoexecutado = $_POST['servicoexe'];
	$datainiciofez = $_POST['dateFrom'];
	$numeroos = $_POST['var'];
	$datafimfez = $_POST['dateFrom2'];
	
	$status = "Feito";
	$query = "UPDATE chamados1 SET serviexecu = '".$servicoexecutado."', DataHoraAber = '".$datainiciofez."',DataHoraFim = '".$datafimfez."',Status = '".$status."' WHERE (contador = ".$numeroos.")";
   
      $resultado_usuario = mysqli_query($conn, $query);
  

if ($conn->query($query) === TRUE) {
    echo '<script type="text/javascript"> $("#myModal2").modal("show")</script>';
} else {
    echo "Error updating record: " . $conn->error;
}
	$conn->close();
?>