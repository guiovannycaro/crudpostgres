<?php
include("bd/coneccion.php");

    
	       $id = $_POST['id'];
		   $datos = array();
        $lineas = array();
		$cons = new conectarpg;
      
		$sql = "select * from alumnos  where id = ".$id."";
		
		
			$res = pg_query(conectarpg::connect(), $sql);
			while ($reg = pg_fetch_array($res, null, PGSQL_ASSOC)) {

		
    $datos[] = $row;
}

echo $sql;
	//$data = pg_fetch_array($sql);

	
		

?>
