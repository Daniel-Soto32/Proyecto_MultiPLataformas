<?php
require_once('conexion.php');
require_once('cors.php');
require_once('controller.php');

$methodHTTP = $_SERVER['REQUEST_METHOD'];
//echo json_encode($_SERVER);
switch ($methodHTTP) {
  
  case 'GET': 

      if(empty($_GET)){
        $ctl = $ctl2 = new Controller();
        $data = $ctl->getDoctores();
        $data2 = $ctl2->getPacientes();
        
        //echo "Doctores:<br>",json_encode(["Doctores" => $data , "Pacientes" => $data2]);
        echo json_encode(["Doctores" => $data , "Pacientes" => $data2]);
      }else{
        $data = $_GET;
        $ctl = new Controller();
        
        if( isset( $data['id_doctor']) and isset( $data['type'] ) ){
          
          $result = $ctl->getPacientesByIdDoc($data);
          echo json_encode($result);
        }
        elseif( isset( $data['id_doctor'] )){

          $result = $ctl->getOneDoctor($data);
          echo json_encode($result);
        }
        /*
        if( isset( $data['nombre_doc'] )){
          $result = $ctl->addDoctor($data);
          echo json_encode( $result );
        }
        */
        elseif( isset( $data['mail_doc'] )){
          $result = $ctl->getLogin( $data );
          echo json_encode( $result );
          //echo json_encode( $result );
        }
        else{
          $result = $ctl->getOnePaciente( $data );
          //echo "Paciente:<br>",json_encode( [ "infoPaciente" => $result ] );
          echo json_encode( $result );
        }
        
      }

      break;

  case 'POST':
      $data = json_decode(file_get_contents('php://input'), true);
      $ctl = new Controller();
      //echo "Datos a Postear:<br>", json_encode($data),"<br>";
      if( isset($data['nombre_doc'])){
        $result = $ctl->addDoctor($data);
        echo json_encode( $result );
        //echo "Doctor Posteado:<br>", json_encode( $result );
      }else{
        $result = $ctl->addPaciente($data);
        echo json_encode( $result );
        //echo "Paciente Posteado:<br>",json_encode( $result );
      }
      break;

   case 'DELETE':
       $data = json_decode(file_get_contents('php://input'), true); 
       if( isset( $data['id_paciente'] )){
        $ctl = new Controller();
        $result = $ctl->deletePaciente($data);
        //echo json_encode( ["Paciente eliminado" => $result ] );
        echo json_encode( $result );
      }else{
        $ctl = new Controller();
        $result = $ctl->deleteDoctor($data);
        //echo json_encode( ["Doctor eliminado" => $result ]);
        echo json_encode(  $result  );
      }
       echo "<br>",json_encode([ "data" => $data]);
       break;

   case 'PUT';  
      $data = json_decode(file_get_contents('php://input'), true); 
      $ctl = new Controller();
      echo "Datos a actualizar:<br>",json_encode([ "data" => $data]), "<br><br>";

      if( isset( $data['id_doctor'] )){
        $result = $ctl->updateDoctor( $data );
        echo json_encode( $result );
        $resultShow = $ctl->getOneDoctor( $data );
        //echo "Nuevos datos: ", json_encode( $resultShow );
        echo json_encode( $resultShow );
      }else{
        $result = $ctl->updatePaciente( $data );
        echo json_encode( $result);
        $resultShow = $ctl->getOnePaciente( $data );
        echo json_encode( $resultShow );
      }
      break;

  default:
    echo "No se ha detectado ningún método, por favor verifícalo :(";
    break;
}

?>