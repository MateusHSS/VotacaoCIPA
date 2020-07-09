<?php
   
 include_once('../config/conexao.inc');

   $nomeArq= $_FILES['arquivo']['name'];
   $pastaArq= '../pdf/'.$_FILES['arquivo']['name'];

 $sql = "INSERT INTO arquivo(nomeDocumento, caminhoDocumento) VALUES ('$nomeArq', '$pastaArq')";

 if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $pastaArq) && $connect->query($sql)){

   header('location: processoEleitoral.php');
   
 } else {
   echo "Erro ao enviar";
 }

 

?>