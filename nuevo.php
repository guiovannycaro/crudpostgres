<?php
include("bd/coneccion.php");

       $name = $_POST['nombre'];
        $lineas = array();
		$cons = new conectarpg;
      
		$sql = "insert into alumnos (name) values('".$name."')";
		$res = pg_query(conectarpg::connect(),$sql);
		//$res = pg_query(conectarpg::connect(),$sql);
		echo $sql;

?>
