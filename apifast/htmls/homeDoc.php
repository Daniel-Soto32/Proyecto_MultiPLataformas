<?php
session_start();
error_reporting(0);

$namePac = $_SESSION["nombre_Pac"];
$name = $_SESSION["nombre_Doc"];
$gen = $_SESSION["genero_Doc"];
$ape = $_SESSION["apelli_Doc"];
$id_doc = $_SESSION["id_Doctor"];

//$id_pac = $_SESSION["id_Paciente"];

if ( !isset( $name )) {
	//echo "No funciona";
	header("location: login.php");
	exit();
}

$url = 'http://localhost/apifast/index.php';
$paramsGet = array(
	"id_doctor" => $id_doc,
	//$id_doc,
	"type" => true
);

$url .= '?' . http_build_query($paramsGet);
$ch = curl_init($url);
$val = json_encode($paramsGet);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); // Escrbimos el método (get, post, delete, put)
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Set the request header
curl_setopt($ch, CURLOPT_POSTFIELDS, $val);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (only for testing purposes)

$response = curl_exec($ch);
$json = json_decode($response);

curl_close($ch);
if (isset($_POST["submit"])) {
	$delPac = $_POST["delPaciente"];
	$paramDelete = array(
		"id_paciente" => $delPac,
	);

	// Build the URL with the parameters
	$url .= '?' . http_build_query($paramDelete);

	// Initialize a cURL session
	$ch = curl_init($url);
	//$val = json_encode($paramDelete);

	// Set cURL options
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE'); // Escrbimos el método (get, post, delete, put)
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Set the request header
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($paramDelete));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (only for testing purposes)

	// Execute the METHOD request and store the response
	$response = curl_exec($ch);
	//$result = file_get_contents($url); //nos regresa lo que manda la API
	//$json = json_decode($result);
	//echo $response;
	header("Location:homeDoc.php");
	//var_dump( json_decode( $response , true) );
	// Check if an error occurred during the request
	if (curl_errno($ch)) {
		echo 'Error: ' . curl_error($ch);
	}

	// Close the cURL session
	curl_close($ch);
}
?>

<!DOCTYPE html>
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

<body>
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

	<h1 class="pageTitle">
		<?php
		if ($gen == "Masculino" or strtolower($gen) == strtolower("Hombre")) {
			echo "!Bienvenido Dr. ", $name, " ", $ape,"!";
		} else {
			echo "!Bienvenido Dra. ", $name, " ", $ape,"!";
		}

		?>
		<hr class ="text-divider">
	</h1>

	<h2 class="pageTitle">Mis pacientes</h2>



	<div class="input-group rounded searchBar" style="padding-top: 160px;">
		<input type="search" class="form-control" placeholder="Buscar..." id="searchInput" />
		<span class="input-group-text border-0" id="search-addon">
			<i class="fas fa-search"></i>
		</span>
	</div>

	<div class="d-flex justify-content-center table_conf" style="padding-bottom: 60px">
		<table class="table_pacients" style="margin: 0;">
			<thead>
				<tr>
				<th style="width: 200px;">ID</th>
					<th style="width: 200px;">Nombre</th>
					<th style="width: 300px;">Apellidos</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<tr>
					<?php
					for ($i = 0; $i < count($json); $i++) {
						echo "<tr><td>", $json[$i]->id_paciente, "</td>";
						echo "<td>", $json[$i]->nombre_paciente, "</td>";
						echo "<td>", $json[$i]->apellido_pat_paciente, " ", $json[$i]->apellido_mat_paciente, "</td>";

						echo '<td>
							<a class="btn buttonSee" href="./recetas.php"><i class="fas fa-eye eye"></i> Ver recetas</a>

							<button type="button" class="btn btn-success buttonAlta" data-bs-toggle="modal"
								style="margin: 0 20px;" data-bs-target="#modalAlta', $json[$i]->id_paciente, '"><i class="fas fa-user-check"></i> Dar de
								alta</button>
							<div class="modal fade modal-lg" id="modalAlta', $json[$i]->id_paciente, '" tabindex="-1"
								aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="btn-close" data-bs-dismiss="modal"
												aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<p>¿Está seguro de querer dar de alta al paciente ', $json[$i]->id_paciente, '?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger"
												data-bs-dismiss="modal">Cancelar</button>
											<button type="button" class="btn btn-primary">Aceptar</button>
										</div>
									</div>
								</div>
							</div>

							<button type="button" class="btn buttonDelete" data-bs-toggle="modal"
								data-bs-target="#modalDelete', $json[$i]->id_paciente, '"><i class="fas fa-trash "></i> Eliminar paciente</button>
							<div class="modal fade modal-lg" id="modalDelete', $json[$i]->id_paciente, '" tabindex="-1"
								aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<form action="" method="post" name="input">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<p>¿Está seguro de querer eliminar al paciente
													<input type="text" class="btn-check" name="delPaciente" id="option2" value="',$json[$i]->id_paciente,'" />
													
														', $json[$i]->id_paciente, '
													?
													</label>
												</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger"
													data-bs-dismiss="modal">Cancelar</button>
												
												<button type="submit" name="submit" class="btn btn-primary">Aceptar</button>
												
											</div>
										</div>
									</form>
								</div>
							</div>
						</td>
					</tr>'
					;
					}
					?>

				</tr>

			</tbody>
		</table>
		
	</div>

	<script type="text/javascript">
		$(".menu-toggle-btn").click(function () { //navbar
			$(this).toggleClass("fa-times");
			$(".navigation-menu").toggleClass("active");
		});

		$(document).ready(function () { //funcion para buscar e la tabla
			$("#searchInput").on("keyup", function () {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function () {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>



</body>

</html>