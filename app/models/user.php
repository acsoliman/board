<?php

class User extends AppModel
{

	public $page;
	public $repassword;

	public function login()
	{
		$db = DB::conn();
		$pass = $this->password;
		$user = $this->username;
		$row = $db->row('SELECT 1 FROM user WHERE username = ? AND password = ?',
		array($user, $pass));
		
		return $row ? true : false;
	}
	
	public function register()
	{		
	
       $db = DB::conn();
       $pass = $this->password;
       $db->query('INSERT INTO user SET username = ?, password = ?',
                    array($this->username, $pass));
	}
	
	public function samepassword()
	{
		if($this->password === $this->repassword)
		{
			return true;
		}
			return false;
	}

}