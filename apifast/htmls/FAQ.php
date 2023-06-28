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
			<a style="text-decoration: none;" href="./homeDoc.php" class="logo"><h2 class="h2Nat"><img src="./img/logoFinal_chico.png" alt=""></h2></a>
			<i class="menu-toggle-btn fas fa-bars"></i>
			<nav class="navigation-menu">
				<a href="./homeDoc.php"><i class="fas fa-hand-holding-medical activePac"></i>Mis pacientes</a>
				<a href="./PacAlta.php"><i class="fas fa-book-medical ByePac"></i>Pacientes dados de alta</a>
				<a href="./FAQ.php"><i class="fas fa-circle-question"></i>FAQ</a>
				<a href="./miCuentaDoc.php"><i class="fas fa-user user"></i>Mi cuenta</a>
				<a href="./destroySession.php"><i class="fas fa-sign-out-alt"></i>Salir</a>
			</nav>
		</div>
	</header>


	</header>
	<h1 class="pageTitle">Preguntas frecuentes</h1>

	<div class="row">
		<div class="col-6 imgPac">
			<img src="img/Imagen3.jpg">

		</div>
		<div class="col-6">
			<h2 class="h3Nat" style="margin-left: 150px; ">¿Cómo registrar su paciente?</h2>
			<p style=" margin-bottom: 40px;"> <img src="img/num1.png" style="height: 60px;"> Proporcionarle su ID para
				que se ligue a sus pacientes.</p>
			<p style="margin-bottom: 40px;"> <img src="img/num2.png" style="height: 60px;"> Asegurese de que su paciente
				ya se haya registrado en el portal.
				Puede encontrar su ID en la sección de "Mi cuenta".</p>
			<p style="margin-bottom: 40px;"> <img src="img/num3.png" style="height: 60px;"> Si el paciente se registro
				exitosamente con su ID, deberá aparecer en la sección de "Mis pacientes".</p>

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