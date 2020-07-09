<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Eleição CIPA-Gerenciar</title>
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
    <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
    <style type="text/css">
    #text {
        position: absolute;
        top: 10%;
        left: 76%;
    }

    #modalN {
        width: 30% !important;
        height: 55% !important;
    }

    #modal-novo-func {
        width: 60% !important;
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

    <div id="modalN" class="modal">
        <div class="modal-content center">
            <i class="material-icons right modal-close" id="fechar">close</i>
            <h4>Novo usuário</h4>
            <form class="col l12 offset-l3 center" style="border-radius: 10px;" id="form" action="novoUsuario.php"
                method="post">
                <div class="row">
                    <div class="input-field col l6">
                        <label for="matricula">Matrícula</label>
                        <input id="matricula" type="text" class="validate" name="matricula">
                    </div>
                    <div class="input-field col l6">
                        <input id="senha" type="password" class="validate" name="senha">
                        <label for="senha">Senha</label>
                    </div>
                    <div class="input-field col l6">
                        <input id="senha_confirma" name="senha_confirma" type="password" class="validate">
                        <label for="senha_confirma">Confirmar senha</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light teal darken-2" type="submit" name="action">Cadastrar
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>

    <div id="modal-novo-func" class="modal">
        <div class="modal-content center">
            <i class="material-icons right modal-close" id="fechar">close</i>
            <h4>Novo funcionário</h4>
            <form class="col l6 offset-l3" style="border-radius: 10px;" id="form" action="novoFunc.php" method="post">
                <div class="row">
                    <div class="input-field col l7">
                        <i class="material-icons prefix">person_outline</i>
                        <label for="nome">Nome Completo</label>
                        <input id="nome" type="text" class="validate" name="nome">
                    </div>
                    <div class="input-field col l5">
                        <i class="material-icons prefix">person_outline</i>
                        <input id="cpf" type="text" class="validate" name="cpf">
                        <label for="cpf">CPF</label>
                    </div>
                    <div class="input-field col l4">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input id="matricula" type="text" class="validate" name="matricula">
                        <label for="matricula">Matrícula</label>
                    </div>
                    <div class="input-field col l8">
                        <i class="material-icons prefix">lock_outline</i>
                        <input id="gerencia" type="text" class="validate" name="gerencia">
                        <label for="gerencia">Gerência</label>
                    </div>
                    <div class="input-field col l6">
                        <i class="material-icons prefix">lock</i>
                        <input id="supervisao" name="supervisao" type="text" class="validate">
                        <label for="supervisao">Supervisão</label>
                    </div>
                    <div class="input-field col l6">
                        <select id="unid" name="unid">
                            <option value="" disabled selected>Selecione a unidade:</option>
                            <option value="3">Araguari</option>
                            <option value="5">Araxá</option>
                            <option value="1">Divinópolis</option>
                            <option value="6">Eldorado</option>
                            <option value="7">Horto</option>
                            <option value="4">Ibiá</option>
                            <option value="2">Itacibá</option>
                        </select>
                        <label>Unidade</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light teal darken-2" type="submit" name="action">Cadastrar
                    <i class="material-icons right">check_circle</i>
                </button>
                <div class="row"></div>
            </form>
        </div>
    </div>

    <div class="row" style="margin-top: 2%;">
        <div class="container">
            <a href="adm.php" class="black-text"><i class="material-icons small left">keyboard_backspace</i></a>
            <a class="btn modal-trigger right" href="#modalN">Novo usuário</a>
            <a class="btn modal-trigger right" href="#modal-novo-func" style="margin-right: 10px;">Novo funcionário</a>
        </div>
    </div>

    <div class="container" style="margin-top:">
        <table class="centered highlight responsive-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Matrícula</th>
                    <th>Unidade</th>
                    <th>Remover</th>
                    <th>Alterar senha</th>
                </tr>
            </thead>
            <tbody>
                <?php

              include '../config/conexao.inc';
              
              $matricula= $_SESSION['matr'];

              $sql="SELECT u.idUsuario, f.nome, f.matricula, f.unid FROM usuario u, funcionario f WHERE (u.idUsuario != 0) AND (f.matricula !='$matricula') AND u.funcionario_idFuncionario= f.idFuncionario";
              $result=$connect->query($sql);
                  
              while($res= $result->fetch_array()) {
                switch ($res['unid']) {
                  case 1:
                    $un='Divinópolis';
                    break;
                  case 2:
                    $un='Itacibá';
                    break;
                  case 3:
                    $un='Araguari';
                    break;
                  case 4:
                    $un='Ibiá';
                    break;
                  case 5:
                    $un='Araxá';
                    break;
                  case 6:
                    $un='Eldorado';
                    break;
                  case 7:
                    $un='Horto';
                    break;    
                }
                echo "
                  <tr>
                    <td>".$res['nome']."</td>
                    <td>".$res['matricula']."</td>
                    <td>".$un."</td>
                    <td><a href='excluir.php?id=".$res['idUsuario']."'><i class='material-icons red-text tooltipped' data-position='bottom' data-tooltip='Excluir'>clear</i></a></td>
                    <td><a href='#modal".$res['idUsuario']."' class='modal-trigger'><i class='material-icons purple-text tooltipped' data-position='bottom' data-tooltip='Alterar'>create</i></a></td>
                  </tr>

                  <div id='modal".$res['idUsuario']."' class='modal'>
                    <div class='modal-content center'>
                      <i class='material-icons right modal-close' id='fechar'>close</i>
                      <h4>Nova senha</h4>
                      <form class='col m12' method='post' action='altera.php?id=".$res['idUsuario']."'>
                        <div class='input-field col m6'>
                          <input id='novaSenha' type='password' name='novaSenha' class='validate'>
                          <label for='novaSenha'>Senha:</label>
                        </div>
                        <button class='btn waves-effect waves-light teal darken-2' type='submit' name='action'>Confirmar</button>
                      </form>
                    </div>
                  </div>
                        
                ";
              }
            ?>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.modal').modal();
        $('select').formSelect();
        $('.tooltipped').tooltip();

        $("#form").validate({
            rules: {
                matricula: {
                    required: true
                },
                senha: {
                    required: true,
                    minlength: 5
                },
                senha_confirma: {
                    required: true,
                    minlength: 5,
                    equalTo: "#senha"
                },
            },
            //For custom messages
            messages: {
                matricula: {
                    required: "Informe uma matrícula",
                },
                senha: {
                    required: "Informe uma senha",
                    minlength: "A senha precisa ter no mínimo 5 caracteres"
                },
                senha_confirma: {
                    required: "Confirme a sua senha",
                    equalTo: "As senhas não coincidem"
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
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>

</html>