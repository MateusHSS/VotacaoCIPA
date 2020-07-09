<?php
	session_start();
	if (!isset($_SESSION['logado'])) {
		header('location: ../index.php');
	}else {
		include '../config/conexao.inc';


		$senha= md5($_POST['senhaE']);

		if ($senha == $_SESSION['senha']) {
			unset($_SESSION['votacao']);
			header("location: adm.php");
		}else{
			echo"<script language='javascript' type='text/javascript'>alert('Senha incorreta!');window.location.href='identificacao.php';</script>";
		}
	}
	

?>