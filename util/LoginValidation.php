<?php

class LoginValidation
{

	/**
	 * Valida o Login.
	 * 
	 * Faz uma série de verificações nas variáveis $username e $password.
	 * Ao final retorna true, caso ambas as variáveis estejam de acordo
	 * com as especificações, ou falso caso contrário.
	 * 
	 * @param String $username
	 * @param String $password
	 * @return bool
	 */
	public static function validation(String $username, String $password)
	{
		$res = true;

		// die($username ."<br>" .$password);

		$res = self::validateUsername($username);
		$res = self::validatePassword($password);

		$_SESSION['error_msg'] = ($res) ? "" : "ID de Login ou Senha incorretos.";

		return $res;
	}

	public static function validateUsername(String $username)
	{
		return preg_match("/^[1-9]+([0-9]*)$/", $username) ? true : false;
	}

	public static function validatePassword(String $password)
	{
		return preg_match("/^[0-9a-zA-Z]{6,}$/", $password);
	}
}