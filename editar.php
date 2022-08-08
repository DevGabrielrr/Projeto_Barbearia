<?php
require 'config.php';


if(isset($_GET['id'])) {

$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE id_clientes = '$id'";
$sql = $pdo->query($sql);
    if($sql->rowCount() > 0){
        $lista = $sql->fetch();
    
    }else {
        header("Location: agendados.php");
        exit;
    }

	}else{
		header("Location: agendados.php ");
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../projeto gabriel\css\reset.css">
    <link rel="shortcut icon" href="../projeto gabriel\favicon\favicon-16x16.png"type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../projeto gabriel\css\style.css">
    <title>Editar</title>
</head>
<body>

<h1> <img src="../projeto gabriel\imagens\logo.png" alt="Nossa logo" title="Logo Oficial"> </h1>

    <h2 id="titulo">Editar Cliente</h2>

    <form method="POST" action="editar_action.php">

   	 <input type="hidden" name="id" value="<?=$lista['id_clientes'];?>"/>

     <label for="Nome">Nome</label>
				<input type="text" name="nome" value="<?=$lista['nome'];?>"  
                class="input-padrao" required/>

				<label for="Sobrenome">Sobrenome</label>
				<input type="text" id="Sobrenome" name="sobrenome"  class="input-padrao" required value="<?=$lista['sobrenome'];?>"/>


				<label for="EndEmail">E-mail</label>
				<input type="email" id="EndEmail" name="email"  class="input-padrao" required placeholder="seuemail@dominio.com" value="<?=$lista['email'];?>"/>

				<label for="Telefone">Telefone</label>
				<input type="tel" id="Telefone" name="telefone"  class="input-padrao" required placeholder="(xx) xxxxx-xxx" value="<?=$lista['telefone'];?>"/>
				

				<fieldset>
					<legend>Como Podemos entrar em Contato:</legend> 

					<label for="radio-email"><input type="radio" name="contato"  id="radio-email" value="<?=$lista['contato'];?>">Email</label>
					

					<label for="radio-telefone"><input type="radio" name="contato"  id="radio-telefone" value="<?=$lista['contato'];?>">Telefone</label>
					


					<label for="radio-Whatsapp"><input type="radio" name="contato" 	id="radio-whatsApp" checked  value="<?=$lista['contato'];?>">WhatsApp</label>
					
				</fieldset>
				<br>

				<p class="opcoes">Qual Serviço para seu atendimento: <select name="servico" value="<?=$lista['servico'];?>"></p>
				 
				
					<option>Cabelo</option>
					<option>Barba</option>
					<option>Cabelo+Barba</option>
				</select>
				<br>
				<br>

				<fieldset>
					<label>Qual Seria o Melhor Dia e horário para seu atendimento:</label>
					<input type="date" name="dia" class="atendi" value="<?=$lista['dia'];?>"/>  <input type="time" name="hora" class="atendi" value="<?=$lista['hora']?>"/>	
				</fieldset>
				<br>

				<p class="opcoes">Alguma Preferência pelo Profissional: <select name="barbeiro" value="<?=$lista['barbeiro'];?>"></p>
				
					<option>Aleatório</option>
					<option>Marcos</option>
					<option>Paulo</option>
					<option>Willian</option>
					<option>João</option>
					<option>Lucas</option>
				</select>


				<label class="checkbox"><input type="checkbox" checked>"Gostaria de receber as novidades da BarberC@l por e-mail?"</label>


				<button type="submit" value="Enviar" name="enviar" class="enviar">Enviar</button>
				
	   </form>

     <footer >
			<img src="../projeto gabriel\imagens\logo_branco.png" alt="nosso logo" title="Logo Barberc@al">
			<p class="copy"> ©Copyright BarberC@l - 2021</p>
		</footer>
</body>
</html>