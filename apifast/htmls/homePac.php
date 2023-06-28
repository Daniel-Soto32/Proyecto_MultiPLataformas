<?php
session_start();
error_reporting(0);
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

<body>
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
	<h3 class="pageTitle">
		<?php
			echo "¡Bienvenido ", $name, " ", $ape1,  " ", $ape2, "!";
		?>
		<hr class ="text-divider">
</h3>
	<h2 class="pageTitle">Mis recetas</h2>

	<div class="input-group rounded searchBar" style="padding-top: 160px;">
		<input type="search" class="form-control" placeholder="Buscar..." id="searchInput" />
		<span class="input-group-text border-0" id="search-addon">
			<i class="fas fa-search"></i>
		</span>
	</div>

	<div class="d-flex justify-content-center table_conf">
		<table class="table_pacients" style="margin: 0;">
			<thead>
				<tr>
					<th style="width: 300px;">Receta</th>
					<th style="width: 300px;">Fecha</th>
					<th style="width: 300px;">Acción</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<tr>
					<td>
						Receta 1
					</td>
					<td>
						12/03/23
					</td>
					<td>
						<button type="button" class="btn buttonSee" data-bs-toggle="modal"
							data-bs-target="#modalAddReceta"><i class="fas fa-eye eye"></i> Ver receta</button>
						<div class="modal modalAdd fade modal-lg " id="modalAddReceta" tabindex="-1"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content modalAddReceta ">
									<div class="modal-header" style="height: 0;background-color: #90c490;">
										<h5 class="modal-title col-11 text-center" id="exampleModalLabel">Receta</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>

									</div>
									<div class="modal-body">
										<form>
											<div class="form-group">
												<p style="margin: 50px;">kasndfkjansdkfnajksdnfkjasn</p>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						Receta 2
					</td>
					<td>
						22/03/23
					</td>
					<td>
						<button type="button" class="btn buttonSee" data-bs-toggle="modal"
							data-bs-target="#modalAddReceta"><i class="fas fa-eye eye"></i> Ver receta</button>
						<div class="modal modalAdd fade modal-lg " id="modalAddReceta" tabindex="-1"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content modalAddReceta ">
									<div class="modal-header" style="height: 0;background-color: #90c490;">
										<h5 class="modal-title col-11 text-center" id="exampleModalLabel">Receta</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>

									</div>
									<div class="modal-body">
										<form>
											<div class="form-group">
												<p style="margin: 20px;">kasndnsdkfnajksdnfkjasn</p>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</td>
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