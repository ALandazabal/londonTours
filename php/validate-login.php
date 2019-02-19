<?php
	
	session_start();
	require('../lib/password.php');
	include('connection.php');

	function filtrate($datos){
    	$datos = trim($datos); 
    	$datos = stripslashes($datos);
    	return $datos;
	}
	function validate_email($email): bool{
        return (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) ? False : True;
    }

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = filtrate($_POST['email']);
		$pass = filtrate($_POST['pass']);
		$emailval = validate_email($username);
		$errors = [];
		$error2 = [];
 

		if(empty($username)){
        	$errors[] = 'The email is required';
        }

		if(!filter_var($username, FILTER_VALIDATE_EMAIL)){
        	$errors[] = "The email is not validate";
    	}

    	if(empty($pass)){
    		$errors[] = "The password is required at leats 8 characters"; 
    	}

    	if(empty($errors)){
    		$connection = connect();
    		$query = "SELECT id,password,fk_user_type FROM t_user where email ='".$username."'";
    		$result = mysqli_query( $connection, $query ) or die("Something went wrong in the query to the database");
    		if($result->num_rows > 0){
    			$hash = $result->fetch_array();
    			echo $username.$hash['password'];
    			if(password_verify($pass, $hash['password'])){
    				$_SESSION['currentuser'] = $hash['id'];
                    if($hash['fk_user_type']==1){
                        header('Location:../admin/admin.php');
                    }else{
                        header('Location:../user/user.php');
                    }
    				disconnect($connection);
    			}else{
    				$error2[] = "Password incorrectly";
    				echo "clave validano";
    			}
    		}else{
    			$error2[] = "User is not registered";
    		}
    		disconnect($connection);
    	}
	}
 ?>