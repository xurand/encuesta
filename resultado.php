<!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>RESULTADOS</title>
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
 		<div class="row">
 			<form action="reporte.php" method="POST">
 				<table width="960px" cellspacing="0" cellpading="2">
	
<?php 

include("conexion.php");
session_start();

date_default_timezone_set('America/Lima');




// $arrayR = array($n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10);
$arrayR = array(
			@addslashes($_POST['optionsRadios1']),
			@addslashes($_POST['optionsRadios2']),
			@addslashes($_POST['optionsRadios3']),
			@addslashes($_POST['optionsRadios4']),
			@addslashes($_POST['optionsRadios5']),
			@addslashes($_POST['optionsRadios6']),
			@addslashes($_POST['optionsRadios7']),
			@addslashes($_POST['optionsRadios8']),
			@addslashes($_POST['optionsRadios9']),
			@addslashes($_POST['optionsRadios10']));
$_SESSION['data'] = $arrayR;
$i = 0;
$j = 1;
$correctas = 0;
$incorrectas = 0;
$noC = 0;
$siC = 0;

	for ($k=0; $k < sizeof($arrayR); $k++) { 
		if ($arrayR[$k] == '') {
			$noC += 1;
		}else if($arrayR != ''){
			$siC += 1;
		}
	}

echo "<tr><td><h1>RESULTADOS</h1>" . $_SESSION['user'] . "</td></tr>";
echo "<tr><td>Contestadas : </td><td>" . $siC . " de ". sizeof($arrayR). "</td></tr>";

mysql_select_db('encuesta');
$queEmp = "select * from preguntas";
$resEmp = mysql_query($queEmp);
$totEmp = mysql_num_rows($resEmp);

while($datatmp = mysql_fetch_array($resEmp)) { 
	// echo $datatmp[1];
	$queRes = "select flag from respuestas where id='" . $arrayR[$i] ."'";
	$resRes = mysql_query($queRes);

	// echo "descripcion de la respuesta: ";
	while($respuesta = mysql_fetch_array($resRes)){
		
		if ($respuesta[0] == 1) {
			$correctas += 1;
		}else if ($respuesta[0] == 0){
			$incorrectas += 1;
		}
		// $data[] = array_merge($datatmp,array('col1'=>$respuesta[0]));
		
	}
	// echo "<br>";
	// echo "Contestadas: ". sizeof($arrayR);

	// echo $correctas;
	// echo "<br>";
	// echo $incorrectas;
	// echo "<br>";
	$i += 1;
	$j += 1;
}
$porcentajeA= round((($correctas/sizeof($arrayR))*100),2);
echo "<tr><td>Porcetaje de aciertos : </td><td>" . $porcentajeA . "%</td></tr>";
echo "<tr><td>Aciertos : </td><td>" . $correctas. "</td></tr>";
echo "<tr><td>Fallos : </td><td>" . $incorrectas. "</td></tr>";
echo "<tr><td>No Contestadas : </td><td>" . $noC. "</td></tr>";

$datostabla = array(
				array("Correctos", $correctas, "#f3f"),
				array("Incorrectos", $incorrectas + $noC, "#ff4432")
			);

 ?>

 
 		 	
				<?php 

					foreach ($datostabla as $ElemArray) {
						//round <- permite redondear un valor decimal
						//sintaxis round(numero, cant decimales);

						$porcentaje = round((($ElemArray[1]/sizeof($arrayR))*100),2);
					

				 ?>
				 <tr>
				 	<td width="10%">
				 		<p>
				 			<?php 
				 				echo ($ElemArray[0]);
				 			 ?>
				 		</p>
				 	</td>
				 	<td width="10%">
				 		<?php 
			 				echo ($porcentaje);
				 		 ?> %
				 	</td>

				 	<td>
					 	<table width="<?php echo ($porcentaje) ?>%" bgcolor="<?php echo ($ElemArray[2]) ?>">
					 		<tr>
					 			<td></td>
					 		</tr>
					 	</table>
					</td>
				 </tr>
				 <?php } ?>
				 <tr>
				 	<td><input type="submit" class="btn btn-large btn-block btn-warning" value="Ver Reporte"></td>
				 </tr>
			</table>
		</form>
		</div>

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
    <script src="js/application.js"></script>
    <!--[if lt IE 8]>
      <script src="js/icon-font-ie7.js"></script>
      <script src="js/icon-font-ie7-24.js"></script>
    <![endif]-->

 </body>
 </html>