<?php
require 'config.php';

session_start();
if(isset($_SESSION['cpf']) && !empty($_SESSION['cpf'])){

}else{
	echo "Página Restrita";
	header("Location: login.php");
	exit;

}


$lista = [];
$sql = $pdo->query("SELECT * FROM clientes");
if($sql->rowCount() > 0){
	$lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Agendados</title>
	<meta name="viewport" content="width=device-width, initial-escale=1.0">
	<link rel="stylesheet" type="text/css" href="../projeto gabriel\css\reset.css">
	<link rel="shortcut icon" href="../projeto gabriel\favicon\favicon-16x16.png"type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../projeto gabriel\css\style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	
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
				</ul>	

			</nav>

		</div>

	</header>
	<main>

			<h2 id="titulo">Agendados</h2>
			
<div class="container-fluid">
<br/>	

</br></br>
<table border='1' width='100%' class="table table-hover table-dark">
<tr>
<th>ID</th>
<th>Nome</th>
<th>Sobrenome</th>
<th>Email</th>
<th>Telefone</th>
<th>Contato</th>
<th>Serviço</th>
<th>Dia</th>
<th>Horário</th>
<th>Barbeiro</th>
<th>Ações</th>
</tr>
<?php foreach($lista as $clientes): ?>
<tr>
<td> <?php echo $clientes['id_clientes']; ?> </td>
<td> <?=$clientes['nome'];?> </td>
<td> <?=$clientes['sobrenome'];?> </td>
<td> <?=$clientes['email'];?> </td>
<td> <?=$clientes['telefone'];?> </td>
<td> <?=$clientes['contato'];?> </td> 
 <td> <?=$clientes['servico'];?> </td>
<td> <?=date('d/m/Y', strtotime($clientes['dia']));?> </td> 
<td> <?=$clientes['hora'];?> </td>
<td> <?=$clientes['barbeiro'];?> </td>
<td>
<a href="editar.php?id=<?=$clientes['id_clientes'];?>" class="btn btn-success btn-sm">[Editar]</a>
<a href="excluir.php?id=<?=$clientes['id_clientes'];?>" onclick="return confirm('Tem certeza que deseja excluir?')"  class= "btn btn-danger btn-sm">[Excluir]</a>
</td> 
</tr>
<?php endforeach; ?>

</table>

<a href="sair.php"  class="btn btn-outline-danger btn-block btn-sm" > SAIR </a>
</div>

</div>

		</main>

		<footer >
			<img src="../projeto gabriel\imagens\logo_branco.png" alt="nosso logo" title="Logo Barberc@al">
			<p class="copy"> ©Copyright BarberC@l - 2021</p>
		</footer>

		<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"/></script>
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"/></script>

</body>
</html>
