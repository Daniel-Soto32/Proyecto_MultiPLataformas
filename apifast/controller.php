<?php

class Controller
{

  public function getDoctores()
  {
    try {
      $list = array();
      $conexion = new Conexion();
      $db = $conexion->getConexion();
      //SQL QUERYS
      $query = "SELECT * FROM doctores";

      $statement = $db->prepare($query);
      $statement->execute();
      //echo "Si entra a getDoctors";
      while ($row = $statement->fetch()) {
        $list[] = array(
          "id_doctor" => $row['id_doctor'],
          "nombre_doc" => $row['nombre_doc'],
          "apellido_pat_doc" => $row['apellido_pat_doc'],
          "apellido_mat_doc" => $row['apellido_mat_doc'],
          "cedula" => $row['cedula'],
          "rama_medica" => $row['rama_medica'],
          "genero_doc" => $row['genero_doc'],
          "mail_doc" => $row['mail_doc'],
          "pass_doc" => $row['pass_doc'],
          "tel_doc" => $row['tel_doc'],
          "direccion_consultorio" => $row['direccion_consultorio']
        );
      } //fin del ciclo while 

      return $list;

    } catch (PDOException $e) {
      echo "¡Error en el getDoctors!: " . $e->getMessage() . "<br/>";
    }
  }

  public function getLogin($data)
  {
    $mail = $data['mail_doc'];
    $pass = $data['pass_doc'];
    $type = $data['type'];
    $list = array();
    $conexion = new Conexion();
    $db = $conexion->getConexion();

    if ($type == "Soy doctor") {
      $query = "SELECT DISTINCT * FROM doctores WHERE mail_doc=:mail_doc and pass_doc=:pass_doc";
      $statement = $db->prepare($query);
      $statement->bindParam(':mail_doc', $mail);
      $statement->bindParam(':pass_doc', $pass);
      $statement->execute();

      while ($row = $statement->fetch()) {
        $list[] = array(
          "id_doctor" => $row['id_doctor'],
          "nombre_doc" => $row['nombre_doc'],
          "apellido_pat_doc" => $row['apellido_pat_doc'],
          "apellido_mat_doc" => $row['apellido_mat_doc'],
          "cedula" => $row['cedula'],
          "rama_medica" => $row['rama_medica'],
          "genero_doc" => $row['genero_doc'],
          "mail_doc" => $row['mail_doc'],
          "pass_doc" => $row['pass_doc'],
          "tel_doc" => $row['tel_doc'],
          "direccion_consultorio" => $row['direccion_consultorio']
        );
      } //fin del ciclo while 
    } else {
      $query = "SELECT DISTINCT * FROM pacientes WHERE mail_paciente=:mail_paciente and pass_paciente=:pass_paciente";
      $statement = $db->prepare($query);
      $statement->bindParam(':mail_paciente', $mail);
      $statement->bindParam(':pass_paciente', $pass);
      $statement->execute();
      //echo "Si entra a getMailDoc";
      while ($row = $statement->fetch()) {
        $list[] = array(
          "id_paciente" => $row['id_paciente'],
          "nombre_paciente" => $row['nombre_paciente'],
          "apellido_pat_paciente" => $row['apellido_pat_paciente'],
          "apellido_mat_paciente" => $row['apellido_mat_paciente'],
          "genero_paciente" => $row['genero_paciente'],
          "mail_paciente" => $row['mail_paciente'],
          "edad_paciente" => $row['edad_paciente'],
          "pass_paciente" => $row['pass_paciente'],
          "alergias_paciente" => $row['alergias_paciente'],
          "antecedentes_paciente" => $row['antecedentes_paciente'],
          "tel_paciente" => $row['tel_paciente'],
          "id_doctor" => $row['id_doctor'],
        );
      } //fin del ciclo while 
    }
    return $list[0];
  }

  public function getLoginDoc($data)
  {
    $mail = $data['mail'];
    $pass = $data['pass'];
    $list = array();
    $conexion = new Conexion();
    $db = $conexion->getConexion();
    $query = "SELECT DISTINCT * FROM pacientes WHERE mail_paciente=:mail_paciente and pass_paciente=:pass_paciente";
    $statement = $db->prepare($query);
    $statement->bindParam(':mail_paciente', $mail);
    $statement->bindParam(':pass_paciente', $pass);
    $statement->execute();
    //echo "Si entra a getMailDoc";
    while ($row = $statement->fetch()) {
      $list[] = array(
        "id_paciente" => $row['id_paciente'],
        "nombre_paciente" => $row['nombre_paciente'],
        "apellido_pat_paciente" => $row['apellido_pat_paciente'],
        "apellido_mat_paciente" => $row['apellido_mat_paciente'],
        "edad_paciente" => $row['edad_paciente'],
        "genero_paciente" => $row['genero_paciente'],
        "mail_paciente" => $row['mail_paciente'],
        "pass_paciente" => $row['pass_paciente'],
        "alergias_paciente" => $row['alergias_paciente'],
        "antecedentes_paciente" => $row['antecedentes_paciente'],
        "tel_paciente" => $row['tel_paciente'],
        "id_doctor" => $row['id_doctor'],
      );
    } //fin del ciclo while 

    return $list[0];
  }

  public function getPacientesByIdDoc($data)
  {
    try {
      $id_Doctor = $data["id_doctor"];
      $list = array();
      $conexion = new Conexion();
      $db = $conexion->getConexion();
      //SQL QUERYS
      $query = "SELECT * FROM pacientes WHERE id_doctor=:id_doctor";

      $statement = $db->prepare($query);
      $statement->bindParam(":id_doctor", $id_Doctor);
      $statement->execute();
      //echo "si entra a getPacientes";
      while ($row = $statement->fetch()) {
        $list[] = array(
          "id_paciente" => $row['id_paciente'],
          "nombre_paciente" => $row['nombre_paciente'],
          "apellido_pat_paciente" => $row['apellido_pat_paciente'],
          "apellido_mat_paciente" => $row['apellido_mat_paciente'],
          "genero_paciente" => $row['genero_paciente'],
          "edad_paciente" => $row['edad_paciente'],
          "tel_paciente" => $row['tel_paciente'],
          "alergias_paciente" => $row['alergias_paciente'],
          "antecedentes_paciente" => $row['antecedentes_paciente'],
          "mail_paciente" => $row['mail_paciente'],
          "pass_paciente" => $row['pass_paciente'],
          "id_doctor" => $row['id_doctor']
        );
      }

      return $list;

    } catch (PDOException $e) {
      echo "¡Error en el getPacientes!: " . $e->getMessage() . "<br/>";
    }
  }
  public function getPacientes()
  {
    try {
      $list = array();
      $conexion = new Conexion();
      $db = $conexion->getConexion();
      //SQL QUERYS
      $query = "SELECT * FROM pacientes";

      $statement = $db->prepare($query);
      $statement->execute();
      //echo "si entra a getPacientes";
      while ($row = $statement->fetch()) {
        $list[] = array(
          "id_paciente" => $row['id_paciente'],
          "nombre_paciente" => $row['nombre_paciente'],
          "apellido_pat_paciente" => $row['apellido_pat_paciente'],
          "apellido_mat_paciente" => $row['apellido_mat_paciente'],
          "genero_paciente" => $row['genero_paciente'],
          "edad_paciente" => $row['edad_paciente'],
          "tel_paciente" => $row['tel_paciente'],
          "alergias_paciente" => $row['alergias_paciente'],
          "antecedentes_paciente" => $row['antecedentes_paciente'],
          "mail_paciente" => $row['mail_paciente'],
          "pass_paciente" => $row['pass_paciente'],
          "id_doctor" => $row['id_doctor']
        );
      }

      return $list;

    } catch (PDOException $e) {
      echo "¡Error en el getPacientes!: " . $e->getMessage() . "<br/>";
    }
  }

  public function addDoctor($data)
  {
    try {
      $nombre_doc = $data['nombre_doc'];
      //$apellido = $data['apellido'];
      $apellido_pat_doc = $data['apellido_pat_doc'];
      $apellido_mat_doc = $data['apellido_mat_doc'];
      $cedula = $data['cedula'];
      $rama_medica = $data['rama_medica'];
      $genero_doc = $data['genero_doc'];
      $mail_doc = $data['mail_doc'];
      $pass_doc = $data['pass_doc'];
      $tel_doc = $data['tel_doc'];
      $direccion_consultorio = $data['direccion_consultorio'];

      $conexion = new Conexion();
      $conexion2 = new Conexion();
      $db = $conexion->getConexion();
      $db2 = $conexion2->getConexion();

      //$query = "INSERT INTO pruebas (nombre_doc,apellido) SELECT :nombre_doc,:apellido WHERE NOT EXISTS (SELECT * FROM pruebas WHERE nombre_doc =:nombre_doc);";
      $query3 = "SELECT DISTINCT * FROM doctores WHERE mail_doc=:mail_doc;";
      //SQL QUERYS
      $query2 = "INSERT INTO doctores (nombre_doc, apellido_pat_doc, apellido_mat_doc, cedula, rama_medica, genero_doc, mail_doc, pass_doc, tel_doc, direccion_consultorio) 
                  SELECT :nombre_doc,:apellido_pat_doc,:apellido_mat_doc,:cedula,:rama_medica,:genero_doc,:mail_doc,:pass_doc,:tel_doc,:direccion_consultorio WHERE NOT EXISTS (SELECT * FROM doctores WHERE mail_doc =:mail_doc)";
      //$query = "INSERT INTO pruebas (nombre_doc,apellido) values (:nombre_doc,:apellido)";
      $statement = $db->prepare($query2);
      $statement->bindParam(":nombre_doc", $nombre_doc);
      //$statement->bindParam(":apellido", $apellido );
      $statement->bindParam(":apellido_pat_doc", $apellido_pat_doc);
      $statement->bindParam(":apellido_mat_doc", $apellido_mat_doc);
      $statement->bindParam(":cedula", $cedula);
      $statement->bindParam(":rama_medica", $rama_medica);
      $statement->bindParam(":genero_doc", $genero_doc);
      $statement->bindParam(":mail_doc", $mail_doc);
      $statement->bindParam(":pass_doc", $pass_doc);
      $statement->bindParam(":tel_doc", $tel_doc);
      $statement->bindParam(":direccion_consultorio", $direccion_consultorio);
      $statement->execute();

      $statement2 = $db2->prepare($query3);
      $statement2->bindParam(":mail_doc", $mail_doc);
      $result2 = $statement2->execute();
      // array(":nombre_doc" => $nombre_doc,":apellido" => $apellido)
      $list = array();

      while ($row = $statement2->fetch()) {
        $list[] = array(
          "nombre_doc" => $row['nombre_doc'],
          "apellido_pat_doc" => $row['apellido_pat_doc'],
          "apellido_mat_doc" => $row['apellido_mat_doc'],
          "cedula" => $row['cedula'],
          "rama_medica" => $row['rama_medica'],
          "genero_doc" => $row['genero_doc'],
          "mail_doc" => $row['mail_doc'],
          "pass_doc" => $row['pass_doc'],
          "tel_doc" => $row['tel_doc'],
          "direccion_consultorio" => $row['direccion_consultorio']
          //"apellido" => $row['apellido']
        );
      } //fin del ciclo while 
      //echo json_encode($list);
      if ($list) {
        return $list[0];
      }
      return "Error al aniadir un Doc nuevo!";

    } catch (PDOException $e) {
      echo "¡Error al añadir!: " . $e->getMessage() . "<br/>";
    }
  }

  public function addPaciente($data)
  {
    try {
      $nombre_paciente = $data['nombre_paciente'];
      $apellido_pat_paciente = $data['apellido_pat_paciente'];
      $apellido_mat_paciente = $data['apellido_mat_paciente'];
      $genero_paciente = $data['genero_paciente'];
      $edad_paciente = $data['edad_paciente'];
      $tel_paciente = $data['tel_paciente'];
      $alergias_paciente = $data['alergias_paciente'];
      $antecedentes_paciente = $data['antecedentes_paciente'];
      $mail_paciente = $data['mail_paciente'];
      $pass_paciente = $data['pass_paciente'];
      $id_doctor = $data['id_doctor'];
      $conexion = new Conexion();
      $db = $conexion->getConexion();
      //SQL QUERYS
      $query = "INSERT INTO pacientes (nombre_paciente, apellido_pat_paciente, apellido_mat_paciente, genero_paciente, edad_paciente, tel_paciente, alergias_paciente, antecedentes_paciente, mail_paciente, pass_paciente, id_doctor) 
                  VALUES (:nombre_paciente,:apellido_pat_paciente,:apellido_mat_paciente,:genero_paciente,
                  :edad_paciente,:tel_paciente,:alergias_paciente,:antecedentes_paciente,:mail_paciente,:pass_paciente,:id_doctor)";
      //$query = "INSERT INTO pruebas (nombre_doc,apellido) values (:nombre_doc,:apellido)";
      $statement = $db->prepare($query);
      $statement->bindParam(":nombre_paciente", $nombre_paciente);
      $statement->bindParam(":apellido_pat_paciente", $apellido_pat_paciente);
      $statement->bindParam(":apellido_mat_paciente", $apellido_mat_paciente);
      $statement->bindParam(":genero_paciente", $genero_paciente);
      $statement->bindParam(":edad_paciente", $edad_paciente);
      $statement->bindParam(":tel_paciente", $tel_paciente);
      $statement->bindParam(":alergias_paciente", $alergias_paciente);
      $statement->bindParam(":antecedentes_paciente", $antecedentes_paciente);
      $statement->bindParam(":mail_paciente", $mail_paciente);
      $statement->bindParam(":pass_paciente", $pass_paciente);
      $statement->bindParam(":id_doctor", $id_doctor);
      $result = $statement->execute();
      if ($result) {
        return "successfully";
      }
      return "Error al añadir un Doc nuevo!";

    } catch (PDOException $e) {
      echo "¡Error al añadir!: " . $e->getMessage() . "<br/>";
    }
  }

  public function deletePaciente($data)
  {
    try {
      $id = $data['id_paciente'];
      $conexion = new Conexion();
      $db = $conexion->getConexion();
      $query = "DELETE FROM pacientes WHERE pacientes.id_paciente=:id_paciente;";
      $statement = $db->prepare($query);
      $statement->bindParam(':id_paciente', $id);

      $result = $statement->execute();
      if ($result) {
        return "Se elimino el paciente correctamente";
      }
      return "Error al remover";

    } catch (PDOException $e) {
      echo "¡Error en remover!: " . $e->getMessage() . "<br>";
    }

  }

  public function deleteDoctor($data)
  {
    try {
      $id = $data['id_doctor'];
      $conexion = new Conexion();
      $db = $conexion->getConexion();
      $query = "DELETE FROM doctores WHERE doctores.id_doctor=:id_doctor;";
      $statement = $db->prepare($query);
      $statement->bindParam(':id_doctor', $id);
      $result = $statement->execute();
      //echo "SI ENTRA A DELETE DOGTOR";
      if ($result) {
        return "Se elimino el Doctor correctamente";
      }
      return "Error al remover";

    } catch (PDOException $e) {
      echo "¡Error en remover!: " . $e->getMessage() . "<br>";
    }

  }

  public function getOneDoctor($data)
  {
    $id = $data['id_doctor'];
    $list = array();
    $conexion = new Conexion();
    $db = $conexion->getConexion();
    $query = "SELECT * FROM doctores WHERE id_doctor=:id_doctor";
    $statement = $db->prepare($query);
    $statement->bindParam(':id_doctor', $id);
    $statement->execute();
    //echo "Si entra a getOneDoctors";
    while ($row = $statement->fetch()) {
      $list[] = array(
        "id_doctor" => $row['id_doctor'],
        "nombre_doc" => $row['nombre_doc'],
        "apellido_pat_doc" => $row['apellido_pat_doc'],
        "apellido_mat_doc" => $row['apellido_mat_doc'],
        "cedula" => $row['cedula'],
        "rama_medica" => $row['rama_medica'],
        "genero_doc" => $row['genero_doc'],
        "mail_doc" => $row['mail_doc'],
        "pass_doc" => $row['pass_doc'],
        "tel_doc" => $row['tel_doc'],
        "direccion_consultorio" => $row['direccion_consultorio']
      );
    } //fin del ciclo while 

    return $list[0];
  }

  public function getOnePaciente($data)
  {
    $id = $data['id_paciente'];
    $list = array();
    $conexion = new Conexion();
    $db = $conexion->getConexion();
    $query = "SELECT * FROM pacientes WHERE id_paciente=:id_paciente";
    $statement = $db->prepare($query);
    //echo "Entra getOne Paciente<br>";
    $statement->bindParam(':id_paciente', $id);
    $statement->execute();
    while ($row = $statement->fetch()) {
      $list[] = array(
        "id_paciente" => $row['id_paciente'],
        "nombre_paciente" => $row['nombre_paciente'],
        "apellido_pat_paciente" => $row['apellido_pat_paciente'],
        "apellido_mat_paciente" => $row['apellido_mat_paciente'],
        "genero_paciente" => $row['genero_paciente'],
        "edad_paciente" => $row['edad_paciente'],
        "tel_paciente" => $row['tel_paciente'],
        "alergias_paciente" => $row['alergias_paciente'],
        "antecedentes_paciente" => $row['antecedentes_paciente'],
        "mail_paciente" => $row['mail_paciente'],
        "pass_paciente" => $row['pass_paciente'],
        "id_doctor" => $row['id_doctor']
      );
    } //fin del ciclo while 

    return $list[0];
  }

  public function updateDoctor($data)
  {
    try {
      $id_doctor = $data['id_doctor'];
      $mail_doc = $data['mail_doc'];
      $pass_doc = $data['pass_doc'];
      $tel_doc = $data['tel_doc'];
      $direccion_consultorio = $data['direccion_consultorio'];
      $conexion = new Conexion();
      $db = $conexion->getConexion();
      $query = "UPDATE doctores SET mail_doc=:mail_doc, pass_doc=:pass_doc, tel_doc=:tel_doc, direccion_consultorio=:direccion_consultorio WHERE id_doctor=:id_doctor";
      $statement = $db->prepare($query);
      $statement->bindParam(":id_doctor", $id_doctor);
      $statement->bindParam(":mail_doc", $mail_doc);
      $statement->bindParam(":pass_doc", $pass_doc);
      $statement->bindParam(":tel_doc", $tel_doc);
      $statement->bindParam(":direccion_consultorio", $direccion_consultorio);
      $result = $statement->execute();
      if ($result) {
        return "Doctor actualizado";
      }

      return "Error al actualizar Doc!";

    } catch (PDOException $e) {
      echo "¡Error en actualizar!: " . $e->getMessage() . "<br>";
    }
  }

  public function updatePaciente($data)
  {
    try { //`edad_paciente` `tel_paciente` `alergias_paciente` `antecedentes_paciente` `mail_paciente` `pass_paciente`
      $id = $data['id_paciente'];
      $edad_paciente = $data['edad_paciente'];
      $tel_paciente = $data['tel_paciente'];
      $alergias_paciente = $data['alergias_paciente'];
      $antecedentes_paciente = $data['antecedentes_paciente'];
      $mail_paciente = $data['mail_paciente'];
      $pass_paciente = $data['pass_paciente'];
      $conexion = new Conexion();
      $db = $conexion->getConexion();
      $query = "UPDATE pacientes SET edad_paciente=:edad_paciente, tel_paciente=:tel_paciente, alergias_paciente=:alergias_paciente, antecedentes_paciente=:antecedentes_paciente, mail_paciente=:mail_paciente, pass_paciente=:pass_paciente WHERE id_paciente=:id_paciente";
      $statement = $db->prepare($query);
      $statement->bindParam(":tel_paciente", $tel_paciente);
      $statement->bindParam(":id_paciente", $id);
      $statement->bindParam(":antecedentes_paciente", $antecedentes_paciente);
      $statement->bindParam(":mail_paciente", $mail_paciente);
      $statement->bindParam(":pass_paciente", $pass_paciente);
      $statement->bindParam(":alergias_paciente", $alergias_paciente);
      $statement->bindParam(":edad_paciente", $edad_paciente);
      $result = $statement->execute();
      if ($result) {
        return "Paciente Actualizado";
      }

      return "Error al actualizar Doc!";

    } catch (PDOException $e) {
      echo "¡Error en actualizar!: " . $e->getMessage() . "<br>";
    }
  }

}

?>