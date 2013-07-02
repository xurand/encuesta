<!doctype html>
<html lang="es-PE">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/reveal.css">
	<!-- <link rel="stylesheet" href="css/theme/beige.css" id="theme"> -->
	<link rel="stylesheet" href="css/theme/default.css" id="theme">
	<!-- <link rel="stylesheet" href="css/theme/serif.css" id="theme"> -->
	<!-- <link rel="stylesheet" href="css/theme/simple.css" id="theme"> -->
	<!-- <link rel="stylesheet" href="css/theme/sky.css" id="theme"> -->

	<link rel="stylesheet" href="css/flat-ui.css">
	
	<?php 
			// header('Content-Type: text/html; charset=ISO-8859-1');
			include("conexion.php"); 
			// mysql_set_charset('utf8');
			session_start();
	?>
</head>
<body>
	<form action="resultado.php" method="POST">
	<div class="reveal">
		<div class="slides">
			<?php 
				mysql_select_db('encuesta');
				$sql = "select * from preguntas";
				$rs = mysql_query($sql);
				$cont = 0;
				$name = 1;

				while ($f=mysql_fetch_array($rs)) {
					$cont += 1;
					$id = 1;
					?>
					<section>
						<h2><?php echo utf8_encode($f[1]); ?></h2>
						<div class="span8">
							<div class="share mrl">
								<ul>

									<?php
									mysql_select_db('encuesta');

									$sql2 = "select * from respuestas where pregunta='" . $f[0] ."'";
									$rs2 = mysql_query($sql2);

									while ($r=mysql_fetch_array($rs2)) {

										?>
											<li><input type="radio" name='optionsRadios<?php echo ($name); ?>' id='optionsRadios0<?php echo ($id);?>' value=<?php echo ($r[0]); ?>>
											<span class="revSpan"><?php echo utf8_encode($r[2]); ?></span>
											</li>
										<?php
										$id += 1;
									}

									?>
								</ul>
							</div>
						</div>
						<?php 
							if ($cont == 10) {
								?>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<div class="span3">
										<input type="submit" class="btn btn-large btn-block btn-primary" value="Enviar">
									</div>
								<?php
							}
						?>
					</section>
					<?php
					$name += 1;
				}
			?>
			
			<script src="lib/js/head.min.js"></script>
			<script src="js/reveal.min.js"></script>

		</div>
	</div>
	</form>
	<script>
			
			// Full list of configuration options available here:
			// https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
				controls: true,
				progress: true,
				history: true,
				keyboard: true,

				theme: Reveal.getQueryHash().theme, // available themes are in /css/theme
				transition: Reveal.getQueryHash().transition || 'cube', // default/cube/page/concave/zoom/linear/none

				// Optional libraries used to extend on reveal.js
				dependencies: [
					{ src: 'lib/js/highlight.js', async: true, callback: function() { window.hljs.initHighlightingOnLoad(); } },
					{ src: 'lib/js/classList.js', condition: function() { return !document.body.classList; } },
					{ src: 'lib/js/showdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					{ src: 'lib/js/data-markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					{ src: 'plugin/zoom-js/zoom.js', condition: function() { return !!document.body.classList; } },
					{ src: '/socket.io/socket.io.js', async: true, condition: function() { return window.location.host === 'localhost:1947'; } },
					{ src: 'plugin/speakernotes/client.js', async: true, condition: function() { return window.location.host === 'localhost:1947'; } }
				]
			});
			
		</script>
</body>
</html>