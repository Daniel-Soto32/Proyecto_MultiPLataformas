<?php
$url = 'http://localhost/apifast/index.php';

$peremsDelDoc = array(
    "id_doctor" => 1018 ,
);

$url .= '?' . http_build_query($peremsDelDoc);
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE'); // Escrbimos el método (get, post, delete, put)
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Set the request header
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($peremsDelDoc));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (only for testing purposes)

echo "Hola";

$result = curl_exec($ch);
//$result = file_get_contents($url); //nos regresa lo que manda la API pero solo corre la liga y el Json, no el metodo
$json = json_decode($result);
//var_dump( json_decode( $response , true) );
//echo $json[0]->id_paciente;
//$_SESSION["userRegistrado"] = $json->nombre_doc;
//$userREGIS = $_SESSION["userRegistrado"];
echo "JSON: <br>",$json;
echo "JSON: ",$result;

//header('Location: login.php');

/*
for ($i=0; $i < count($json); $i++) { 

    foreach ($json[$i] as $value) {
        echo $value,"<br>";
      }
}*/


if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}
curl_close($ch);

?>