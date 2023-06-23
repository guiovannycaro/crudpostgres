<?php
include("bd/coneccion.php");

    
	       $id = $_POST['id'];
        $lineas = array();
		$cons = new conectarpg;
      
		$sql = "Delete from alumnos  where id = '".$id."'";
		$res = pg_query(conectarpg::connect(),$sql);
		//$res = pg_query(conectarpg::connect(),$sql);
		echo $sql;

?>
