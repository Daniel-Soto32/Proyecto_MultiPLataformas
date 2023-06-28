<?php
error_reporting(0);
if (isset($_POST["submit"])) {
    //$url = 'https://desarrolloappapache.enlacenet.net/equipo02/phpProyecto/index.php';
    $url = 'http://localhost/apifast/index.php';

    $name = $_POST["nameDoc"];
    $ape1 = $_POST["apPaternoDoc"];
    $ape2 = $_POST["apMaternoDoc"];
    $cedula = $_POST["cedula"];
    $rama = $_POST["ramaMed"];
    $genero = $_POST["generoDoc"];
    $mail = $_POST["emailDoc"];
    $pass = md5($_POST["passDoc"]);
    $pass2 = md5($_POST["passDocConf"]);
    $tel = $_POST["telDoc"];
    $adress = $_POST["direccionDoc"];

    if ($_POST["passDoc"] == $_POST["passDocConf"]) {
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
        curl_setopt($ch, CURLOPT_POSTFIELDS, $val);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (only for testing purposes)

        //$result = file_get_contents($url); //nos regresa lo que manda la API
        $response = curl_exec($ch);
        //$json = json_decode($result);
        //echo $json->mail_doc, "<br>",$json->pass_doc;   // IMPORTANTE NO BORRAR
        //echo $result;
        //$json = json_decode($result);
        //$_SESSION["userRegistrado"] = $json->nombre_doc;
        sleep(3);
        header('Location: login.php');
        exit();

    } else {
        $mensaje .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Por favor, verifica tus datos: </strong> Completa todos los datos correctamente y escribe la contraseña correctamente.
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
    <div class="container-fluid styleRegistrar">
        <div class="row flex-nowrap">
            <div class="col-3 diagonal-gradient">
                <div class="text-white min-vh-100 logoStyle"><img style="height: 150px;"  src="./img/logoFinal_grande.png"></div>
            </div>
            <div class="col-9 py-4">
                <h2 class="hRegistrar">Crear cuenta</h2>
                <form action="" method="post" onsubmit="return getAlert(this)">
                    <div class="text-divider">Información personal</div>

                    <div class="row" style="height: 100px;">
                        <div class="col-4 ">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="Name">Nombre(s)</label>
                                <input class="form-control inputStyle" type="text" id="nameDoc" name="nameDoc"
                                    placeholder="Ingrese su nombre" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="ApPaterno">Apellido paterno</label>
                                <input class="form-control inputStyle" type="text" id="apPaternoDoc" name="apPaternoDoc"
                                    placeholder="Ingrese su apellido paterno" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="ApMaterno">Apellido materno</label>
                                <input class="form-control inputStyle" type="text" id="apMaternoDoc" name="apMaternoDoc"
                                    placeholder="Ingrese su apellido materno" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="height: 100px;">
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="genero">Género</label>
                                <select class="form-select inputStyle" id="generoDoc" name="generoDoc" required>
                                    <option value="none" selected disabled hidden>Seleccione una opción</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="direccion">Dirección del consultorio</label>
                                <input class="form-control inputStyle" type="text" id="direccionDoc" name="direccionDoc"
                                    placeholder="Ingrese su dirección" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="telefono">Teléfono</label>
                                <input class="form-control inputStyle" type="tel" id="telDoc" name="telDoc"
                                    placeholder="Ingrese su teléfono" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-divider">Información profesional</div>
                    <div class="row" style="height: 100px;">
                        <div class="col-6">
                            <div class="form-group" style="padding-bottom: 30px; padding-right: 20px ;width: 450px;">
                                <label class="inputTitle" for="cedula">Cédula médica</label>
                                <input class="form-control inputStyle" type="text" id="cedula" name="cedula"
                                    placeholder="Ingrese su cédula médica" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group" style="padding-bottom: 30px; padding-right: 20px ;width: 450px;">
                                <label class="inputTitle" for="cedula">Rama médica</label>
                                <input class="form-control inputStyle" type="text" id="ramaMed" name="ramaMed"
                                    placeholder="Ingrese su rama médica" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-divider">Información usuario</div>
                    <div class="row" style="height: 100px;">
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="usuario">Correo</label>
                                <input class="form-control inputStyle" type="email" id="emailDoc" name="emailDoc"
                                    placeholder="Ingrese su correo" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="contraseña">Contraseña</label>
                                <input class="form-control inputStyle" type="password" id="passDoc" name="passDoc"
                                    placeholder="Ingrese su contraseña" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="contraseñaConf">Confirmar contraseña</label>
                                <input class="form-control inputStyle" type="password" id="passDocConf"
                                    name="passDocConf" placeholder="Confirme su contraseña" required>
                            </div>
                        </div>
                    </div>
                    <div class="submitRegister">
                        <button type="submit" class="btn customizedNat" name="submit">Registrar</button>
                    </div>
                </form>
                <br>
                <?php echo $mensaje; ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function getAlert(form) {
            //alert("Registrado con Exito! :)");
            swal("¡Exito!", "Usuario registrado", "success");
        }
    </script>
</body>

</html>