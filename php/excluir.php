<?php
	include '../config/conexao.inc';

	$id= $_GET['id'];

	$sql = "DELETE FROM usuario WHERE idUsuario=$id";


	if (mysqli_query($connect, $sql)) {
        header("Location: ".$_SERVER['HTTP_REFERER']."");
      }
      else {
        echo "Exclusao falhou";
     }
      
    mysqli_close($connect);

?>