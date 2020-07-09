<?php
	include '../config/conexao.inc';

    $nome= $_POST['nome'];
    $cpf= $_POST['cpf'];
    $matricula= $_POST['matricula'];
    $gerencia= $_POST['gerencia'];
    $supervisao= $_POST['supervisao'];
    $unidade= $_POST['unid'];

    $sql="INSERT INTO funcionario (nome, cpf, matricula, gerencia, supervisao, unid) VALUES ('$nome', '$cpf', '$matricula', '$gerencia', '$supervisao', '$unidade')";

    if (mysqli_query($connect, $sql)) {
        header('location: gerencia.php');
    }else {
        $erro1= mysqli_error($connect);
        echo $erro1;
    }
?>