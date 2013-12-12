
<?php
function validate_between($check, $min, $max)
{
	$n = mb_strlen($check);
	return $min <= $n && $n <= $max;
}

function isSessionActive()
{
        if(!isset($_SESSION['username'])){
			header("Location: /user/login");          			
        }
}        
   