<?php
ini_set("display_errors",1);
include '../Classes/PHPExcel/IOFactory.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    //datos del arhivo 
    $file = $_FILES['archivo']['name'];
    $inputFileName="../files/".$file;
    
    //comprobamos si existe un directorio para subir el archivo
    //si no es así, lo creamos
    if(!is_dir("../files/")){ 
        mkdir("../files/", 0777);
    }    
     
    //comprobamos si el archivo ha subido
    if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"../files/".$file))
    {
        sleep(3);//retrasamos la petición 3 segundos
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) 
            . '": ' . $e->getMessage());
        }

        //  Se obtienen las dimenciones de la hoja de excel
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $con = new mysqli('mysql.hostinger.com.ar','u568085940_belg', 'Jeremias1023', 'u568085940_telef');
        $queryTerritorio="INSERT INTO telefonos (congregacion, telefono, nombre, calle, numero, piso, departamento, localidad, partido, provincia, cod_postal, estado) values ";
        $congregacion="";
		$telefono="";
        $nombre="";
        $calle="";
        $numero="";
		$piso="";
		$departamento="";
		$localidad="";
		$partido="";
		$provincia="";
		$cod_postal ="";
        //Aqui se lee cada fila del excel sin los encabezados
        for ($row = 2; $row <= $highestRow; $row++) { 
            //agregar el valor de toda una fila en un arreglo
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, 
            NULL, TRUE, FALSE);
            //Aqui se lee cada valor de la celda de la fila correspondiente
            foreach($rowData[0] as $k=>$valorCelda){
                switch ($k) {
                case 0:
                    $congregacion = $valorCelda;
                    break;
                case 1:
                    $telefono = $valorCelda;
                    break;
                case 2:
                    $nombre = $valorCelda;
                    break;
                case 3:
                    $calle = $valorCelda;
                    break;
				case 4:
                    $numero = $valorCelda;
                    break;
				case 5:
                    $piso = $valorCelda;
                    break;
				case 6:
                    $departamento = $valorCelda;
                    break;
				case 7:
                    $localidad = $valorCelda;
                    break;
				case 8:
                    $partido = $valorCelda;
                    break;
                case 9:
                    $provincia = $valorCelda;
                    break;
				case 10:
                    $cod_postal = $valorCelda;
                    break;
                }
            }
                $queryTerritorio=$queryTerritorio."('".$congregacion."', '".$telefono."', '".$nombre."', '".$calle."', '".$numero."', '".$piso."', '".$departamento."', '".$localidad."', '".$partido."', '".$provincia."', '".$cod_postal."', -1),";
            
        }
        $queryTerritorio = substr ($queryTerritorio, 0, strlen($queryTerritorio) - 1);
        $stm = $con->prepare($queryTerritorio);
        $stm->execute();
        echo 'La carga de Datos se realizo de manera exitosa';
		//echo $queryTerritorio;
    }
   
       
