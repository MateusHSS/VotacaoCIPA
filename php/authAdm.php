<?php
	include '../config/conexao.inc';


	$usu= $_POST['usu'];
	$senha= md5($_POST['senha']);

	if (empty($usu) || empty($senha)) {
		header('location: ../index.php');
	}else{
		$sql= mysqli_query($connect, "SELECT u.idUsuario, f.nome, f.matricula, u.senha FROM usuario u, funcionario f WHERE u.login= '$usu' AND u.senha= '$senha' AND f.idFuncionario= u.funcionario_idFuncionario");

		if(mysqli_num_rows($sql)<=0){
			echo"<script language='javascript' type='text/javascript'>alert('Usuário e/ou senha incorretos!');window.location.href='../index.php';</script>";
		}else{
	        $linha = mysqli_fetch_assoc($sql);

	        session_start();
	        $_SESSION['id']= $linha['idUsuario'];
	        $_SESSION['nome']= $linha['nome'];
	        $_SESSION['matr']= $linha['matricula'];
	        $_SESSION['senha']= $linha['senha'];
			$_SESSION['logado']= true;

	        header("location: adm.php");
		}
	}
?>