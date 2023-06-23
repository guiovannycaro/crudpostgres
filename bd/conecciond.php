<?php

$user = "postgres";
$password = "123456";
$dbname = "crud2";
$port = "5432";
$host = "localhost";

$dbconn = pg_connect("host=localhost dbname=ejercicio5 user=postgres password=Admin123")
    or die('No se ha podido conectar: ' . pg_last_error());


if(!$dbconn){
	echo "coneccion no ok";
	}else{
		echo "coneccion  ok";
		
		}
?>