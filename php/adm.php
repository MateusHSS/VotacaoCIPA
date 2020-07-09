<?php
  session_start();
  if (isset($_SESSION['votacao'])) {
    header('location: identificacao.php');
  }else if (!isset($_SESSION['logado'])) {
    header('location: ../index.php');
  }else {

?>

<!DOCTYPE html>
<html>

<head>
    <title>Eleição CIPA-ADM</title>
    <link rel="shortcut icon" href="../img/VLI.ico" type="image/x-icon" />
    <meta charset="utf-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style type="text/css">
    .center-align {
        position: relative;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    #text {
        position: absolute;
        top: 10%;
        left: 76%;
    }

    #usu {
        position: absolute;
        left: 1%;
        font-size: 90%;
    }

    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    main {
        flex: 1 0 auto;
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
        <h6 id="usu">Usuário: <?php echo $_SESSION['nome']; ?></h6>
        <h6 id="text">Corredor Centro-Leste</h6>
    </div>

    <main>
        <div class="row center" style="margin-top: 10%; margin-left: 5%;">
            <div class="container col m8 offset-m2">
                <a href="votar.php">
                    <div class="col s4 offset-s2 m2 card">
                        <div class="card-image">
                            <img src="../img/voto.png" class="responsive-img">
                        </div>
                        <div class="card-content">
                            <p>Abrir Votação</p>
                        </div>
                    </div>
                </a>
                <a href="relatorio.php">
                    <div class="col s4 offset-s2 m2 offset-m1 card">
                        <div class="card-image">
                            <img src="../img/grafico.png" class="responsive-img">
                        </div>
                        <div class="card-content">
                            <p>Parciais votação</p>
                        </div>
                    </div>
                </a>
                <a href="gerencia.php">
                    <div class="col s4 offset-s2 m2 offset-m1 card">
                        <div class="card-image">
                            <img src="../img/cadastroCand.png" class="responsive-img">
                        </div>
                        <div class="card-content">
                            <p>Gerenciar usuários</p>
                        </div>
                    </div>
                </a>
                <a href="processoEleitoral.php">
                    <div class="col s4 offset-s2 m2 offset-m1 card">
                        <div class="card-image">
                            <img src="../img/processoEleit.png" class="responsive-img">
                        </div>
                        <div class="card-content">
                            <p>Processo eleitoral</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>

    <footer class="page-footer white">
        <div class="footer-copyright white">
            <div class="container center">
                <a href="logout.php"><button class="btn white red-text">Encerrar sessão</button></a>
            </div>
        </div>
    </footer>





    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>

</html>

<?php
}
?>