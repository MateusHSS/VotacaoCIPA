<?php
	include 'conexao.inc';


	$campo = $_POST['matricula'];

	$sql=$connect->prepare("SELECT nome, cpf, unid  FROM funcionario WHERE matricula LIKE '%$campo%'");
    $sql->execute();
    $sql->bind_result($nome, $cpf, $unid);

	while ($sql->fetch()) {
        echo "
            <div class='input-field col l6 dado'>
              <label for='nome'>Nome completo</label>
              <input id='nome' type='text' class='validate' name='nome' value='$nome'> 
            </div>            
            <div class='input-field col l6 dado'>
              <input id='cpf' type='text' class='validate' name='cpf' value='$cpf'>
              <label for='cpf'>CPF</label>
            </div>
            <div class='input-field col l6 dado'>
              <select id='unid' name='unid' value='$unid'>
                <option value=' disabled selected>Selecione sua unidade:</option>
                <option value='3'>Araguari</option>
                <option value='5'>Araxá</option>
                <option value='1'>Divinópolis</option>
                <option value='6'>Eldorado</option>
                <option value='7'>Horto</option>
                <option value='4'>Ibiá</option>
                <option value='2'>Itacibá</option>
              </select>
              <label>Unidade</label>
            </div>
        ";
    }    

?>