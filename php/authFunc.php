<?php
	include '../config/conexao.inc';


	$usu= $_POST['matr'];
	$senha= $_POST['senha'];

	$sql= mysqli_query($connect, "SELECT * FROM funcionario WHERE matricula= '$usu' AND cpf= '$senha'");

	if(mysqli_num_rows($sql)<=0){

		echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='identificacao.php';</script>";
		die();

	}else{

        $linha = mysqli_fetch_assoc($sql);

        if ($linha['v']=='1') {

        	echo"<script language='javascript' type='text/javascript'>alert('Voto já registrado!');window.location.href='identificacao.php';</script>";
        	
        }else{

        	session_start();
	        $_SESSION['votar']= true;
	        $_SESSION['id']= $linha['idFuncionario'];

	        header('location: votar.php');
        }

        
	}
?>