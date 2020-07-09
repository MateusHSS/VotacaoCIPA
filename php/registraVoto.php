<?php
	include '../config/conexao.inc';

	session_start();
	$v= $_SESSION['voto'];
	$idFunc= $_SESSION['id'];

	$sql="UPDATE funcionario SET v= 1, voto= $v, horario= now() WHERE  idFuncionario=$idFunc ";

	$sql2= "UPDATE candidato SET votos= (votos+1) WHERE idCandidato= $v";

	if(mysqli_query($connect, $sql) && mysqli_query($connect, $sql2)){
		unset($_SESSION['id']);
		unset($_SESSION['voto']);
		header('location: votoConfirmado.php');
	}else{
		echo mysqli_error($connect);
	}
	





?>