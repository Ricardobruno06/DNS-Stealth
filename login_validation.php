<?php

session_start();

require("dbn.php");
require("util/LoginValidation.php");

$_SESSION['admin'] = "false";
$_SESSION['mgr'] = "false";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST['username'];
	$pass = $_POST['password'];

	if (! LoginValidation::validation($username, $pass)) {
		redirect("index");
	}

	$sql = "SELECT * FROM users where user_id = '$username' and password = '$pass'";
	$result = getJSONFromDB($sql);
	$result = json_decode($result, true);

	echo "<pre>" .var_export($result, true) .PHP_EOL;
	die();

	# Essa verificação já foi feita pelo próprio Postgres
	/*if (isset($result[0]["user_id"]) && $result[0]["user_id"] == $username && $result[0]["password"] == $pass) {		
	}
	else
	{
		header("Location: login.php");
	}*/


	# Verifica o tipo de usuário e redireciona para a área adequada

	if ($result[0]["role"] == "admin" && $result[0]["status"] == "active") {
		$_SESSION['admin'] = "true";
		$_SESSION['adminid'] = $username;
		redirect("adm");
	}
	elseif ($result[0]["role"] == "mgr" && $result[0]["status"] == "active") {
		$_SESSION['mgr'] = "true";
		$_SESSION['manager_id'] = $result[0]["user_id"];
		$_SESSION['manager_pass'] = $result[0]["password"];
		redirect("manage_customers_man");
	}
	elseif ($result[0]["role"] == "cus" && $result[0]["status"] == "active") {
		$_SESSION['mgr'] = "true";
		$_SESSION['manager_id'] = $result[0]["user_id"];
		$_SESSION['manager_pass'] = $result[0]["password"];
		redirect("cus.php");
	}
}

redirect("index");


# Funções

/**
 * Redireciona para a URL especificada.
 * 
 * Como toda página tem a extensão .php, há uma pequena verificação
 * para checar se a URL passada já possui a extensão. Caso não possua,
 * ela é adicionada e então é feito o redirecionamento.
 * 
 * @param String $url - A URL para onde será redirecionado.
 * @return no
 */
function redirect(String $url)
{
	$url .= (strpos(".php", $url) === false) ? ".php" : "";
	header("Location: " .$url);
	exit();
}