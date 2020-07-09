<!DOCTYPE html>
<html>
	<head>
    <title>Eleição CIPA-Processo Eleitoral</title>
    <link rel="shortcut icon" href="../img/VLI.ico" type="image/x-icon" />
		<meta charset="utf-8">
    <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
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

    <div id="modal1" class="modal">
    <div class="modal-content center">
      <i class="material-icons right modal-close" id="fechar">close</i>
      <h4>Novo arquivo:</h4>
      <div class="container">
        <form action="enviaArquivo.php" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="input-field file-field col m12">
              <div class="btn">
                <span><i class="material-icons right">computer</i>Procurar</span>
                <input type="file" name="arquivo" id="arquivo" accept=".pdf">
              </div>
              <div class="file-path-wrapper">
                <input type="text" name="nomePDF" id="nomePDF" class="file-path validate" placeholder="Escolha um arquivo">
              </div>
            </div>
          </div>
          <div class="row col m6">
            <button class="btn " type="sumbit"><i class="material-icons right">cloud_upload</i>Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="row" style="margin-top: 2%;">
    <div class="container">
      <a href="adm.php" class="black-text"><i class="material-icons small left">keyboard_backspace</i></a>
      <a class="btn modal-trigger right" href="#modal1">Enviar arquivo</a>
    </div>
  </div>

    <div class="row">
      <div class="container">
        <table class="centered highlight responsive-table">
          <thead>
            <tr>
              <th>Nome:</th>
              <th>Abrir:</th> 
              <th>Deletar:</th> 
            </tr>
          </thead>
        
    
        <?php

          include '../config/conexao.inc';

          $sql =  'SELECT * FROM arquivo';

          $resultado = $connect->query($sql);

          while($res = $resultado->fetch_array()){
            echo "<tr>
                    <td>".$res['nomeDocumento']."</td>
                    <td><a href='".$res['caminhoDocumento']."'><i class='material-icons green-text tooltipped' data-position='bottom' data-tooltip='Abrir'>open_in_new</i></a></td>
                    <td><a href='apagaArq.php?id=".$res['idDocumento']."&arq=".$res['caminhoDocumento']."'><i class='material-icons red-text tooltipped' data-position='bottom' data-tooltip='Deletar'>close</i></a></td>
                  </tr>";
         }

        ?>
        </table>
      </div>
    </div>


    <script type="text/javascript">
      $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('.modal').modal();
      });
    </script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
      
    </body>
  </html>