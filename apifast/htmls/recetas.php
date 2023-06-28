<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- para hacerlo responsive-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" charset="utf-8"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link rel="stylesheet" href="style.css">
    
		<title></title>
	</head>

  <body>
	<header>
		<div class="inner-width">
			<a style="text-decoration: none;" href="./homeDoc.html" class="logo"><h2 class="h2Nat"><img src="./img/logoFinal_chico.png" alt=""></h2></a>
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
	<div>
		<h1 class="pageTitle">Recetas</h1>
    </div>
	<div style="margin: 30px;"> 
		<a class="btn btn-circle" href="./homeDoc.html"><i style="color: black; margin: 0px;" class="fa fa-arrow-left fa-2xl"></i></a>
    </div>
	

	<div class="input-group rounded searchBar" style="padding-top: 180px;" >
		<input type="search" class="form-control" placeholder="Buscar..." id="searchInput" />
		<span class="input-group-text border-0" id="search-addon">
		  <i class="fas fa-search"></i>
		</span>
	</div>
	<div>	
		<button type="button" class="btnAddReceta"  data-bs-toggle="modal" data-bs-target="#modalAddReceta"><i class="fas fa-add "></i> Añadir receta</button>	
			<div class="modal modalAdd fade modal-lg " id="modalAddReceta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content modalAddReceta ">
						<div class="modal-header" style="height: 0;background-color: #90c490;">	
							<h5 class="modal-title col-11 text-center" id="exampleModalLabel">Receta</h5>		
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							
						</div>
						<div class="modal-body" >
							<form>
								<div>
									<div class="row" style="height: 50px;">
										<div class="col-3">
											<span class="h4Titles" >Nombre: </span>
										</div>
										<div class="col-3">
											<p >Natalia Ruiz León</p>
										</div>
										<div class="col-3">
											<span class="h4Titles" >Edad: </span>
										</div>
										<div class="col-3">
											<p >ALGO</p>
										</div>
									</div>
									<div class="row" style="height: 50px;">
										<div class="col-3">
											<span class="h4Titles" >Alergias: </span>
										</div>
										<div class="col-9">
											<p > algoo</p>
										</div>
									</div>
									<div class="row" style="height: 30px;">
										<div class="col-3">
											<span class="h4Titles" >Antecedentes: </span>
										</div>
										<div class="col-9">
											<p > algoo</p>
										</div>
									</div>
									
									</div>
								<div class="text-divider"></div>
								<div class="form-group">
								  <label for="message-text"  class="col-form-label">Receta:</label>
								  <textarea style="height: 100px; background-color: rgba(231, 231, 231, 0.925);" class="form-control" id="message-text"></textarea>
								</div>
							  </form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-primary">Añadir</button>
						</div>
					</div>
				</div>
			</div>
			
    </div>

	<div class="d-flex justify-content-center table_conf" style="padding-top: 100px;padding-bottom: 60px">
		<table class="table_pacients rounded-corners" style="margin: 0;"> 
			<thead>
				<tr >
					<th  style="width: 300px;" >Receta</th>
					<th  style="width: 300px;" >Fecha</th>
					<th style="width: 400px;">Acciones</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<tr>
					<td>
						Receta 1
					</td>
					<td>
						18/03/23
					</td>
					<td>
						<button type="button" class="btn buttonSee" data-bs-toggle="modal" data-bs-target="#modalSeeReceta"><i class="fas fa-eye eye"></i> Ver receta</button>
						<div class="modal modalAdd fade modal-lg " id="modalSeeReceta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content modalAddReceta ">
									<div class="modal-header" style="height: 0;background-color: #90c490;">	
										<h5 class="modal-title col-11 text-center" id="exampleModalLabel">Receta</h5>		
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										
									</div>
									<div class="modal-body"  >
										<form>
											<div style="text-align:left;">
												<div class="row" style="height: 50px;">
													<div class="col-3">
														<span class="h4Titles" >Nombre: </span>
													</div>
													<div class="col-3">
														<p >Natalia Ruiz León</p>
													</div>
													<div class="col-3">
														<span class="h4Titles" >Edad: </span>
													</div>
													<div class="col-3">
														<p >ALGO</p>
													</div>
												</div>
												<div class="row" style="height: 50px;">
													<div class="col-3">
															<span class="h4Titles" >Alergias: </span>
													</div>
													<div class="col-9">
														<p > algoo</p>
													</div>
												</div>
												<div class="row" style="height: 30px;">
													<div class="col-3">
														<span class="h4Titles" >Antecedentes: </span>
													</div>
													<div class="col-9">
														<p > algoo</p>
													</div>
												</div>
											</div>
											<div class="text-divider"></div>
											<div class="form-group">
											  <label for="message-text" style="float: left;margin-left:30px" class="col-form-label">Receta:</label><br>
											  <p>hoasdjnfakjsdnfkjasndkfjnaskjdfnkjahoasdjnfakjsdnfkjasndkfjnaskjdfnkja</p>
											</div>
										  </form>
									</div>
								</div>
							</div>
						</div>
						<button type="button" class="btn buttonDelete" style="margin-left: 40px;" data-bs-toggle="modal" data-bs-target="#modalDelete"><i class="fas fa-trash "></i> Eliminar receta</button>
							<div  class="modal fade modal-lg" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<p>¿Está seguro de querer eliminar la receta?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
											<button type="button" class="btn btn-primary" >Aceptar</button>
										</div>
									</div>
								</div>
							</div>
					</td>
				</tr>
				<tr>
					<td>
						Receta 1
					</td>
					<td>
						18/03/23
					</td>
					<td>
						<button type="button" class="btn buttonSee" data-bs-toggle="modal" data-bs-target="#modalSeeReceta"><i class="fas fa-eye eye"></i> Ver receta</button>
						<div class="modal modalAdd fade modal-lg " id="modalSeeReceta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content modalAddReceta ">
									<div class="modal-header" style="height: 0;background-color: #90c490;">	
										<h5 class="modal-title col-11 text-center" id="exampleModalLabel">Receta</h5>		
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										
									</div>
									<div class="modal-body"  >
										<form>
											<div style="text-align: left;" >
											  <label for="recipient-name" class="col-form-label">Edad:</label><br>
											  <label for="recipient-name" class="col-form-label">Alergias:</label><br>
											  <label for="recipient-name" class="col-form-label">Antecedentes:</label>
											</div>
											<div class="text-divider"></div>
											<div class="form-group">
											  <label for="message-text" style="float: left;" class="col-form-label">Receta:</label><br>
											  <p>hoasdjnfakjsdnfkjasndkfjnaskjdfnkja</p>
											</div>
										  </form>
									</div>
								</div>
							</div>
						</div>
						<button type="button" class="btn buttonDelete" style="margin-left: 40px;" data-bs-toggle="modal" data-bs-target="#modalDelete"><i class="fas fa-trash "></i> Eliminar receta</button>
							<div  class="modal fade modal-lg" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<p>¿Está seguro de querer eliminar la receta?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
											<button type="button" class="btn btn-primary" >Aceptar</button>
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
		$(".menu-toggle-btn").click(function(){ //navbar
			$(this).toggleClass("fa-times");
			$(".navigation-menu").toggleClass("active");
		});

		$(document).ready(function(){ //funcion para buscar e la tabla
		$("#searchInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
		});
	</script>

  </body>
</html>