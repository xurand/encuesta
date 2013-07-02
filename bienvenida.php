<?php 
include("conexion.php");
date_default_timezone_set('America/Lima');

@$nombre = addslashes($_POST['login-name']);
@$clave = addslashes($_POST['login-pass']);

$resultado = 0;

$resultado = registrar($nombre, $clave);

session_start();
$_SESSION['user'] = $nombre;


function registrar($nom,$pass){
		$estado = "";
		mysql_select_db("encuesta");
		$sql1="select usuario, estado from seguridad where usuario='". $nom."' 
													   and clave='". $pass."'"; 
		$r = mysql_query($sql1);
		while ($r2=mysql_fetch_array($r)){
			$estado = $r2[1];
		}

		
		if ($estado == 'ACT') {
			$flag = 1;
		}else{
			$flag = 0;
		}
		return $flag;
	}
?>


		<!DOCTYPE html>
		<html lang="en">
		  <head>
		    <meta charset="utf-8">
		    <title>Flat UI</title>
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">

		    <!-- Loading Bootstrap -->
		    <link href="css/bootstrap.css" rel="stylesheet">

		    <!-- Loading Flat UI -->
		    <link href="css/flat-ui.css" rel="stylesheet">
		    <link rel="shortcut icon" href="images/favicon.ico">

		    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		    <!--[if lt IE 9]>
		      <script src="js/html5shiv.js"></script>
		    <![endif]-->
		  </head>
		  <body>
		    <div class="container">
		      <div class="demo-headline">
		      	<?php
		      		if ($resultado == 1) {	?>

			        <h1 class="demo-logo">
			          BIENVENIDO
			          <h3><?php $nombre; ?>, Vamos <a class="login-link" href="encuesta.php">Empieza con la encuesta</a>
			          </h3>
			        </h1>
			        <?php
					}else if ($resultado == 0){
						?>
					<h1 class="demo-logo">
			          Lo Sentimos, usuario <?php $nombre; ?> no existe o contraseña incorrecta...
			          <h3><a class="login-link" href="index.php">Intentelo de nuevo!</a>
			          </h3>
			        </h1>

						<?php
					}

				 ?>
		      </div> <!-- /demo-headline -->
		  </div>
		  	<!-- Load JS here for greater good =============================-->
		    <script src="js/jquery-1.8.2.min.js"></script>
		    <script src="js/jquery-ui-1.10.0.custom.min.js"></script>
		    <script src="js/jquery.dropkick-1.0.0.js"></script>
		    <script src="js/custom_checkbox_and_radio.js"></script>
		    <script src="js/custom_radio.js"></script>
		    <script src="js/jquery.tagsinput.js"></script>
		    <script src="js/bootstrap-tooltip.js"></script>
		    <script src="js/jquery.placeholder.js"></script>
		    <script src="http://vjs.zencdn.net/c/video.js"></script>
		    <script src="js/application.js"></script>
		    <!--[if lt IE 8]>
		      <script src="js/icon-font-ie7.js"></script>
		      <script src="js/icon-font-ie7-24.js"></script>
		    <![endif]-->
		  </body>
		  </html>

	