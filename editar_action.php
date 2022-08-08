<?php
require 'config.php';
session_start();

if(isset($_SESSION['cpf'])){
	
  
}else{
	header("Location: login.php");
	exit;

}


    $id = filter_input(INPUT_POST,'id');
	$nome = filter_input(INPUT_POST,'nome');
	$sobrenome = filter_input(INPUT_POST,'sobrenome');
	$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
	$telefone = filter_input(INPUT_POST,'telefone');
	$contato = $_POST['contato'];
	$servico = $_POST['servico'];
	$dia = $_POST['dia'];
	$hora = $_POST['hora'];
	$barbeiro = $_POST['barbeiro'];

	if ($id && $nome && $sobrenome && $email && $telefone && $contato && $servico && $dia && $hora && $barbeiro) {
    

    $sql = $pdo->prepare("UPDATE clientes SET nome = :nome,sobrenome = :sobrenome,email = :email,
    telefone = :telefone,contato = :contato,servico = :servico,dia = :dia
			,hora = :hora,barbeiro = :barbeiro WHERE id_clientes=:id");
            
                $sql->bindvalue(':id',$id);
                $sql->bindvalue(':nome',$nome);
                $sql->bindvalue(':sobrenome',$sobrenome);
                $sql->bindvalue(':email',$email);
                $sql->bindvalue(':telefone',$telefone);
				$sql->bindvalue(':contato',$contato);
				$sql->bindvalue(':servico',$servico);
				$sql->bindvalue(':dia',$dia);
				$sql->bindvalue(':hora',$hora);
				$sql->bindvalue(':barbeiro',$barbeiro);
				$sql->execute();
				header("Location: agendados.php");
				exit;
}else{
	header("Location:agendados.php");
}

 
?>