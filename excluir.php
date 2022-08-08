<?php
require 'config.php';
session_start();

if(isset($_SESSION['cpf'])){
	
  
}else{
	header("Location: login.php");
	exit;

}

    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql="DELETE FROM clientes WHERE id_clientes= '$id'";
        $pdo->query($sql);
        header("Location: agendados.php");
    }
   
?>