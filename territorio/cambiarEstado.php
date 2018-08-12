<?php
 
      $id = $_POST['id'];
      $estado = $_POST['estado'];
      $tipo = $_POST['tipo'];
       
      echo updateTelefono($id, $estado, $tipo);
      /**
		Estados:
		0 Final de la lista
		1 Predicacion por cartas
		2 Inactivo o borrado lógico
	  **/
      function updateTelefono($id, $estado, $tipo) {
          $con = new mysqli('mysql.hostinger.com.ar','u568085940_belg', 'Jeremias1023', 'u568085940_telef');
		  if($estado==0||$estado==2||$estado==6){
			$sql = "UPDATE telefonos SET estado = 0, fechaMod=CURDATE() where id=$id";
		  }else if($estado==1||$estado==3||$estado==5){
			$sql = "UPDATE telefonos SET estado = 1, fechaMod=CURDATE() where id=$id";
		  }else{
			$sql = "UPDATE telefonos SET estado = 2, fechaMod=CURDATE() where id=$id";
		  }		  
          mysqli_query($con, $sql);
          $con->close();
		  $formData = ['exito' => 'S'];
		  return json_encode($formData);	
      }