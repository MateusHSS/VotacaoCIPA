<?php
	include '../config/conexao.inc';

	$id= $_GET['id'];
  $senha= md5($_POST['novaSenha']);

	$sql = "UPDATE usuario SET senha='$senha' WHERE idUsuario=$id";


	if (mysqli_query($connect, $sql)) {
        header("Location: ".$_SERVER['HTTP_REFERER']."");
      }
      else {
        echo "Alteração falhou";
     }
      
    mysqli_close($connect);

?>