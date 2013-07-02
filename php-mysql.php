<?php

require_once('class.ezpdf.php');
include("conexion.php");

mysql_select_db('encuesta');
$queEmp = "select * from preguntas";
$resEmp = mysql_query($queEmp);
$totEmp = mysql_num_rows($resEmp);
$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	// array('id'=>$ixx)
	$data[] = array_merge($datatmp, array('id'=>$ixx));
}
$titles = array('id'=>'ID', 'pregunta'=>'Pregunta');
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
$txttit = "<b>BLOG.UNIJIMPE.NET</b>\n";
$txttit.= "Ejemplo de PDF con PHP y MYSQL \n";

// echo $data;
// echo $titles;
// echo $options;

$pdf = new Cezpdf('');
$pdf->selectFont('fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);


$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>