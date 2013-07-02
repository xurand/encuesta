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
    <div class="container">
      
<form action="bienvenida.php" method="POST">
      <div class="login">
        <div class="login-screen">
          <div class="login-icon">
            <img src="images/login/icon.png" alt="Welcome to Mail App" />
            <h4>Bienvenido <small>A esta encuesta</small></h4>
          </div>

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
                <td width="60%"><input type="submit" class="btn btn-large btn-block btn-danger" value="Ingresa"></td>
                <td width="10%"> </td>
                <td width="30%"><a href="registro.php" type="submit" class="btn btn-mini btn-block btn-block">Registrate</a>

              </tr>
            </table>
  
            
            <!-- <a class="login-link" href="#">Olvidaste tu contraseña?</a> -->
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
