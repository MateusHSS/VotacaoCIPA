<?php
	session_start();
	if (isset($_SESSION['logado'])) {
		header('location: php/adm.php');
	}else{

?>


<!DOCTYPE html>
<html>

<head>
    <title>Eleição CIPA</title>
    <link rel="shortcut icon" href="img/VLI.ico" type="image/x-icon" />
    <meta charset="utf-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style type="text/css">
    .center-align {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    #text {
        position: absolute;
        top: 10%;
        left: 76%;
    }
    </style>
</head>

<body>
    <nav class="white " role="navigation">
        <div class="new-wrapper container">
            <a class="brand-logo left"><img src="img/cipaLogo100.png"></a>
            <a class="brand-logo center black-text"><b>ELEIÇÃO CIPA</b></a>
            <ul class="right">
                <li><img src="img/vliLogo100.png"></li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <h6 id="text">Corredor Centro-Leste</h6>
    </div>


    <div class="row center">
        <div class="container center-align">
            <form class="col m4 offset-m4 s12 grey lighten-4" style="border-radius: 6px;" id="form"
                action="php/authAdm.php" method="post">
                <h4>Identificação</h4>
                <div class="row center">
                    <div class="input-field col m8 offset-m2 s10 offset-s1">
                        <input id="usu" type="text" class="validate" name="usu">
                        <label for="usu">Usuário:</label>
                    </div>
                    <div class="input-field col m8 offset-m2 s10 offset-s1">
                        <input id="senha" type="password" class="validate" name="senha">
                        <label for="senha">Senha:</label>
                    </div>
                    <button class="btn waves-effect waves-light btn-small teal darken-2" type="submit"
                        name="action">Entrar<i class="material-icons right">send</i></button>
                </div>
            </form>
        </div>
    </div>






    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#form").validate({
            rules: {
                usu: {
                    required: true
                },
                senha: {
                    required: true
                },
            },
            //For custom messages
            messages: {
                usu: {
                    required: "Preencha este campo",
                },
                senha: {
                    required: "Preencha este campo"
                },
            },
            errorElement: 'div',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
    </script>
</body>

</html>
<?php
}
  ?>