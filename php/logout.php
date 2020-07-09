<?php
	session_start();

	if (!isset($_SESSION['logado'])) {
	    header('location: ../index.php');
	}elseif (isset($_SESSION['votar'])) {
	    header('location: votar.php');
	}elseif (isset($_SESSION['votacao'])) {
		header('location: identificacao.php');
	}else{

		session_destroy();
		header('location: ../index.php');	
	}

?>