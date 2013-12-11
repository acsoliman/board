<?php

class UserController extends AppController
{

	public function login()
	{
	
		$user = new User;
	
		$page = Param::get('page_next', 'login_success');
		
		switch ($page) {
		
		case 'login':
		break;
		
		case 'login_success':
			$user->username = Param::get('username');
			$user->password = Param::get('password');
	
			if ($user->login())
			{
				$page='login_success';
			}
			else 
			{
				$page='login';
			}
		break;
		}
		$this->set(get_defined_vars());
		$this->render($page);
	}

	public function register()
	{

		$useraccount = new User;
		$user = new User;
		$username = Param::get('username');
		$password = Param::get('password');
		$repassword = Param::get('repassword');
		$page = Param::get('page_next', 'register');

		switch ($page) {
		
		case 'register':
		    break;
		
		case 'register_end':
			
		$user->username = $username;
		$user->password = $password;
		$user->repassword = $repassword;
			try{
			if($user->repassword == $user->password){
			    $user->register();   
				$page='register_end';
			}else{
				$page='register';
			}
			
			}catch(ValidationException $e){
			$page = 'register';
			}
			break;
		default:
        throw new NotFoundException("{$page} is not found");		
			break;
		}

		$this->set(get_defined_vars());
        $this->render($page);
	}

	public function logout()
	{
		//session_destroy();
	}
}