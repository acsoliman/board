<?php

class UserController extends AppController
{

	public function login()
	{ 
        $user = new User;
        $invalid = FALSE;
        $username = Param::get('username');
        $password = Param::get('password');
        $login = $user->login($username, $password);
        $page = Param::get('page_next', 'login');    
        
        switch ($page) {
            case 'login':
                break;

            case 'login_success':
                if (!$login){
                        $page = 'login';
                        $invalid = TRUE;
                }else{
                    $_SESSION['username'] = $username; 
                                }
                break;

            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }
		$this->set(get_defined_vars());
		$this->render($page);
	}

	public function register()
	{
        $is_error = FALSE;
        $username = Param::get('username');
		$password = Param::get('password');
		$repassword = Param::get('repassword');
		
        if ($password != $repassword) {
            $is_error = TRUE;
            $error_message = "Password did not match!";
        }
        
        $useraccount = new User;
		$user = new User;
        $user_exist = $user->isUserExisting($username, $password);
		$page = Param::get('page_next', 'register');

		switch ($page) {
		
		case 'register':
		    break;
		
		case 'register_end':
			
		$user->username = $username;
		$user->password = $password;
		$user->repassword = $repassword;
			try{
			if(!$user_exist){
			    $user_id=$user->register($user);   
                $_SESSION['username'] = $username;
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