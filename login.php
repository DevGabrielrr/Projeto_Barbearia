<?php
	require 'config.php';
	$dados = [];

	$cpf   = filter_input(INPUT_POST,'cpf');
	$senha = filter_input(INPUT_POST,'senha');

	if($cpf && $senha){

		$sql = $pdo->prepare("SELECT * FROM funcionarios WHERE cpf = :cpf AND senha = :senha");
		$sql->bindvalue(':cpf',$cpf);
		$sql->bindvalue('senha',$senha);
		$sql->execute();
		

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetch(PDO::FETCH_ASSOC);
			

		}if($dados['cpf'] == $cpf ){
			session_start();
			$_SESSION['cpf'] = $dados['cpf'];
			$_SESSION['senha'] = $dados['senha'];
			header("Location: agendados.php");
			exit;

		}else{
			$_SESSION['cpf'] = $dados['cpf'];
			$_SESSION['senha'] = $dados['senha'];
			header("Location: login.php");
			exit;

			}
		}
	?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-escale=1.0">
	<link rel="stylesheet" type="text/css" href="../projeto gabriel\css\reset.css">
	<link rel="shortcut icon" href="../projeto gabriel\favicon\favicon-16x16.png"type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../projeto gabriel\css\style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>

	
</head>
<body>
	<h1></h1>
	<div class="container"> 
		<form method="POST">
			<h3> Login </h3>
				<input type="number" name="cpf" placeholder="CPF" required></br></br>

				<input type="password" name="senha" placeholder="Senha" required></br></br>
				<button type="submit" name="entrar" class="btn btn-info">Entrar</button> 
	
		</form>
	</div>



		<footer >
			<img src="../projeto gabriel\imagens\logo_branco.png" alt="nosso logo" title="Logo Barberc@al">
			<p class="copy"> ©Copyright BarberC@l - 2021</p>
		</footer>

        <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"/></script>
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"/></script>
</body>
</html>
