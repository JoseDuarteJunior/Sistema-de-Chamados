<!DOCTYPE html>
<html lang="en">
<head>
  <title>cadastro tecnico </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

<!-- The Modal1 -->
  <div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Atenção</h4>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				Este nome de técnico já existe
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<a class="btn btn-danger btn-lg" href="insere_tecnico_res.php">
					Entendido
				</a>
			</div>
		</div>
    </div>
  </div>
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
			Cadastro de técnico realizado com sucesso !
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
		  <a class="btn btn-success" href="insere_tecnico_res.php">
   Entendido
</a>
        </div>
      </div>
    </div>
  </div>
<?php
    $link = mysqli_connect("localhost", "u641666397_jose", "99963225", "u641666397_chama");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
	$nomecompletotec = $_POST['nomecomptec'];
	$nomesistec = $_POST['nomesistec'];
	$senhatecni = $_POST['senhatec'];
   
	
	
	
		 $sql2 = "INSERT INTO usuarios(nome,username,password,role) VALUES ('$nomecompletotec','$nomesistec','$senhatecni','tecnico')";
	
	if(mysqli_query($link, $sql2)){
	
	
	if ($total = mysqli_affected_rows($link)){
        
		echo '<script type="text/javascript"> $("#myModal2").modal("show")</script>';
	}
    else{
        
		echo '<script type="text/javascript"> $("#myModal").modal("show")</script>';		
	}
   
} else{
   echo '<script type="text/javascript"> $("#myModal").modal("show")</script>';
}
	
	
	
	
	
	
	
	
	
	
	$sql = "INSERT INTO tecnicos(nome,NomeCompleto) VALUES ('$nomesistec','$nomecompletotec')";
	
	if(mysqli_query($link, $sql)){
	
	
	if ($total = mysqli_affected_rows($link)){
        
		echo '<script type="text/javascript"> $("#myModal2").modal("show")</script>';
	}
    else{
        
		echo '<script type="text/javascript"> $("#myModal").modal("show")</script>';		
	}
   
} else{
   echo '<script type="text/javascript"> $("#myModal").modal("show")</script>';
}
    
?>
</body>
</html>
