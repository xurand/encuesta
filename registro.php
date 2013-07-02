<!DOCTYPE html>
<html lang="es-PE">
  <head>
    <meta charset="utf-8">
    <title>Ingreso a la Encuesta</title>
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

    <form action="registro.php" method="POST">
    	<div class="container">
    		<div class="row">
				
    			<div class="span9" style="margin-top: 10%; margin-left: 15%;">
    				<h3>Bienvenido, Ingresa tus datos</h3>
    				<div class="demo-browser">
    					<div class="demo-browser-side">
			              
			            	<h5>Alistate para la encuesta <br><small>estás listo?</small></h5>  
			            </div>		    			
		    			<div class="demo-browser-content">
			    			<div class="login-form">
			    				<div class="control-group">
					              <input type="text" class="login-field" value="" placeholder="Ingresa tu nombre" id="login-name" name="login-name"/>
					              <label class="login-field-icon fui-man-16" for="login-name"></label>
					        	</div>

					            <div class="control-group">
					              <input type="password" class="login-field" value="" placeholder="Contraseña" id="login-pass" name="login-pass"/>
					              <label class="login-field-icon fui-lock-16" for="login-pass"></label>
					            </div>

					            <table width="313px">
					            	<tr>
					            		<td width="60%"><input type="submit" class="btn btn-large btn-block btn-success" value="Registrate"></td>
								  	</tr>
					           </table>
					    	</div>
					    </div>
					    <div class="span5"></div>

					    <?php
					    	include("conexion.php");
							date_default_timezone_set('America/Lima');

							@$nombre = addslashes($_POST['login-name']);
							@$clave = addslashes($_POST['login-pass']);

							$resultado = 0;
							if ($clave != ''){
								$resultado = registrar($nombre, $clave);
							}
							

							function registrar ($nom, $pass){

								$flag = 0;
								mysql_select_db("encuesta");
								$sql="insert into seguridad values(' ',
															   '" .$nom . "',
															   '" .$pass . "',
															   'ACT')";
							
								$flag = mysql_query($sql);							
								if ($flag == 1) {
									return $flag;
								}else{
									return 0;
								}
							}

							if ($resultado == 1) {
					    	
					    	
					     ?>
					    <div class="span3">
							<div class="demo-tooltips">
								<p align="center" data-toggle="tooltip" data-placement="bottom" title="Registro Correcto">
									<?php echo "<a href='inicio.php'>Ingresa!</a>"; ?>
								</p>
			      			</div>
						</div>

						<?php } ?>
				    </div>
			    </div>
			</div>
		</div>
	</form>

    </div> <!-- /container -->

    

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
