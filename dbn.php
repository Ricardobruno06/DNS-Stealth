<?php

function dbConnect()
{
	$host = "localhost";
	$port = "5432";
	$dbname = "ims";
	$user = "postgres";
	$pass = "1234";

	$dns = "host = " .$host ." port = " .$port . " dbname = $dbname" ." user =" .$user ." password = " .$pass;
	return pg_connect($dns);
}
   
function getJSONFromDB($sql)
{
	$conn = dbConnect();
	// die($sql);
	$result = pg_query($conn, $sql);
	$arr = array();
	echo "<pre>" .print_r($result, true) .PHP_EOL; die;
	
	while ($row = pg_fetch_assoc($result)) {
		$arr[] = $row;
	}

	echo "ok";

	return json_encode($arr);
}

function deleteFromDB($sql)
{
	$conn = dbConnect();
	// die($sql);
	pg_query($conn, $sql);
	return true;
}
function insertIntoDB($sql)
{
	$conn = dbConnect();
	// die($sql);
	pg_query($conn, $sql);
	return true;
}
function updateIntoDB($sql)
{
	$conn = dbConnect();
	// die($sql);
	pg_query($conn, $sql);
	return true;
}

function emailExiste($sql)
{
	//global $db;
	//$tabela = "`usuarios`";
	//$sql = "SELECT * FROM " .$tabela ." WHERE `email` = '" .$email ."'";
	#echo $sql; die();
	$host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = ims";
   $credentials = "user = postgres password=1234";

   $conn = pg_connect( "$host $port $dbname $credentials");

	$res = pg_query($conn, $sql);

	if(pg_num_rows($res)>0){
		return true;
	}
        
    else {
        return false;
    }

}