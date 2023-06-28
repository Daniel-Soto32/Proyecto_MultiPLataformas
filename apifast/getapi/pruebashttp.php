<?php

//$url = 'https://desarrolloappapache.enlacenet.net/equipo02/phpProyecto/index.php';
$url = 'http://localhost/apifast/index.php';

$correo = $_POST["Email"];
$pass = $_POST["Password"];
echo $correo, "<br>", $pass ,"<br>"; //IMPORTANTE NO BORRAR
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
echo $json->mail_doc, "<br>",$json->pass_doc;//IMPORTANTE NO BORRAR
//echo $result;
if($correo == $json->mail_doc and $json->pass_doc==$pass){
    header('Location: registrarDoc.html');
}else{
    header('Location: loginDoc.html'); //CAMBIAR A  loginDoc.php
}

if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}
// Close the cURL session
curl_close($ch);
// Output the response
/*<form name="test" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
*/  
?>