<?php
require 'config.php';
	
if(isset($_POST['enviar'])){
	
	$nome = filter_input(INPUT_POST,'nome');
	$sobrenome = filter_input(INPUT_POST,'sobrenome');
	$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
	$telefone = filter_input(INPUT_POST,'telefone');
	$contato = $_POST['contato'];
	$servico = $_POST['servico'];
	$dia = $_POST['dia'];
	$hora = $_POST['hora'];
	$barbeiro = $_POST['barbeiro'];

	$sql = "SELECT * FROM clientes WHERE nome = :nome AND sobrenome =:sobrenome AND email = :email AND telefone = :telefone";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(':nome',strtolower($nome));
	$sql->bindValue(':sobrenome',ucwords(strtolower($sobrenome)));
	$sql->bindValue(':email',$email);
	$sql->bindValue(':telefone',$telefone);
	$sql->execute();

	if($sql->rowCount()){
			
			$sql = $pdo->prepare("UPDATE clientes SET telefone = :telefone,contato = :contato,servico = :servico,dia = :dia
			,hora = :hora,barbeiro = :barbeiro");
				$sql->bindValue(':telefone',$telefone);
				$sql->bindValue(':contato',$contato);
				$sql->bindValue(':servico',$servico);
				$sql->bindValue(':dia',$dia);
				$sql->bindValue(':hora',$hora);
				$sql->bindValue(':barbeiro',$barbeiro);
				$sql->execute();
				header("Location: contatos.php");
				exit;

		}else {
			$sql = $pdo->prepare("INSERT INTO clientes(nome,sobrenome,email,telefone,contato,servico,dia,hora,barbeiro) 
					VALUES (:nome,:sobrenome,:email,:telefone,:contato,:servico,:dia,:hora,:barbeiro)");
			 
		
				$sql->bindValue(':nome',ucwords(strtolower($nome)));
				$sql->bindValue(':sobrenome',ucwords(strtolower($sobrenome)));
				$sql->bindValue(':email',strtolower($email));
				$sql->bindValue(':telefone',$telefone);
				$sql->bindValue(':contato',$contato);
				$sql->bindValue(':servico',$servico);
				$sql->bindValue(':dia',$dia);
				$sql->bindValue(':hora',$hora);
				$sql->bindValue(':barbeiro',$barbeiro);
				$sql->execute();
				header("Location: contatos.php");
				exit;
		}
	
	}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Contatos</title>
	<meta name="viewport" content="width=device-width, initial-escale=1.0">
	<link rel="stylesheet" type="text/css" href="../projeto gabriel\css\reset.css">
	<link rel="shortcut icon" href="../projeto gabriel\favicon\favicon-16x16.png"type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../projeto gabriel\css\style.css">
	
</head>
<body>

	<header>
		<div class="caixacentral">

		<h1> <img src="../projeto gabriel\imagens\logo.png" alt="Nossa logo" title="Logo Oficial"> </h1>

			<nav>

				<ul>
						
					<li> <a href="../projeto gabriel\index.php"> Home</a> </li>
					<li> <a href="../projeto gabriel\produtos.php">Produtos</a></li>
					<li> <a href="../projeto gabriel\contatos.php">Contatos</a></li>
					<li> <a href="../projeto gabriel\agendados.php">Agendados</a></li>
				</ul>	

			</nav>

		</div>

	</header>
	<main>

			<h2 id="titulo">Agendamentos</h2>
			<form  method="POST">

				<label for="Nome">Nome</label>
				<input type="text" name="nome" class="input-padrao" required/>

				<label for="Sobrenome">Sobrenome</label>
				<input type="text" id="Sobrenome" name="sobrenome" class="input-padrao" required/>


				<label for="EndEmail">E-mail</label>
				<input type="email" id="EndEmail" name="email" class="input-padrao" required placeholder="seuemail@dominio.com"/>

				<label for="Telefone">Telefone</label>
				<input type="tel" id="Telefone" name="telefone" class="input-padrao" required placeholder="(xx) xxxxx-xxx"/>
				

				<fieldset>
					<legend>Como Podemos entrar em Contato:</legend> 

					<label for="radio-email"><input type="radio" name="contato" value="email" id="radio-email">Email</label>
					

					<label for="radio-telefone"><input type="radio" name="contato" value="telefone" id="radio-telefone">Telefone</label>
					


					<label for="radio-Whatsapp"><input type="radio" name="contato" value="whatsApp" 	id="radio-whatsApp" checked>WhatsApp</label>
					
				</fieldset>
				<br>

				<p class="opcoes">Qual Serviço para seu atendimento: <select name="servico"></p>
				 
				
					<option value="cabelo">Cabelo</option>
					<option value="barba">Barba</option>
					<option value="cabelo+barba">Cabelo+Barba</option>
				</select>
				<br>
				<br>

				<fieldset>
					<label>Qual Seria o Melhor Dia e horário para seu atendimento:</label>
					<input type="date" name="dia" class="atendi"/>  <input type="time" name="hora" class="atendi"/>	
				</fieldset>
				<br>

				<p class="opcoes">Alguma Preferência pelo Profissional: <select name="barbeiro"></p>
				
					<option>Aleatório</option>
					<option>Marcos</option>
					<option>Paulo</option>
					<option>Willian</option>
					<option>João</option>
					<option>Lucas</option>
				</select>


				<label class="checkbox"><input type="checkbox" checked>"Gostaria de receber as novidades da BarberC@l por e-mail?"</label>


				<button type="submit" value="Enviar" name="enviar" class="enviar" onclick="return confirm('Agendado com Sucesso!')">Enviar</button>
				
			</form>


		</main>

		<footer >
			<img src="../projeto gabriel\imagens\logo_branco.png" alt="nosso logo" title="Logo Barberc@al">
			<p class="copy"> ©Copyright BarberC@l - 2021</p>
		</footer>


</body>
</html>
