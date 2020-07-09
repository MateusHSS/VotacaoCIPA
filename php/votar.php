<?php
  session_start();
  if (!isset($_SESSION['votacao']) || !isset($_SESSION['votar'])) {
    header('location: ../php/identificacao.php');
  }else if (!isset($_SESSION['logado'])) {
    header('location: ../index.html');
  }else{
?>

<!DOCTYPE html>
<html>

<head>
    <title>Eleição CIPA-Votar</title>
    <link rel="shortcut icon" href="../img/VLI.ico" type="image/x-icon" />
    <meta charset="utf-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <style type="text/css">
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    main {
        flex: 1 0 auto;
    }

    #text {
        position: absolute;
        top: 10%;
        left: 76%;
    }

    .foto{
        max-height: 270px;
    }
    </style>
    <script type="text/javascript">
    function confirmar() {
        location.href = '../php/confirmacao.php';
    }
    </script>
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
        <div class="row"></div>
        <div class="row"></div>

        <?php
      		include '../config/conexao.inc';

      		$sql='SELECT substring_index(f.nome, " ", 1) as nome, f.nome as nomeComp,  c.idCandidato, f.idFuncionario, c.cargo, c.area FROM candidato c, funcionario f WHERE f.idFuncionario=c.funcionario_idFuncionario ORDER BY f.nome ASC';
              $result= $connect->query($sql);

      		?>

        <div class="row center right-align">
            <div class="col m12 center">

                <?php

      		while ($res= $result->fetch_array()) {
      			echo "
      				<a href='confirmacao.php?nome=".$res['nomeComp']."&cargo=".$res['cargo']."&area=".$res['area']."&idCand=".$res['idCandidato']."&img=".$res['idFuncionario']."' class='black-text'>
			      			<div class='col s8 offset-s2 m2 offset-m1 card hoverable foto'>
				      			<div class='card-image'>
                                      <img src='../img/".$res['idFuncionario'].".png' class='responsive-img'>
				      			</div>
				    			<div class='card-content'>
				    				<p>".$res['nome']."</p>
				    			</div>
				      		</div>
				    </a>
			      		";
                  }
      		

      	?>
            </div>
        </div>


</body>

</html>
<?php
}
?>