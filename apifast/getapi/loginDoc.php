<?php
error_reporting(0);
if( isset($_POST["submit"]) ){
    //$url = 'https://desarrolloappapache.enlacenet.net/equipo02/phpProyecto/index.php';
    $url = 'http://localhost/apifast/index.php';

    $correo = $_POST["Email"];
    $pass = md5($_POST["Password"]);
    //echo $correo, "<br>", $pass ,"<br>"; //IMPORTANTE NO BORRAR
    $paramsGet = array(
        "mail_doc" => $correo,
        "pass_doc" => $pass
    );
    // Build the URL with the parameters
    $url .= '?' . http_build_query($paramsGet);
    // Initialize a cURL session
    $ch = curl_init($url);
    $val = json_encode($paramsGet);
    // Set cURL options
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); // Escrbimos el método (get, post, delete, put)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Set the request header
    curl_setopt($ch, CURLOPT_POSTFIELDS,  $val);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (only for testing purposes)

    $result = file_get_contents($url); //nos regresa lo que manda la API
    $json = json_decode($result);
    //echo $json->mail_doc, "<br>",$json->pass_doc;//IMPORTANTE NO BORRAR
    //echo $result;
    if($correo == $json->mail_doc and $json->pass_doc==$pass){
        header('Location: homeDoc.php');
    }else{
        $mensaje.='<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Por favor, verifica tus datos: </strong> Correo o contraseña incorrecta.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        // header('Location: loginDoc.php'); //CAMBIAR A  loginDoc.php o .html
        
    }

    if(curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    }
    // Close the cURL session
    curl_close($ch);
    // Output the response
    /*<form name="test" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    */  
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- para hacerlo responsive-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <link rel="shortcut icon" href="icon01.png" />
		<style>
		</style>
			
		<title>DesarrolloApp</title>
	</head>

    <body>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-4" style="background-color:	#77DD77">
                    <div class="py-4 text-white min-vh-100" align="center"></div>
                </div>
                <div  class="col-8 py-4" align="center"> <!-- py = padding -->
                    <h2 style="padding-bottom: 45px;padding-top: 25px;">¡Bienvenido!</h2>  
                    <div class="btn-group" id="algo" >
                        <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off" />
                        <label class="btn btn-secondary algo_1" style="border-radius: 10px 0px 0px 10px;" for="option2">Soy doctor</label>
                      
                        <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off" />
                        <label class="btn btn-secondary" style="border-radius: 0px 10px 10px 0px;" for="option3">Soy paciente</label>
                    </div>

                    <form action="" method="post">
                        <div class="form-group" style="padding-bottom: 30px; padding-top: 10px;width: 300px;">
                          <label style="padding-bottom: 10px; float: left;" for="Email">Correo</label>
                          <input autocomplete="off" style="border-radius: 10px;" type="email" class="form-control" name="Email" id="Email" aria-describedby="emailHelp" placeholder="Ingrese su correo">
                        </div>
                        <div class="form-group"  style="padding-bottom: 30px;width: 300px;">
                          <label style="padding-bottom: 10px; float: left;"  for="Password">Contraseña</label>
                          <input autocomplete="off" style="border-radius: 10px;" type="password" class="form-control" name="Password" id="Password" placeholder="Ingrese su contraseña">
                        </div>
                        <div style="padding-bottom: 30px;">
                        <button style="width: 100px;background-color: #42AB49;border-color: #42AB49 ; border-radius: 25% 5%;" type="submit" name="submit" class="btn btn-primary">Iniciar</button>
                        
                        </div>  
                        <div >
                            <p style="color: grey;">¿No tiene una cuenta todavía? <a href="registrarDoc.php">Registrarse</a> </p>
                        </div>
                    </form>
                    
                    <?php echo $mensaje;?>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>