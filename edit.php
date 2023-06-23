<?php
include("bd/coneccion.php");

       $nombre = $_POST['nombre'];
	      $id = $_POST['id'];
        $lineas = array();
		$cons = new conectarpg;
      
		$sql = "update alumnos set name ='".$nombre."' where id = '".$id."'";
		$res = pg_query(conectarpg::connect(),$sql);
		//$res = pg_query(conectarpg::connect(),$sql);
	
		
			if($res<=0){
        echo "no se puedo insertar el registro";
	}else{

	echo "se inserto el registro";	
	}

?>
