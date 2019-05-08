<?php
   
function getJSONFromDB($sql){
   $host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = ims";
   $credentials = "user = postgres password=1234";

   $conn = pg_connect( "$host $port $dbname $credentials");
	//echo $sql;
	$result = pg_query($conn, $sql)or die(pg_result_error($$conn));
	$arr=array();
	//print_r($result);
	while($row = pg_fetch_assoc($result)) {
		$arr[]=$row;
		
	}
	return json_encode($arr);
}

function deleteFromDB($sql){
   $host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = ims";
   $credentials = "user = postgres password=1234";

   $conn = pg_connect( "$host $port $dbname $credentials"  );
	//echo $sql;
	$result = pg_query($conn, $sql)or die(pg_result_error($$conn));
	return true;
}
function insertIntoDB($sql){
	$host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = ims";
   $credentials = "user = postgres password=1234";

   $conn = pg_connect( "$host $port $dbname $credentials");
	//echo $sql;
	$result = pg_query($conn, $sql)or die(pg_result_error($$conn));	
}
function updateIntoDB($sql)
{
	$host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = ims";
   $credentials = "user = postgres password=1234";

   $conn = pg_connect( "$host $port $dbname $credentials"  );
	//echo $sql;
	$result = pg_query($conn, $sql)or die(pg_result_error($$conn));
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

?>