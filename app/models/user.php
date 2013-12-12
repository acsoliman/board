<?php

class User extends AppModel
{

	public $page;
	public $repassword;

	public $validation = array(
		'username' => array(
		'length' => array(
		'validate_between', 5, 25,),),

		'password' => array(
		'length' => array(
		'validate_between', 5, 25,),),
	);
	
	public function login($username, $password)
	{        
        $db = DB::conn();
        $login = $db->row(
            "SELECT 1 FROM user WHERE username = ? AND password = ?",
            array($username,md5($password))
        );
        return  $login;
        
	}
	
    public static function isUserExisting($username, $password)
    {
        $db = DB::conn();
        $row = $db->row(
            'SELECT 1 FROM user WHERE username = ?',
            array($username)
        );

        //if account is already existing in the DB
        return $row? TRUE : FALSE;
    }  
    
    public function register(User $user)
    {
        if (!$user->validate() OR $user->password != $user->repassword) {
            throw new ValidationException('invalid account');
        }
    
        $db = DB::conn();
        $params = array(
            "username"=>$user->username,
            "password"=>md5($user->password)
        );

        $db->insert("user", $params);
        return $db->lastInsertId();
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