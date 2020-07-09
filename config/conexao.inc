<?php

$banco= "id10206348_cipa";
$host= "localhost";
$user= "id10206348_root";
$senha= "47126";

$connect = mysqli_connect($host, $user, $senha, $banco) or die("Error " . mysqli_error($connect));

mysqli_set_charset($connect,"utf8");

?>