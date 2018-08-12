<?php
      $congregacion = $_POST['congre'];
      $nombre = $_POST['nameApe'];
	  $tipo = $_POST['tipo'];
       
      echo buscar($congregacion, $nombre, $tipo);
      
	  function existe($congregacion, $nombre){
			$con = new mysqli('mysql.hostinger.com.ar','u568085940_belg', 'Jeremias1023', 'u568085940_telef');
            $sql = "SELECT id, nombre FROM publicadores where nombre like '".$nombre."%' and congregacion = ".$congregacion;
            
            $stm = $con->prepare($sql);
             
            $stm->execute();
            $stm->store_result();
             
            if( $stm->num_rows == 0){
				$con->close();
				return false;
			}
			$con->close();
			return true;
	  }
       
      function buscar($a,$b,$c) {
			
			if(!existe($a,$b)){
				$formData = [
							'id' => '',
							'numTele' => '',
							'nomAmo' => '',
							'dirAmo' => '',
							'piso' => '',
							'dpto' => '',
							'existe' => 'E'
						];
				return json_encode($formData);		
			}
	  
            $con = new mysqli('mysql.hostinger.com.ar','u568085940_belg', 'Jeremias1023', 'u568085940_telef');
            $sql = "SELECT id, telefono, nombre, calle, piso, departamento, numero FROM telefonos where estado = -1 and congregacion=1 ORDER BY RAND()";
			if($c=="cartas"){
				$sql = "SELECT id, telefono, nombre, calle, piso, departamento, numero FROM telefonos". 
				   " where id=(select min(id) from telefonos where estado = 1 and congregacion=".$a.
				   ") and congregacion=".$a." and estado=1 ORDER BY RAND()";
			}	   
            
            $stm = $con->prepare($sql);
             
            $stm->execute();
            $stm->store_result();
             
            if( $stm->num_rows == 0){
                  $formData = [
							'id' => '',
							'numTele' => '',
							'nomAmo' => '',
							'dirAmo' => '',
							'piso' => '',
							'dpto' => '',
							'existe' => 'N'
						];
            }else{
					$stm->bind_result($id, $numTele, $nomAmo, $dirAmo, $piso, $dpto, $numero);
					$stm->fetch();
					$formData = [
								'id' => $id,
								'numTele' => $numTele,
								'nomAmo' => $nomAmo,
								'dirAmo' => $dirAmo." ".$numero,
								'piso' => $piso,
								'dpto' => $dpto,
								'existe' => 'Y'
							];
            }	
			$con->close();
			return json_encode($formData);
      }