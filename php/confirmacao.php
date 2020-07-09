<?php
  session_start();
  if (!isset($_SESSION['logado'])) {
    header('location: ../index.html');
  }elseif (!isset($_SESSION['votar'])) {
    header('location: ../php/identificacao.php');
  }else{

    $nome=$_GET['nome'];
    $foto= $_GET['img'];
    $_SESSION['voto']= $_GET['idCand'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Eleição CIPA-Confirmar</title>
    <link rel="shortcut icon" href="../img/VLI.ico" type="image/x-icon" />
    <meta charset="utf-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style type="text/css">
    #text {
        position: absolute;
        top: 10%;
        left: 76%;
    }
    </style>
    <script type="text/javascript">
    function finalizado() {
        window.location = "registraVoto.php";
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
    <div class="row center ">
        <div class="container center">
            <h2>Confirme seu voto</h2>
            <div class="col s10 offset-s1 m10 offset-m1 grey lighten-2 center"
                style="border-radius: 10px; padding: 2%;">

                <div class="container col s8 offset-s2 m4 card">
                    <div class="card-image">
                        <img src="../img/<?php echo $foto ?>.png" class="responsive-img">
                    </div>
                </div>
                <?php
                if(isset($_GET['cargo'])){
                  ?>
                <div class="container col m8">
                    <div class="row">
                        <div class="container col m12">
                            <h5 class="center"><?php echo $nome; ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container col m12">
                            <h5 class="center"><?php echo $_GET['cargo']; ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container col m12">
                            <h5 class="center"><?php echo $_GET['area']; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light teal darken-5 large" onclick="finalizado();">Confirma
                        <i class="material-icons">send</i>
                    </button>
                </div>



                <?php
                }else{
                  ?>
                <div class="container col m8">
                    <div class="row">
                        <h5 class="center">VOTO <?php echo $nome; ?></h5>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light teal darken-5 large" onclick="finalizado();">Confirma
                        <i class="material-icons">send</i>
                    </button>
                </div>
                <?php
                }
              ?>
            </div>
        </div>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>

<?php

  }

  ?>