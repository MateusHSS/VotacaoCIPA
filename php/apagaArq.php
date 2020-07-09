<?php
	
	include '../config/conexao.inc';

	$arq= $_GET['arq'];
	$id= $_GET['id'];

	$sql= "DELETE FROM arquivo WHERE idDocumento='$id'";
	$result= $connect->query($sql);

	if ($result && unlink($arq)) {
		header('location: processoEleitoral.php');
	}else{
		echo "Falhou";
	}






?>