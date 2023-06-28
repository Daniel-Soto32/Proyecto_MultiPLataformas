<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- para hacerlo responsive-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" charset="utf-8"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
		crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<link rel="stylesheet" href="style.css">

	<title></title>
</head>

<body style="overflow-x: hidden;">
	<header>
		<div class="inner-width">
			<a style="text-decoration: none;" href="./homePac.php" class="logo">
				<h2 class="h2Nat"><img src="img/logoFinal_chico.png" alt=""></h2>
			</a>
			<i class="menu-toggle-btn fas fa-bars"></i>
			<nav class="navigation-menu">
				<a href="./homePac.php"><i class="fas fa-book-medical ByePac"></i>Mis recetas</a>
				<a href="./FAQPac.php"><i class="fas fa-circle-question"></i>FAQ</a>
				<a href="./miCuentaPac.php"><i class="fas fa-user user"></i>Mi cuenta</a>
				<a href="./destroySession.php"><i class="fas fa-sign-out-alt"></i>Salir</a>
			</nav>
		</div>
	</header>
	
	<h1 class="pageTitle">Preguntas frecuentes</h1>

	<div class="row">
		<div class="col-6 imgPac">
			<img src="img/Imagen3.jpg">

		</div>
		<div class="col-6">
			<h2 class="h3Nat" style="margin-left: 150px; ">¿Se aceptan seguros en su consulta?</h2>
			<p>No aceptamos seguros para la atención en consulta. Sin embargo, si aceptamos seguros para procedimientos
				y hospitalización. Contáctanos para más información.</p>
			<h2 class="h3Nat" style="margin-left: 150px; ">Necesito una consulta urgente, ¿que hago?</h2>
			<p>Llámanos a la primera oportunidad. Podremos encontrar un espacio en la agenda, o si no, guiarte para que
				tengas la mejor atención. Si tus síntomas son urgentes, acude al servicio de urgencias en Médica Sur y
				pregunta por nosotros.</p>

		</div>

	</div>


	<script type="text/javascript">
		$(".menu-toggle-btn").click(function () { //navbar
			$(this).toggleClass("fa-times");
			$(".navigation-menu").toggleClass("active");
		});

	</script>

</body>

</html>