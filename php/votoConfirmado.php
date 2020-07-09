<?php
  session_start();
  if (!isset($_SESSION['logado'])) {
    header('location: ../index.html');
  }elseif (!isset($_SESSION['votar'])) {
    header('location: ../php/identificacao.php');
  }else{
    unset($_SESSION['voto']);

?>

<!DOCTYPE html>
<html>
	<head>
    <title>Eleição CIPA-Voto confirmado</title>
    <link rel="shortcut icon" href="../img/VLI.ico" type="image/x-icon" />
		<meta charset="utf-8">
      	<!--Import Google Icon Font-->
      	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      	<!--Import materialize.css-->
      	<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      	<!--Let browser know website is optimized for mobile-->
      	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style type="text/css">
          #text{
            position: absolute;
            top: 10%;
            left: 76%;
          }
        </style>
    </head>

    <body>
    	<nav class="white " role="navigation">
			<div class="new-wrapper container">
				<a class="brand-logo left"><img src="../img/cipaLogo100.png"></a>
				<a class="brand-logo center black-text"><b>ELEIÇÃO CIPA</b></a>
				<ul class="right">
					<li><img src="../img/vliLogo100.png"></li>
				</ul>
		    </div>
		</nav>
    <div class="row">
      <h6 id="text">Corredor Centro-Leste</h6>
    </div>

    <div class="container center">
      <h1 class="green-text">Voto confirmado!</h1>
    </div>
    
    <audio autoplay src="../audio/confirma.mp3"></audio>





    <META HTTP-EQUIV="REFRESH" CONTENT="3; URL=identificacao.php">
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>

  <?php

  }

  unset($_SESSION['votar']);

  ?>