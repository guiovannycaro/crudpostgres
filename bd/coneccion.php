<?Php

class conectarpg
{

/////////// VARIABLES DE CONECCION
	var $dbtype = "postgres";
var $user = "postgres";
var $password = "123456";
var $dbname = "crud2";
var $port = "5432";
var $host = "localhost";

var $response;
	var $link;
	var $conn;


function connect(){
		
		
$con = pg_connect("host=localhost dbname=crud2 user=postgres password=123456");
		
		if(!$con)	{
			
			echo "<br>Fall la conexion !!";
	
		}
		else	{
			
			//echo "<br>Conexion exitosa";
			return $con;
		}
}

function query($sql){
	
	return pg_query($con,$sql);
	}
	
	function numrows($res)	{
		return pg_num_rows($res);
	}
	
   	function close()	{
		if ($this->dbtype == "postgres" ) {
            //echo "<br>Cerrando la conexion";
			//echo $this->link . "conn " . $this->conn . "<br>";
            //mssql_close($this->link);
		}
	}

   		

}
?>
