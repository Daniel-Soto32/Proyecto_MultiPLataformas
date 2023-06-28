<?php

error_reporting(0);
session_start();

if ( isset( $_POST["submit"]) ) {
    //$url = 'https://desarrolloappapache.enlacenet.net/equipo02/phpProyecto/index.php';
    $url = 'http://localhost/apifast/index.php';

    $correo = $_POST["Email"];
    $pass = md5($_POST["Password"]);
    $type = $_POST["options"];
    //$id = $_POST["id"];

    $paramsGet = array(
        "mail_doc" => $correo,
        "pass_doc" => $pass,
        "type" => $type
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
    curl_setopt($ch, CURLOPT_POSTFIELDS, $val);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (only for testing purposes)

    $result = file_get_contents($url); //nos regresa lo que manda la API
    $json = json_decode($result);

    if ($type == "Soy doctor") {
        if ($correo == $json->mail_doc and $json->pass_doc == $pass) {
            $_SESSION["nombre_Doc"] = $json->nombre_doc;
            $_SESSION["genero_Doc"] = $json->genero_doc;
            $_SESSION["apelli_Doc"] = $json->apellido_pat_doc;
            $_SESSION["apelli_Doc_Mat"] = $json->apellido_mat_doc;
            $_SESSION["id_Doctor"] = $json->id_doctor;
            $_SESSION["direcc_Doc"] = $json->direccion_consultorio;
            $_SESSION["cedula_Doc"] = $json->cedula;
            $_SESSION["rama_medica_Doc"] = $json->rama_medica;
            $_SESSION["tel_Doc"] = $json->tel_doc;
            $_SESSION["mail_Doc"] = $json->mail_doc;
            header('location: homeDoc.php');
            exit();
        } else {
            $mensaje .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Por favor, verifica tus datos: </strong> Correo o contraseña de doctor incorrectos.
                                <button type="button" class="close" data-dismiss="alert" >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
        }
    } elseif ($type == "Soy paciente") {
        if ($correo == $json->mail_paciente and $json->pass_paciente == $pass) {
            $_SESSION["namePac"] = $json->nombre_paciente;
            $_SESSION["generoPac"] = $json->genero_paciente;
            $_SESSION["apPaternoPac"] = $json->apellido_pat_paciente;
            $_SESSION["apMaternoPac"] = $json->apellido_mat_paciente;
            $_SESSION["telPac"] = $json->tel_paciente;
            $_SESSION["emailPac"] = $json->mail_paciente;
            $_SESSION["edadPac"] = $json->edad_paciente;
            $_SESSION["alergiasPac"] = $json->alergias_paciente;
            $_SESSION["antecedentesPac"] = $json->antecedentes_paciente;

            $_SESSION["username"] = $correo;
            $_SESSION["type"] = $json->genero_paciente;
            header('location: homePac.php');
            exit();
        } else {
            $mensaje .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Por favor, verifica tus datos: </strong> Correo o contraseña de paciente incorrectos.
                                <button type="button" class="close" data-dismiss="alert" >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
        }
    }

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <title></title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-4 diagonal-gradient" style="background-color:	#77DD77">
            <div class="text-white min-vh-100" style="padding-top: 250px;" align="center"><img style="height: 200px; " src="./img/logoFinal_grande.png"></div>
            </div>
            <div class="col-8 py-4" align="center">
                <h2 style="padding-bottom: 45px;padding-top: 25px;">¡Bienvenido!</h2>



                <form name="input" action="" method="post" onsubmit="return verificaRadios(this)">
                    <div class="btn-group" id="algo">
                        <input type="radio" class="btn-check" name="options" id="option2" value="Soy doctor" />
                        <label class="btn btn-success algo_1" style="border-radius: 10px 0px 0px 10px;"
                            for="option2">Soy doctor</label>

                        <input type="radio" class="btn-check" name="options" id="option3" value="Soy paciente" />
                        <label class="btn btn-primary" style="border-radius: 0px 10px 10px 0px;" for="option3">Soy
                            paciente</label>
                    </div>
                    <div class="form-group" style="padding-bottom: 30px; padding-top: 10px;width: 300px;">
                        <label style="padding-bottom: 10px; float: left;" for="Email">Correo</label>
                        <input style="border-radius: 10px;" name="Email" type="email" class="form-control" id="Email"
                            aria-describedby="emailHelp" placeholder="Ingrese su correo">
                    </div>

                    <div class="form-group" style="padding-bottom: 30px;width: 300px;">
                        <label style="padding-bottom: 10px; float: left;" for="Password">Contraseña</label>
                        <input style="border-radius: 10px;" name="Password" type="password" class="form-control"
                            id="Password" placeholder="Ingrese su contraseña">
                    </div>

                    <div style="padding-bottom: 30px;">
                        <button type="submit" name="submit" class="btn btn-success customizedNat">Iniciar</button>
                    </div>

                    <div>
                        <p style="color: grey;">¿No tiene una cuenta todavía? <a data-bs-toggle="modal"
                                style="margin: 0 20px;" data-bs-target="#modalRegister"
                                href="./registrarDoc.html">Registrarse</a></p>
                        <div class="modal fade modal-lg" id="modalRegister">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <p>¿Quiere registrarse como doctor o paciente?</p>
                                    </div>

                                    <div class="modal-footer">
                                        <a href="registrarDoc.php" class="btn btn-success">Doctor</a>
                                        <a href="registrarPac.php" class="btn btn-primary">Paciente</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php echo $mensaje; ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        function verificaRadios(form) {
            marcado = false;
            for (var i = 0; i < form.options.length; i++) {
                if (form.options[i].checked)
                    marcado = true;
            }

            if (!marcado) {
                //alert("Por favor, debe elegir una opción!");
                swal("¡Advertencia!", "Por favor seleccione como quiere iniciar sesión", "warning");

                return false;
            }
            else {
                return true;
            }
        }
    </script>
</body>

</html>