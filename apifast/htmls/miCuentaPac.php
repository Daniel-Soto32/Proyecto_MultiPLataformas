<?php

error_reporting(0);
session_start();

$name = $_SESSION["namePac"];
$ape1 = $_SESSION["apPaternoPac"];
$ape2 = $_SESSION["apMaternoPac"];
$genero = $_SESSION["generoPac"];
$edad = $_SESSION["edadPac"];
$mail = $_SESSION["emailPac"];
$tel = $_SESSION["telPac"];
$alergias = $_SESSION["alergiasPac"];
$antecedentes = $_SESSION["antecedentesPac"];
$id = $_SESSION["idDoc"];

if (!isset($name)) {
	//echo "No funciona";
	header("location: login.php");
	exit();
}

?>

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
    <h1 class="pageTitle">Detalles de la cuenta</h1>
    <div class="row" style="margin-top: 100px;">
        <div class="col-6">
            <div class="cardDoc">
                <h1 class="titleCard" style=" width: 170px;"> Datos personales</h1>
                <br>
                <div class="row" style="height: 50px;">
                    <div class="col-4">
                        <span class="h4Titles">Nombre: </span>
                    </div>
                    <div class="col-8" >
                        <p > <?php echo $name," ",$ape1," ",$ape2; ?></p>
                    </div>
                </div>
                <div class="row" style="height: 50px;">
                    <div class="col-4">
                        <span class="h4Titles">Género: </span>
                    </div>
                    <div class="col-8" >
                        <p > <?php echo $genero; ?></p>
                    </div>
                </div>
                <div class="row" style="height: 50px;">
                    <div class="col-4">
                        <span class="h4Titles">Edad: </span>
                    </div>
                    <div class="col-8" >
                        <p > <?php echo $edad; ?></p>
                    </div>
                </div>
                <div class="row" style="height: 50px;">
                    <div class="col-4">
                        <span class="h4Titles">Teléfono: </span>
                    </div>
                    <div class="col-8" >
                        <p > <?php echo $tel; ?></p>
                    </div>
                </div>
                <div class="row" style="height: 50px;">
                    <div class="col-4">
                        <span class="h4Titles">Correo: </span>
                    </div>
                    <div class="col-8" >
                        <p > <?php echo $mail; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="cardDoc" >
                <h1 class="titleCard" style="width: 180px;"> Información médica</h1>
                <br>
                <div class="row" style="height: 50px;">
                    <div class="col-5">
                        <span class="h4Titles" >Alergias: </span>
                    </div>
                    <div class="col-7">
                        <p > <?php echo $alergias; ?></p>
                    </div>
                </div>
                <div class="row" style="height: 100px;">
                    <div class="col-5">
                        <span class="h4Titles" >Antecedentes: </span>
                    </div>
                    <div class="col-7">
                        <p > <?php echo $antecedentes; ?></p>
                    </div>
                </div>
            </div>
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