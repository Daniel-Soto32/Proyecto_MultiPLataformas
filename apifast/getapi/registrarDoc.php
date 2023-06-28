<?php
error_reporting(0);
if( isset( $_POST["submit"] )){
    //$url = 'https://desarrolloappapache.enlacenet.net/equipo02/phpProyecto/index.php';
    $url = 'http://localhost/apifast/index.php';

    $name = $_POST["Name"];
    $ape1 = $_POST["ape1"];
    $ape2 = $_POST["ape2"];
    $cedula = $_POST["cedula"];
    $rama = $_POST["rama"];
    $genero = $_POST["genero"];
    $mail = $_POST["Mail"];
    $pass = md5($_POST["Pass"]);
    $pass2 = md5($_POST["Pass2"]);
    $tel = $_POST["tel"];
    $adress = $_POST["adress"];

    if($_POST["Pass"] == $_POST["Pass2"]){
        $paramsAddDoc = array(
            "nombre_doc" => $name,
            "apellido_pat_doc" => $ape1,
            "apellido_mat_doc" => $ape2,
            "cedula" => $cedula,
            "rama_medica" => $rama,
            "genero_doc" => $genero,
            "mail_doc" => $mail,
            "pass_doc" => $pass,
            "tel_doc" => $tel,
            "direccion_consultorio" => $adress,
        );
        $url .= '?' . http_build_query($paramsAddDoc);
        // Initialize a cURL session
        $ch = curl_init($url);
        $val = json_encode($paramsAddDoc);
        // Set cURL options
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); // Escrbimos el método (get, post, delete, put)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Set the request header
        curl_setopt($ch, CURLOPT_POSTFIELDS,  $val);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (only for testing purposes)

        //$result = file_get_contents($url); //nos regresa lo que manda la API
        $response = curl_exec($ch);
        //$json = json_decode($result);
        //echo $json->mail_doc, "<br>",$json->pass_doc;//IMPORTANTE NO BORRAR
        //echo $result;
        header('Location: loginDoc.php');
        //if($correo == $json->mail_doc and $json->pass_doc==$pass){
        //    
        //}else{
        $mensaje.='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Por favor, verifica tus datos: </strong> Rellena todos los datos correctamente.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                   </div>';
            // header('Location: loginDoc.php'); //CAMBIAR A  loginDoc.php o .html
            
        

        if(curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }
        curl_close($ch);
    }
    else{
        $mensaje.='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Por favor, verifica tus datos: </strong> Rellena todos los datos correctamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }
    

}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- para hacerlo responsive-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<link rel="shortcut icon" href="icon01.png" />
		<style>
            .customizedNat{
            color: white;
            width: 100px;
            background-color: #42AB49;
            border-color: #42AB49 ; 
            border-radius: 25% 5%;
        }
		</style>
			
		<title>DesarrolloApp</title>
	</head>
	
    <body>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-3" style="background-color:	#77DD77">
                    <div class="py-4 text-white min-vh-100" align="center"></div>
                </div>
                <div  class="col-9 py-4" align="center"> <!-- py = padding -->
                    <h2 style="padding-bottom: 45px;padding-top: 25px;">Crear cuenta</h2>  
                    
                    <form action="" method="post">        
                        <div class="row" style="height: 100px;">
                            <div class = "col-4" align="center"> 
                                <div class="form-group" style="padding-bottom: 30px; padding-right: 20px ;width: 300px;" >
                                    <label style="padding-bottom: 10px; float: left;" for="Name">Nombre(s)</label>
                                    <input style="border-radius: 10px;" name="Name" type="Name" class="form-control" id="Name" placeholder="Ingrese su nombre">
                                </div>
                        
                            </div>
                            <div class = "col-4" align="center"> 
                                <div class="form-group" style="padding-bottom: 30px; padding-right: 20px ;width: 300px;" >
                                    <label style="padding-bottom: 10px; float: left;" for="ApPaterno">Apellido paterno</label>
                                    <input style="border-radius: 10px;" name="ape1" type="ApPaterno" class="form-control" id="ApPaterno" placeholder="Ingrese su apellido paterno">
                                </div>
                            </div>

                            <div class = "col-4" align="center"> 
                                <div class="form-group" style="padding-bottom: 30px; padding-right: 20px ;width: 300px;" >
                                    <label style="padding-bottom: 10px; float: left;" for="ApMaterno">Apellido materno</label>
                                    <input style="border-radius: 10px;" name="ape2" type="ApMaterno" class="form-control" id="ApMaterno" placeholder="Ingrese su apellido materno">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="height: 100px;">
                            <div class = "col-4" align="center"> 
                                <div class="form-group" style="padding-bottom: 30px; padding-right: 20px ;width: 300px;" >
                                    <label style="padding-bottom: 10px; float: left;" for="genero">Género</label>
                                    <select name="genero" id="genero" class="form-select" >
                                        <option value="none" selected disabled hidden>Seleccione una opción</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                        
                            </div>
                            <div class = "col-4" align="center"> 
                                <div class="form-group" style="padding-bottom: 30px; padding-right: 20px ;width: 300px;" >
                                    <label style="padding-bottom: 10px; float: left;" for="direccion">Dirección del consultorio</label>
                                    <input style="border-radius: 10px;" name="adress" type="direccion" class="form-control" id="direccion" placeholder="Ingrese su dirección">
                                </div>
                            </div>

                            <div class = "col-4" align="center"> 
                                <div class="form-group" style="padding-bottom: 30px; padding-right: 20px ;width: 300px;" >
                                    <label style="padding-bottom: 10px; float: left;" for="telefono">Teléfono</label>
                                    <input style="border-radius: 10px;" name="tel" type="telefono" class="form-control" id="telefono" placeholder="Ingrese su teléfono">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="height: 100px;">
                            <div class = "col-4" align="center"> 
                                <div class="form-group" style="padding-bottom: 30px; padding-right: 20px ;width: 300px;" >
                                    <label style="padding-bottom: 10px; float: left;" for="cedula">Cédula médica</label>
                                    <input style="border-radius: 10px;" name="cedula" type="cedula" class="form-control" id="cedula" placeholder="Ingrese su cédula médica">
                                </div>
                        
                            </div>
                            <div class = "col-8" align="left"> 
                                <div class="form-group" style="padding-bottom: 30px; padding-right: 20px ;width: 500px;" >
                                    <label style="padding-bottom: 10px; float: left;" for="ramaMedica">Rama médica</label>
                                    <input style="border-radius: 10px;" name="rama" type="ramaMedica" class="form-control" id="ramaMedica" placeholder="Ingrese su rama médica">
                                </div>
                            </div>

                        </div>
                        <div class="row" style="height: 100px;">
                            <div class = "col-4" align="center"> 
                                <div class="form-group" style="padding-bottom: 30px; padding-right: 20px ;width: 300px;" >
                                    <label style="padding-bottom: 10px; float: left;" for="usuario">Correo</label>
                                    <input style="border-radius: 10px;" name="Mail" type="usuario" class="form-control" id="usuario" placeholder="Ingrese su usuario">
                                </div>
                        
                            </div>
                            <div class = "col-4" align="center"> 
                                <div class="form-group" style="padding-bottom: 30px; padding-right: 20px ;width: 300px;" >
                                    <label style="padding-bottom: 10px; float: left;" for="contraseña">Contraseña</label>
                                    <input style="border-radius: 10px;" name="Pass" type="password"  class="form-control" id="contraseña" placeholder="Ingrese su contraseña">
                                </div>
                            </div>

                            <div class = "col-4" align="center"> 
                                <div class="form-group" style="padding-bottom: 30px; padding-right: 20px ;width: 300px;" >
                                    <label style="padding-bottom: 10px; float: left;" for="contraseñaConf">Confirmar contraseña</label>
                                    <input style="border-radius: 10px;" name="Pass2" type="password"  class="form-control" id="contraseñaConf" placeholder="Confirme su contraseña">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="height: 100px;">
                            <div class = "col-4" align="center"> 
                            </div>
                            <div class = "col-4" align="center"> 
                                <button type="submit" name="submit"  class="btn btn-success customizedNat">Registrar</button>
                            </div>

                            <div class = "col-4" align="center"> 
                            </div>
                        </div>
                    </form> 
                    <?php echo $mensaje ?>
                </div>    
            </div>
        </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>



    </body>

</html>