<?php
	session_start();
	unset($_SESSION['cpf']); //destroi...
	header("Location: login.php");
	exit;
?>