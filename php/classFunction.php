<?php

class ClassFunction
{
	
	function __construct()
	{
		# code...
	}

	function userEdit($idUser){

        setcookie("idUser",$idUser,time()+(86400),"/");   
        echo "function";     
        
        return true;
    }

    function userUpdt($email, $address, $phone, $city, $name, $postcode, $password, $passwordC, $idUserU){
    	include('connection.php');
    	require('../lib/password.php');
    	$connection = connect();

    	$pass = $passwordC;
    	if($password != ''){
    		$pass = password_hash($password, PASSWORD_DEFAULT);
    	}

       $sql = "UPDATE t_user SET email = '$email', address = '$address', phone = '$phone', city = '$city', name = '$name', postcode = '$postcode', password = '$pass' WHERE id = '$idUserU'";
       
       	$rc = mysqli_query($connection, $sql);

        disconnect($connection);
        if($rc){
            return true;
        }

        return false;
        
    }

    function userDel($idUserD){

    	include('connection.php');
    	require('../lib/password.php');
    	$connection = connect();
        
        $sqlca = "DELETE FROM t_user WHERE id = '$idUserD'";
        $rcca = mysqli_query($connection, $sqlca);

        disconnect($connection);

        if($rcca){

            return true; 
        }

        return false;
    }
}

?>