<?php
	include '../config/conexao.inc';

	$matricula= $_POST['matricula'];
	$senha= md5($_POST['senha']);

  $sql=mysqli_query($connect, "SELECT idFuncionario FROM funcionario WHERE matricula=$matricula");

  if (mysqli_num_rows($sql)<=0) {
      
    echo"<script language='javascript' type='text/javascript'>alert('Matrícula inexistente');window.location.href='gerencia.php';</script>";

  }else {

      $linha= mysqli_fetch_assoc($sql);

      $id= $linha['idFuncionario'];

      $sql1 = "INSERT INTO usuario (funcionario_idFuncionario, login, senha) VALUES ('$id', '$matricula', '$senha')";

      if (mysqli_query($connect, $sql1)) {
          header('location: gerencia.php');
      }else {
          $erro1= mysqli_error($connect);
          echo $erro1;
      }
   }

  mysqli_close($connect);

?>
