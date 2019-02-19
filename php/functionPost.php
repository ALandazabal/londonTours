<?php

include_once('classFunction.php');
 session_start();

if($_POST){
	if(isset($_POST["idUser"])) {

	    $class = new classFunction();
	    $idUser = $_POST["idUser"];
	    echo "post";

	    if($class->userEdit($idUser)){
	      //echo 'ok';
	    }else{
	      echo 'nok';
	    }
	}

	if(isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["phone"]) && isset($_POST["city"])){
    
	    $class = new classFunction();

	    $email = $_POST["email"];
	    $address = $_POST["address"];    
	    $phone = $_POST["phone"];
	    $city = $_POST["city"];    
	    $name = $_POST["name"];
	    $postcode = $_POST["postcode"];
	    $password = $_POST["password"];
	    $passwordC = $_POST["passwordC"];
	    $idUserU = $_POST["idUserU"];

	    $bool = $class->userUpdt($email, $address, $phone, $city, $name, $postcode, $password, $passwordC, $idUserU);
	    
	    if($bool){
	      echo 'ok';
	    }else{
	      echo 'nok';
	    }
	}

	if(isset($_POST["idUserD"])){
    
	    $class = new classFunction();
	    $idUserD = $_POST["idUserD"];
	    if($class->userDel($idUserD)){
	      echo 'ok';
	    }else{
	      echo 'nok';
	    }
	}
}

?>