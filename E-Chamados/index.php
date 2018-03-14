<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Chamados</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
  <h1>Bem vindo ao E-chamados</h1>
  <p>Entre com o seu login e senha fornecidos</p> 
</div>
  <div class="container">
	<h2>Login:</h2>
		<?php 
			$errors = array(1=>"Usuário ou senha inválidos, tente mais uma vez",2=>"Você precisa estar logado para acessar esta área");
			$error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;
            if ($error_id == 1) {
				echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                }elseif ($error_id == 2) {
                    echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                    }
        ?>  
 
	<form action="autenticacao-usuario.php" method="POST"  role="form">  
		<div class="form-group">
			<label for="email">Nome:</label>
			<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
		</div>
		<div class="form-group">
			<label for="pwd">Senha:</label>
			<input type="password" name="password" class="form-control" placeholder="Password" required>
		</div>
		<button type="submit" class="btn btn-default">Entrar</button>
	</form>
</div>
</body>
</html>
