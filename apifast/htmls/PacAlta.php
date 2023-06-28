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
	<h1 class="pageTitle">Pacientes dados de alta</h1>
	

	<div class="input-group rounded searchBar" style="padding-top: 80px;">
		<input type="search" class="form-control" placeholder="Buscar..." id="searchInput" />
		<span class="input-group-text border-0" id="search-addon">
			<i class="fas fa-search"></i>
		</span>
	</div>

	<div class="d-flex justify-content-center table_conf">
		<table class="table_pacients" style="margin: 0;">
			<thead>
				<tr>
					<th style="width: 300px;">ID</th>
					<th style="width: 300px;">Nombre</th>
					<th style="width: 300px;">Apellidos</th>
					<th style="width: 300px;">Fecha de finalización</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<tr>
					<td>
						8821
					</td>
					<td>
						Andrea
					</td>
					<td>
						Jiménez López
					</td>
					<td>
						19/03/23
					</td>
				</tr>
				<tr>
					<td>
						9182
					</td>
					<td>
						Daniel
					</td>
					<td>
						Ramírez Soto
					</td>
					<td>
						22/11/21
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