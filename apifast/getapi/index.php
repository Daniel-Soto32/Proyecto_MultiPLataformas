<?php

//$url = 'https://desarrolloappapache.enlacenet.net/equipo02/phpProyecto/index.php';
$url = 'http://localhost/apifast/index.php';

$paramsAddDoc = array(
    "nombre_doc" => "Daniel",
    //"apellido" => "Ramirez",
   "apellido_pat_doc" => "Ruiz",
   "apellido_mat_doc" => "Leon",
   "cedula" => 123456,
   "rama_medica" => "Prueba rama medica",
   "genero_doc" => "Mujer",
   "mail_doc" => "Prueba Mail",
   "pass_doc" => "pruebaPass123$",
   "tel_doc" => 1231231234,
   "direccion_consultorio" => "Purbea consultorio",
);
$peremsDelDoc = array(
    "id_doctor" => 1019 ,
);

$paramsAddPac = array(
   "nombre_paciente" => "Natalia",
   "apellido_pat_paciente" => "Ruiz",
   "apellido_mat_paciente" => "León",
   "genero_paciente" => "Mujer",
   "edad_paciente" => 23,
   "tel_paciente" => 1234567890,
   "alergias_paciente" => "Prueba Alergias POST",
   "antecedentes_paciente" => "Prueba antecedentes POST",
   "mail_paciente" => "pacienteNatalia@gmail.com",
   "pass_paciente" => "PruebaPass123",
   "id_doctor" => 1000,
);

$paramsPut = array(
    "id_doctor" => 1001,
    "mail_doc" => "Prueba Mail PUT",
   "pass_doc" => "pruebaPass123",
   "tel_doc" => 123456789,
   "direccion_consultorio" => "Prueba consultorio PUT   "
);

$paramsPutPacientes = array(
    "id_paciente" => 5001,
    "edad_paciente"=> 32,
    "tel_paciente"=>1234567890,
    "alergias_paciente"=> "Prueba alergias PUT",
    "antecedentes_paciente"=> "Prueba Antecedentes PUT",
    "mail_paciente"=> "nuevoMailPut@gmail.com",
    "pass_paciente"=> "PruebaPassPut123"
);
$paramDelete = array(
    "id_paciente" => 5024,
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
echo $response;

//var_dump( json_decode( $response , true) );
// Check if an error occurred during the request
if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

// Close the cURL session
curl_close($ch);

// Output the response

?>