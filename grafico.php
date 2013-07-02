<!doctype html>
<html lang="es-PE">
<head>
	<meta charset="UTF-8">
	<title>Graficos</title>
	<style>

		.add{
			color: #34495e;
			padding: 7px;

		}

	</style>

	<?php 
		$datostabla = array(
				array("Visual", 860, "#f3f"),
				array("Java", 550, "#ff4432"),
				array("PHP", 350,"#ff9a68")
			);

		$maximo = 0;

		foreach ($datostabla as $ElemArray) {
			$maximo+=$ElemArray[1];
		}
	 ?>

</head>
<body>

	<table width="1350px" cellspacing="0" cellpading="2">
		<?php 

			foreach ($datostabla as $ElemArray) {
				//round <- permite redondear un valor decimal
				//sintaxis round(numero, cant decimales);

				$porcentaje = round((($ElemArray[1]/$maximo)*100),2);
			

		 ?>
		 <tr>
		 	<td width="10%">
		 		<strong>
		 			<?php 
		 				echo ($ElemArray[0]);
		 			 ?>
		 		</strong>
		 	</td>
		 	<td width="5%">
		 		<?php 
	 				echo ($porcentaje);
		 		 ?>
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
	</table>
	
</body>
</html>