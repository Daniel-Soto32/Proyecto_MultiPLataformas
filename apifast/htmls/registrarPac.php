<?php
error_reporting(0);
if (isset($_POST["submit"])) {
    //$url = 'https://desarrolloappapache.enlacenet.net/equipo02/phpProyecto/index.php';
    $url = 'http://localhost/apifast/index.php';

    $name = $_POST["namePac"];
    $ape1 = $_POST["apPaternoPac"];
    $ape2 = $_POST["apMaternoPac"];
    $genero = $_POST["generoPac"];
    $edad = $_POST["edadPac"];
    $mail = $_POST["emailPac"];
    $pass = md5($_POST["passPac"]);
    $pass2 = md5($_POST["passPacConf"]);
    $tel = $_POST["telPac"];
    $alergias = $_POST["alergiasPac"];
    $antecedentes = $_POST["antecedentesPac"];
    $id = $_POST["idDoc"];

    if ($_POST["passPac"] == $_POST["passPacConf"]) {
        $paramsAddPac = array(
            "nombre_paciente" => $name,
            "apellido_pat_paciente" => $ape1,
            "apellido_mat_paciente" => $ape2,
            "genero_paciente" => $genero,
            "edad_paciente" => $edad,
            "tel_paciente" => $tel,
            "alergias_paciente" => $alergias,
            "antecedentes_paciente" => $antecedentes,
            "mail_paciente" => $mail,
            "pass_paciente" => $pass,
            "id_doctor" => $id,
        );
        $url .= '?' . http_build_query($paramsAddPac);
        // Initialize a cURL session
        $ch = curl_init($url);
        $val = json_encode($paramsAddPac);
        // Set cURL options
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); // Escrbimos el método (get, post, delete, put)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Set the request header
        curl_setopt($ch, CURLOPT_POSTFIELDS, $val);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (only for testing purposes)

        //$result = file_get_contents($url); //nos regresa lo que manda la API
        $response = curl_exec($ch);
        //$json = json_decode($result);
        //echo $json->mail_doc, "<br>",$json->pass_doc;//IMPORTANTE NO BORRAR
        //echo $result;
        //echo "Registrado con exito";
        sleep(3);
        header('Location: login.php');
        // //if($correo == $json->mail_doc and $json->pass_doc==$pass){
        // //    
        // //}else{
        // $mensaje .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //                 <strong>Por favor, verifica tus datos: </strong> Rellena todos los datos correctamente.
        //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                     <span aria-hidden="true">&times;</span>
        //                 </button>
        //            </div>';
        // if (curl_errno($ch)) {
        //     echo 'Error: ' . curl_error($ch);
        // }
        curl_close($ch);
    } else {
        $mensaje .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                <input class="form-control inputStyle" type="text" id="namePac" name="namePac"
                                    placeholder="Ingrese su nombre" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="ApPaterno">Apellido paterno</label>
                                <input class="form-control inputStyle" type="text" id="apPaternoPac" name="apPaternoPac"
                                    placeholder="Ingrese su apellido paterno" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="ApMaterno">Apellido materno</label>
                                <input class="form-control inputStyle" type="text" id="apMaternoPac" name="apMaternoPac"
                                    placeholder="Ingrese su apellido materno" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="height: 100px;">
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="genero">Género</label>
                                <select class="form-select inputStyle" id="generoPac" name="generoPac">
                                    <option value="none" selected disabled hidden>Seleccione una opción</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="direccion">Edad</label>
                                <input class="form-control inputStyle" type="text" id="edadPac" name="edadPac"
                                    placeholder="Ingrese su edad" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="telefono">Teléfono</label>
                                <input class="form-control inputStyle" type="tel" id="telPac" name="telPac"
                                    placeholder="Ingrese su teléfono" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-divider">Información médica</div>
                    <div class="row" style="height: 100px;">
                        <div class="col-4 ">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="Name">Alergias</label>
                                <input class="form-control inputStyle" type="text" id="alergiasPac" name="alergiasPac"
                                    placeholder="Ingrese sus alergias" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="ApPaterno">Antecedentes médicos</label>
                                <input class="form-control inputStyle" type="text" id="antecedentesPac"
                                    name="antecedentesPac" placeholder="Ingrese sus antecedentes médicos" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="ApMaterno">ID de su doctor</label>
                                <input class="form-control inputStyle" type="text" id="idDoc" name="idDoc"
                                    placeholder="Ingrese el ID de su médico" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-divider">Información usuario</div>
                    <div class="row" style="height: 100px;">
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="usuario">Correo</label>
                                <input class="form-control inputStyle" type="email" id="emailPac" name="emailPac"
                                    placeholder="Ingrese su correo" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="contraseña">Contraseña</label>
                                <input class="form-control inputStyle" type="password" id="passPac" name="passPac"
                                    placeholder="Ingrese su contraseña" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group formStyle">
                                <label class="inputTitle" for="contraseñaConf">Confirmar contraseña</label>
                                <input class="form-control inputStyle" type="password" id="passPacConf"
                                    name="passPacConf" placeholder="Confirme su contraseña" required>
                            </div>
                        </div>
                    </div>
                    <div class="submitRegister">
                        <button type="submit" class="btn customizedNat" name="submit">Registrar</button>
                    </div>
                </form>
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