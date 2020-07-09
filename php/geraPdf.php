<?php
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('d/m/Y H:i');
	session_start();
	if ($_GET['tipo'] == 1) {
	?>
<!DOCTYPE html>
<html>

<head>
    <title>Relação Completa</title>
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
    @media print {
        #print {
            display: hidden;
        }
    }
    </style>
</head>

<body>

    <div class="container">
        <div id="HTMLtoPDF">
            <div>
                <img src="../img/vliLogo100.png" style="float: left; clear: both;">
                <img src="../img/cipaLogo100.png" style="float: right;">
                <p style="clear: both;">Corredor Centro-Leste</p>
            </div>
            <h4 style="text-align: center;">Relação de funcionários</h4><br>
            <h4>Emitido em: <?php echo $date ?></h4>
            <h4>Responsável: <?php echo $_SESSION['nome'] ?> </h4>
            <a href="#" class="btn" id="print" onclick="self.print()">Imprimir</a>
            <table style="border-collapse: collapse; border: 1px solid;">
                <thead>
                    <tr>
                        <th style="border: 1px solid; text-align: center; padding: 10px;">Nº</th>
                        <th style="border: 1px solid; text-align: center; padding: 10px;">Nome</th>
                        <th style="border: 1px solid; text-align: center; padding: 10px;">Gerência</th>
                        <th style="border: 1px solid; text-align: center; padding: 10px;">Supervisão</th>
                        <th style="border: 1px solid; text-align: center; padding: 10px;">Unidade</th>
                        <th style="border: 1px solid; text-align: center; padding: 10px;">Voto registrado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						include "../config/conexao.inc";

						$result_funcionarios = "SELECT * FROM funcionario WHERE idFuncionario>0 ORDER BY nome ASC";
						$resultado_funcionarios = mysqli_query($connect, $result_funcionarios);
						$num = 1;
						while ($row_funcionarios = mysqli_fetch_assoc($resultado_funcionarios)) { ?>
                    <tr>
                        <td style="border: 1px solid; text-align: center; padding: 10px;"><?php echo $num ?></td>
                        <td style="border: 1px solid;; text-align: center; padding: 10px;">
                            <?php echo $row_funcionarios['nome'] ?></td>
                        <td style="border: 1px solid;; text-align: center; padding: 10px;">
                            <?php echo $row_funcionarios['gerencia'] ?> </td>
                        <td style="border: 1px solid;; text-align: center; padding: 10px;">
                            <?php echo $row_funcionarios['supervisao'] ?> </td>
                        <?php
								switch ($row_funcionarios['unid']) {
									case 1:
										$row_funcionarios['unid'] = 'Divinópolis';
										break;
									case 2:
										$row_funcionarios['unid'] = 'Itacibá';
										break;
									case 3:
										$row_funcionarios['unid'] = 'Araguari';
										break;
									case 4:
										$row_funcionarios['unid'] = 'Ibiá';
										break;
									case 5:
										$row_funcionarios['unid'] = 'Araxá';
										break;
									case 6:
										$row_funcionarios['unid'] = 'Eldorado';
										break;
									case 7:
										$row_funcionarios['unid'] = 'Horto';
										break;
								}
								?>
                        <td style="border: 1px solid;; text-align: center; padding: 10px;">
                            <?php echo $row_funcionarios['unid'] ?> </td>
                        <?php
								if ($row_funcionarios['v'] == '1') {
									$voto = $row_funcionarios['horario'];
								} else {
									$voto = 'Não';
								}
								?>
                        <td style="border: 1px solid;; text-align: center; padding: 10px;"><?php echo $voto ?> </td>
                    </tr>
                    <?php
							$num++;
						}
						?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="../js/jspdf.js"></script>
    <script src="../js/jquery-2.1.3.js"></script>
    <script src="../js/pdfFromHTML.js"></script>
</body>

</html>
<?php
} elseif ($_GET['tipo'] == 2) {
	?>
<!DOCTYPE html>
<html>

<head>
    <title>Não votaram</title>
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
</head>

<body>


    <div class="container">
        <div id="HTMLtoPDF">
            <div>
                <img src="../img/vliLogo100.png" style="float: left; clear: both;">
                <img src="../img/cipaLogo100.png" style="float: right;">
                <p style="clear: both;">Corredor Centro-Leste</p>
            </div>
            <h4 style="text-align: center;">Relação de funcionários</h4><br>
            <h4>Emitido em: <?php echo $date ?></h4>
            <h4>Responsável: <?php echo $_SESSION['nome'] ?> </h4>
            <a href="#" class="btn" onclick="self.print()">Imprimir</a><br>
            <table style="border-collapse: collapse; border: 1px solid;">
                <thead>
                    <tr>
                        <th style="border: 1px solid; text-align: center; padding: 5px;">Nº</th>
                        <th style="border: 1px solid; text-align: center; padding: 5px;">Nome</th>
                        <th style="border: 1px solid; text-align: center; padding: 5px;">Gerência</th>
                        <th style="border: 1px solid; text-align: center; padding: 5px;">Supervisão</th>
                        <th style="border: 1px solid; text-align: center; padding: 5px;">Unidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						include "../config/conexao.inc";

						$result_funcionarios = "SELECT * FROM funcionario WHERE v='0' AND idFuncionario>0 ";
						$resultado_funcionarios = mysqli_query($connect, $result_funcionarios);
						$num = 1;
						while ($row_funcionarios = mysqli_fetch_assoc($resultado_funcionarios)) { ?>
                    <tr>
                        <td style="border: 1px solid; text-align: center; padding: 5px;"><?php echo $num ?></td>
                        <td style="border: 1px solid;; text-align: center; padding: 5px;">
                            <?php echo $row_funcionarios['nome'] ?></td>
                        <td style="border: 1px solid;; text-align: center; padding: 5px;">
                            <?php echo $row_funcionarios['gerencia'] ?> </td>
                        <td style="border: 1px solid;; text-align: center; padding: 5px;">
                            <?php echo $row_funcionarios['supervisao'] ?> </td>

                        <?php
								switch ($row_funcionarios['unid']) {
									case 1:
										$row_funcionarios['unid'] = 'Divinópolis';
										break;
									case 2:
										$row_funcionarios['unid'] = 'Itacibá';
										break;
									case 3:
										$row_funcionarios['unid'] = 'Araguari';
										break;
									case 4:
										$row_funcionarios['unid'] = 'Ibiá';
										break;
									case 5:
										$row_funcionarios['unid'] = 'Araxá';
										break;
									case 6:
										$row_funcionarios['unid'] = 'Eldorado';
										break;
									case 7:
										$row_funcionarios['unid'] = 'Horto';
										break;
								}
								?>
                        <td style="border: 1px solid;; text-align: center; padding: 5px;">
                            <?php echo $row_funcionarios['unid'] ?> </td>
                    </tr>
                    <?php
							$num++;
						}
						?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../js/jspdf.js"></script>
    <script src="../js/jquery-2.1.3.js"></script>
    <script src="../js/pdfFromHTML.js"></script>
</body>

</html>
<?php
} elseif ($_GET['tipo'] == 3) {
	?>
<!DOCTYPE html>
<html>

<head>
    <title>Candidatos</title>
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
    @media print {
        #print {
            display: hidden;
        }
    }
    </style>
</head>

<body>


    <div class="container">
        <div id="HTMLtoPDF">
            <div>
                <img src="../img/vliLogo100.png" style="float: left; clear: both;">
                <img src="../img/cipaLogo100.png" style="float: right;">
                <p style="clear: both;">Corredor Centro-Leste</p>
            </div>
            <h4 style="text-align: center;">Relação de candidatos</h4><br>
            <h4>Emitido em: <?php echo $date ?></h4>
            <h4>Responsável: <?php echo $_SESSION['nome'] ?> </h4>
            <a href="#" class="btn" id="print" onclick="self.print()">Imprimir</a><br>
            <table style="border-collapse: collapse; border: 1px solid;">
                <thead>
                    <tr>
                        <th style="border: 1px solid; text-align: center; padding: 5px;">Nº</th>
                        <th style="border: 1px solid; text-align: center; padding: 5px;">Nome</th>
                        <th style="border: 1px solid; text-align: center; padding: 5px;">Gerência</th>
                        <th style="border: 1px solid; text-align: center; padding: 5px;">Supervisão</th>
                        <th style="border: 1px solid; text-align: center; padding: 5px;">Unidade</th>
                        <th style="border: 1px solid; text-align: center; padding: 5px;">Votos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						include "../config/conexao.inc";

						$result_funcionarios = "SELECT f.nome, f.unid, f.gerencia, f.supervisao, c.votos FROM candidato c, funcionario f WHERE f.idFuncionario= c.funcionario_idFuncionario ORDER BY c.votos DESC";
						$resultado_funcionarios = mysqli_query($connect, $result_funcionarios);
						$num = 1;
						while ($row_funcionarios = mysqli_fetch_assoc($resultado_funcionarios)) { ?>
                    <tr>
                        <td style="border: 1px solid; text-align: center; padding: 5px;"><?php echo $num ?></td>
                        <td style="border: 1px solid;; text-align: center; padding: 5px;">
                            <?php echo $row_funcionarios['nome'] ?></td>
                        <td style="border: 1px solid;; text-align: center; padding: 5px;">
                            <?php echo $row_funcionarios['gerencia'] ?></td>
                        <td style="border: 1px solid;; text-align: center; padding: 5px;">
                            <?php echo $row_funcionarios['supervisao'] ?></td>
                        <?php
								switch ($row_funcionarios['unid']) {
								    case -1:
								        $row_funcionarios['unid'] = 'xx';
										break;
									case -2:
    							        $row_funcionarios['unid'] = 'xx';
    									break;
									case 1:
										$row_funcionarios['unid'] = 'Divinópolis';
										break;
									case 2:
										$row_funcionarios['unid'] = 'Itacibá';
										break;
									case 3:
										$row_funcionarios['unid'] = 'Araguari';
										break;
									case 4:
										$row_funcionarios['unid'] = 'Ibiá';
										break;
									case 5:
										$row_funcionarios['unid'] = 'Araxá';
										break;
									case 6:
										$row_funcionarios['unid'] = 'Eldorado';
										break;
									case 7:
										$row_funcionarios['unid'] = 'Horto';
										break;
								}
								?>
                        <td style="border: 1px solid;; text-align: center; padding: 5px;">
                            <?php echo $row_funcionarios['unid'] ?> </td>
                        <td style="border: 1px solid;; text-align: center; padding: 5px;">
                            <?php echo $row_funcionarios['votos'] ?> </td>
                    </tr>
                    <?php
							$num++;
						}
						?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../js/jspdf.js"></script>
    <script src="../js/jquery-2.1.3.js"></script>
    <script src="../js/pdfFromHTML.js"></script>
</body>

</html>
<?php
	}
?>