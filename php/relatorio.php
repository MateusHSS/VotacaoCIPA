<?php
  
  session_start();
  if (!isset($_SESSION['logado'])) {
    header('location: ../index.html');
  }else if (isset($_SESSION['votacao'])) {
    header('location: ../php/identificacao.php');
  }else{
?>

<!DOCTYPE html>
<html>

<head>
    <title>Eleição CIPA-Relatórios</title>
    <link rel="shortcut icon" href="../img/VLI.ico" type="image/x-icon" />
    <meta charset="utf-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <!-- Numeric JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeric/1.2.6/numeric.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style type="text/css">
    #text {
        position: absolute;
        top: 10%;
        left: 76%;
    }

    #main-loader {
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        z-index: 999;
        display: none;
        position: fixed;
        align-items: center;
        justify-content: center;
        background-color: white;
        background-color: rgba(255, 255, 255, 0.5);
    }
    </style>
</head>

<body>
    <div id="main-loader">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <h6>Gerando PDF...</h6>
    </div>
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

    <?php
      include '../config/conexao.inc';

      $sql1= "SELECT COUNT(*) AS total FROM funcionario WHERE idFuncionario>0";
      $result1= $connect->query($sql1);
      $res1= mysqli_fetch_array($result1);

      $sql2= "SELECT f.nome, c.votos FROM candidato c, funcionario f WHERE c.funcionario_idFuncionario=f.idFuncionario order by votos DESC LIMIT 3";
      $result2= $connect->query($sql2);

      $sql3= "SELECT COUNT(*) AS faltam FROM funcionario WHERE v='0' AND idFuncionario>0";
      $result3= $connect->query($sql3);
      $res3= mysqli_fetch_array($result3);

    ?>

    <div class="row center">
        <div class="container">
            <a href="adm.php" class="black-text"><i class="material-icons small left">keyboard_backspace</i></a>
            <h4 class="center" style="display: inline;">Parciais</h4>
        </div>
    </div>
    <div class="container row">
        <div class="col m4">
            <h5>Total votantes:</h5>
            <a href="geraPdf.php?tipo=1" id="link" style="font-size: 80%;"> (relação completa)</a>
            <p><?php echo $res1['total']; ?></p>
            <div class="divider"></div>
            <h5 style="display: inline;">Mais votados:</h5>
            <a href="geraPdf.php?tipo=3" id="link2" style="font-size: 80%;">(relação completa)</a><br><br>

            <?php

        /*while ($res2= $result2->fetch_array()) {
          echo '- '.$res2['nome'].' ('.$res2['votos'].' votos)<br>';
        }*/

        $votaram= $res1['total']-$res3['faltam'];

        $sql4= "SELECT COUNT(v) as votaram FROM funcionario WHERE v=1 GROUP BY gerencia";
        $result4= $connect->query($sql4);

        $sql5= "SELECT gerencia FROM funcionario WHERE v=1 GROUP BY gerencia";
        $result5= $connect->query($sql5);

      ?>
            <br>
            <div class="divider"></div>
            <h5 style="display: inline;">Não votaram:</h5>
            <a href="geraPdf.php?tipo=2" id="link3" style="font-size: 80%;">(relação completa)</a>
            <p><?php echo $res3['faltam']; ?></p>
            <form action="#">
                <p>
                    <label>
                        <input name="group1" type="radio" checked id="totaisButton" />
                        <span>Totais</span>
                    </label>
                    <label>
                        <input name="group1" type="radio" id="gerenciaButton" />
                        <span>Por gerência</span>
                    </label>
                </p>

            </form>
        </div>
        <div class="col m8 center">
            
            <div class="col m12">
                <div id="votosTotais"></div>
                <div id="gerenciaTotais"></div>
            </div>
        </div>

    </div>
    <div class="container row center">
        
    </div>


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#gerenciaTotais").hide();
    });
    $("#totaisButton").click(function() {
        $("#gerenciaTotais").hide();
        $("#votosTotais").show();
    });
    $("#gerenciaButton").click(function() {
        $("#gerenciaTotais").show();
        $("#votosTotais").hide();
    });
    var data = [{
        values: [ <?php
            echo $votaram.
            ",".$res3['faltam']; ?>
        ],
        labels: ['Votaram', 'Não votaram'],
        domain: {
            column: 0
        },
        hoverinfo: 'label+value',
        type: 'pie'
    }];

    var layout = {
        width: 600,
        showlegend: true
    };

    Plotly.newPlot('votosTotais', data, layout);


    var trace1 = {
        type: 'bar',
        x: [ <?php
            while ($res5 = $result5 -> fetch_array()) {
                echo "'".$res5['gerencia'].
                "',";
            }

            ?>
        ],
        y: [ <?php
            while ($res4 = $result4 -> fetch_array()) {
                echo $res4['votaram'].
                ',';
            }

            ?>
        ],
        marker: {
            color: ['#C8A2C8', '#7C56E8', '#5EA0FF', '#9133FF', '#FF8733', '#E85D56', '#F86BFF', '#C0E856',
                '#FF5E7E', '#FFC533', '#E87756', '#F86BFF', '#8D94EB', '#5CFFF5', '#5D00EB', '#5D00EB',
                '#5C73FF', '#49EBA0', '#0E5EE8', '#1BE9FF'
            ],
            line: {
                width: 0
            }
        }
    };

    var data = [trace1];

    var layout = {
        font: {
            size: 5
        }
    };

    Plotly.newPlot('gerenciaTotais', data, layout, {
        responsive: true
    });

    /*var trace1 = {
        type: 'bar',
        x: [],
        y: [],
        marker: {
            color: '#C8A2C8',
            line: {
                width: 2.5
            }
        }   
    };

    var data = [{
    values: [],
    labels: [],
    domain: {column: 0},
    hoverinfo: 'label+value',
    type: 'bar'
    }];

    var layout = {
        backgroundColor: ['rgba(0, 255, 10, 0.1)'],
    height: 450,
    width: 600,
    showlegend: false
    };

    Plotly.newPlot('gerenciaTotais', data, layout);*/
    </script>
</body>

</html>

<?php

    }

  ?>