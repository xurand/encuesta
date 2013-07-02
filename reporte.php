<?php 

require_once('class.ezpdf.php');
include("conexion.php");
session_start();

date_default_timezone_set('America/Lima');

@$n1 = addslashes($_POST['optionsRadios1']);
@$n2 = addslashes($_POST['optionsRadios2']);
@$n3 = addslashes($_POST['optionsRadios3']);
@$n4 = addslashes($_POST['optionsRadios4']);
@$n5 = addslashes($_POST['optionsRadios5']);
@$n6 = addslashes($_POST['optionsRadios6']);
@$n7 = addslashes($_POST['optionsRadios7']);
@$n8 = addslashes($_POST['optionsRadios8']);
@$n9 = addslashes($_POST['optionsRadios9']);
@$n10 = addslashes($_POST['optionsRadios10']);

$arrayR = $_SESSION['data'];

$i = 0;
$j = 1;
mysql_select_db('encuesta');
$queEmp = "select * from preguntas";
$resEmp = mysql_query($queEmp);
$totEmp = mysql_num_rows($resEmp);

while($datatmp = mysql_fetch_assoc($resEmp)) { 
	
	$queRes = "select respuesta,pregunta,flag from respuestas where id='" . $arrayR[$i] ."'";
	$resRes = mysql_query($queRes);


	// echo "descripcion de la respuesta: ";
	while($respuesta = mysql_fetch_array($resRes)){
		if ($respuesta[2] == 1) {
			$data[] = array_merge($datatmp,array('col1'=>$respuesta[0],'col2'=>$respuesta[0],'col3'=>'Correcto'));
		}else{
			$resCor = "select respuesta from respuestas where pregunta='" . $respuesta[1] ."' and flag = 1" ;
			$cor = mysql_query($resCor);

			while($final = mysql_fetch_array($cor)){
				$data[] = array_merge($datatmp,array('col1'=>$respuesta[0],'col2'=>$final[0],'col3'=>'Incorrecto'));
			}
		}
		
		
	}
	// echo "<br>";
	$i += 1;
	$j += 1;
}


$titulo = array('id'=>'ID', 'pregunta'=>'Pregunta','col1'=>'Tu Respuesta','col2'=>'Respuesta Correcta','col3'=>'Resultado');
$txttit = "<b>Resultados de la Encuesta de </b>". $_SESSION['user'] ."\n";
$options = array( 
                'shadeCol'=>array(0.9,0.9,0.9), 
                'xOrientation'=>'center', 
                'width'=>800, 
                'fontSize'=>8 
            ); 
$pdf = new Cezpdf('a4','landscape');
$pdf->selectFont('fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titulo,'',$options);

$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();

 ?>