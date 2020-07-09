<?php

  session_start();
  if (!isset($_SESSION['logado'])) {
    header('location: ../index.html');
  }else{
    $_SESSION['votacao']= true;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Eleição CIPA-Identificação</title>
    <link rel="shortcut icon" href="../img/VLI.ico" type="image/x-icon" />
    <meta charset="utf-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="text/javascript">
    var target_date = new Date("september 20, 2019 17:00:00").getTime();
    var dias, horas, minutos, segundos;
    var regressiva = document.getElementById("regressiva");

    setInterval(function() {

        var current_date = new Date().getTime();
        var segundos_f = (target_date - current_date) / 1000;

        dias = parseInt(segundos_f / 86400);
        segundos_f = segundos_f % 86400;

        horas = parseInt(segundos_f / 3600);
        segundos_f = segundos_f % 3600;

        minutos = parseInt(segundos_f / 60);
        segundos = parseInt(segundos_f % 60);


        document.getElementById('tempo').innerHTML = dias + ' d ' + horas + ' h ' + minutos + ' min ' +
            segundos + ' seg';


    }, 1000);
    </script>
    <style type="text/css">
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    main {
        flex: 1 0 auto;
    }

    .center-align {
        position: absolute;
        top: 50%;
        left: 65%;
        transform: translate(-50%, -50%);
    }

    #text {
        position: absolute;
        top: 10%;
        left: 76%;
    }

    #modal1 {
        max-height: 50%;
        max-width: 20%;
        overflow: hidden;
    }

    body {
        overflow-y: hidden;
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

    <main>
        <div class="row"></div>
        <div class="row"></div>
        <div class="row center">
            <div class="container center">
                <form class="col s12 m4 offset-m4 grey lighten-4" style="border-radius: 6px;" id="form"
                    action="authFunc.php" method="post">
                    <h4>Identificação</h4>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <i class="material-icons prefix">person_outline</i>
                            <label for="matr">Matrícula:</label>
                            <input id="matr" type="text" class="validate" name="matr">
                        </div>
                        <div class="input-field col s12 m12">
                            <i class="material-icons prefix">lock</i>
                            <label for="senha">Senha:</label>
                            <input id="senha" type="password" class="validate" name="senha">
                        </div>
                        <button class="btn waves-effect waves-light teal darken-2" type="submit" name="action">Entrar
                            <i class="material-icons right">check_circle</i>
                        </button>
                    </div>
                    <p style="font-size: 80%;"><a href="#modal1" class="modal-trigger red-text">Encerrar votação</a></p>
                </form>
            </div>
        </div>
        <div id="modal1" class="modal">
            <div class="modal-content center">
                <h4>Encerrar votação</h4>
                <form class="col m12" method="post" action="encerra.php">
                    <div class="input-field col s12">
                        <input id="senhaE" type="password" name="senhaE" class="validate">
                        <label for="senhaE">Senha:</label>
                    </div>
                    <button class="btn waves-effect waves-light teal darken-2" type="submit"
                        name="action">Confirmar</button>
                </form>
            </div>
    </main>

    <footer class="page-footer white">
        <div class="footer-copyright white">
            <div class="container center">
                <p class="red-text">Tempo restante:</p>
                <p id="tempo" class="red-text"></p>
            </div>
        </div>
    </footer>




    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.modal').modal();
        $("#modal1").width($("#modal1").width());
        $("#modal1").height($("#modal1").height());
    });
    </script>
</body>

</html>

<?php

  }

  ?>