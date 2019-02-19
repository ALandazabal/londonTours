<?php 
	session_start();
	require('../lib/password.php');
	include('connection.php');

	 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	 	function filtrate($datos){
    		$datos = trim($datos); 
    		$datos = stripslashes($datos);
    		return $datos;
		}
	 	function validate_email($email): bool{
           return (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) ? False : True;
        }

	 	$errors = [];
	 	$name =  filtrate($_POST['name']);
	 	$email =  filtrate($_POST['email']);
	 	$phone=  filtrate($_POST['phone']);
	 	$pass1=  filtrate($_POST['pass1']);
	 	$pass2=  filtrate($_POST['pass2']);
	 	$city=  filtrate($_POST['city']);
	 	$postcode = filtrate($_POST['postcode']);
	 	$address= filtrate($_POST['address']);

	 	if ( empty($name) || strlen($name)<5) {
	 		echo $name; 
            $errors[] = 'the name is required and at least 5 characters';
        }

        if(empty($email)){
        	$errors[] = 'The email is required';
        }

        if (!validate_email($email)) {
            $errors[] = 'The email is not validate.';
        }

        if(empty($city)){
        	$errors[] = 'The City is required';
        }
         if(empty($postcode)){
        	$errors[] = 'The Pstcode is required';
        }

        if(empty($address)){
        	$errors[] = 'The Address is required';
        }

        if(empty($phone)){
        	$errors[] = 'The Phone Number is required';
        }

	 	if(empty($pass1) || strlen($pass1<8)){
	 		$errors[] = "The password is required at leats 8 characters"; 	
	 	}

	 	if($pass1 != $pass2){
	 		$errors[] = "Passwords do not match. try again";
	 	}

	 	if(isset($errors)){
		 	foreach ($errors as $value) {
		 		echo $value;
		 		# code...
		 	}
	 	}
	 	if(empty($errors)){
	 		$connection = connect();
			$query = "SELECT * FROM t_user where email = '".$email."'";
			$query2 = "SELECT COUNT(*) total FROM t_user";
			$result = mysqli_query( $connection, $query ) or die("Something went wrong in the query to the database");
			$result2 = mysqli_query( $connection, $query2 ) or die("Something went wrong in the query to the database");
			
			$lastId = (array)$result2->fetch_row();
			$id = $lastId[0];
			$id++;
			$user_type = 2;
			$passwordHash = password_hash($pass1, PASSWORD_DEFAULT);
			if($result->num_rows == 0){
				$queryInsert = "INSERT INTO t_user (id, email, address, phone, name, city, postcode, fk_user_type, password) VALUES ('".$id."','".$email."','".$address."','".$phone."','".$name."','".$city."','".$postcode."','".$user_type."','".$passwordHash."');";
				$insert_result =  mysqli_query( $connection, $queryInsert );
				if ($insert_result) {
					echo "registro";
					$_SESSION['currentuser'] = $id;
				header('Location:../user/user.php');
					# code...
				}else{
					echo "error al insertar".mysqli_error($connection);
					var_dump($insert_result);
				}
				echo $name.$email.$pass1.$phone.$city.$address;
				
			}else{
				echo "Email is register already";
			}
			disconnect($connection);
	 		
	 	}
	 }

	
 ?>