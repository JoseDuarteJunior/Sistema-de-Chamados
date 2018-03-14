<?php
include("conexao.php");
$itens_por_pagina = 12;
$pagina = intval($_GET['pagina']);
$item = $pagina * $itens_por_pagina;
$sql_code = "select * from tecnicos ORDER BY id DESC LIMIT $item, $itens_por_pagina";
$execute = $conn->query($sql_code) or die($conn->error);
$produto = $execute->fetch_assoc();
$num = $execute->num_rows;
$num_total = $conn->query("select * from tecnicos")->num_rows;
$num_paginas = ceil($num_total/$itens_por_pagina);
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="admin"){
      header('Location: Home.php?err=2');
    }
?>
<?php
include("conecta-puxa-dados-admin.php");
$sql_code2 = "select * from chamados1 WHERE Status='Aberto'";
$execute2 = $mysqli->query($sql_code2) or die($mysqli->error);
$produto2 = $execute2->fetch_assoc();
$num2 = $execute2->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Todos os técnicos</title>
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
			<a class="navbar-brand" href="#">E-Chamados</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="Admin-Home.php">Home</a></li>
				<li>
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Chamados<span class="caret"></span></a>
					<ul class="dropdown-menu multi-level">
						<li><a href="Abrir-chamado-admin.php">Abrir Chamado</a></li>
						<li><a href="Deletar-chamado-admin.php">Deletar Chamado</a></li>	
						<li><a href="Chamados_abertos.php">Chamados em Aberto <span class="badge badge-danger"><?php echo $num2;?></span></a></li>
						<li><a href="Chamados_concluidos.php">Chamados Concluídos</a></li>			
						<li><a href="Ver-chamados-admin.php">Listar Chamado</a></li>
					</ul>
				</li>		
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Técnico<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="insere_tecnico_res.php">Inserir Técnico</a></li>
						<li><a href="remove_tecnico_res.php">Remover Técnico</a></li>
						<li><a href="Ver-tecnicos.php">Ver Técnicos</a></li>
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
  <h2>Lista de técnicos</h2>
  <p>Técnicos registrados no Sistema</p>    
  <table class="table table-striped table table-bordered">
	<?php if($num > 0){ ?>
		<thead>
		<tr>
		<th>Nome Sistema</th>
		<th>Nome Completo</th>
		</tr>
		</thead>
		<tbody>
		<?php do{ ?>
			<tr>
				<td><?php echo $produto['nome'];?></td>
				<td><?php echo $produto['NomeCompleto'];?></td>
				</tr>
				<?php } while($produto = $execute->fetch_assoc()); ?>
					</tbody>
	</table>
  
  <nav>
		<ul class="pagination">
			<li>
				<a href="Ver-tecnicos.php?pagina=0" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<?php 
			for($i=0;$i<$num_paginas;$i++){
				$estilo = "";
				if($pagina == $i)
					$estilo = "class=\"active\"";
				    ?>
						<li <?php echo $estilo; ?> ><a href="Ver-tecnicos.php?pagina=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
					<?php } ?>
				    <li>
						<a href="Ver-tecnicos.php?pagina=<?php echo $num_paginas-1; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
				    </li>
		</ul>
	</nav>
  				<?php } ?>
</div>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
