<?php

error_reporting(0);
session_start();

$name = $_SESSION["nombre_Doc"];
$gen = $_SESSION["genero_Doc"];
$ape = $_SESSION["apelli_Doc"];
$id_doc = $_SESSION["id_Doctor"];
$ape2 = $_SESSION["apelli_Doc_Mat"];
$adress = $_SESSION["direcc_Doc"];
$cedula = $_SESSION["cedula_Doc"];
$rama = $_SESSION["rama_medica_Doc"];
$tel = $_SESSION["tel_Doc"];
$mail = $_SESSION["mail_Doc"];
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

<body style="overflow-x:hidden;">
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
    <h1 class="pageTitle">Detalles de la cuenta</h1>
    <div class="row">
        <div class="col-6">
            <div class="cardDoc">
                <h1 class="titleCard" style=" width: 170px;"> Datos personales</h1>
                <br>
                <div class="row" style="height: 50px;">
                    <div class="col-4">
                        <span class="h4Titles">Nombre: </span>
                    </div>
                    <div class="col-8" >
                        <p > <?php echo $name," ",$ape," ",$ape2; ?></p>
                    </div>
                </div>
                <div class="row" style="height: 50px;">
                    <div class="col-4">
                        <span class="h4Titles" >Género: </span>
                    </div>
                    <div class="col-8">
                        <p > <?php echo $gen; ?></p>
                    </div>
                </div>
                <div class="row" style="height: 50px;">
                    <div class="col-4">
                        <span class="h4Titles" >Dirección: </span>
                    </div>
                    <div class="col-8">
                        <p > <?php echo $adress; ?></p>
                    </div>
                </div>
                <div class="row" style="height: 50px;">
                    <div class="col-4">
                        <span class="h4Titles" >Teléfono: </span>
                    </div>
                    <div class="col-8">
                        <p > <?php echo $tel; ?></p>
                    </div>
                </div>
                <div class="row" style="height: 50px;">
                    <div class="col-4">
                        <span class="h4Titles" >Correo: </span>
                    </div>
                    <div class="col-8">
                        <p > <?php echo $mail; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="cardDoc">
                <h1 class="titleCard" style="width: 220px;"> Información profesional</h1>
                <br>
                <div class="row" style="height: 50px;">
                    <div class="col-5">
                        <span class="h4Titles" >Cédula médica: </span>
                    </div>
                    <div class="col-7">
                        <p > <?php echo $cedula; ?></p>
                    </div>
                </div>
                <div class="row" style="height: 100px;">
                    <div class="col-5">
                        <span class="h4Titles" >Rama médica: </span>
                    </div>
                    <div class="col-7">
                        <p > <?php echo $rama; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-6">
            <div class="cardDoc" style="height: 100px;">
                <h1 class="titleCard" style=" width: 280px;padding-bottom: 10px;"> Datos para registrar paciente</h1>
                <div class="row" style="height: 100px;">
                    <div class="col-4">
                        <span class="h4Titles" style="font-size:30px;">ID: </span>
                    </div>
                    <div class="col-8">
                        <p style="font-size:30px;"> <?php echo $id_doc; ?></p>
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