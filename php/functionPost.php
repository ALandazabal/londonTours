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

	//Bookings
	if(isset($_POST["idBook"])) {

	    $class = new classFunction();
	    $idBook = $_POST["idBook"];

	    if($class->bookEdit($idBook)){
	      //echo 'ok';
	    }else{
	      echo 'nok';
	    }
	}

	if(isset($_POST["tickets"]) && isset($_POST["state"]) && isset($_POST["idBookU"])){
    
	    $class = new classFunction();

	    $tickets = $_POST["tickets"];
	    $state = $_POST["state"];    
	    $idBookU = $_POST["idBookU"];

	    $bool = $class->bookUpdt($tickets, $state, $idBookU);
	    
	    if($bool){
	      echo 'ok';
	    }else{
	      echo 'nok';
	    }
	}

	if(isset($_POST["idBookC"])){
    
	    $class = new classFunction();
 
	    $idBookC = $_POST["idBookC"];

	    $bool = $class->bookCancel($idBookC);
	    
	    if($bool){
	      echo 'ok';
	    }else{
	      echo 'nok';
	    }
	}

	if(isset($_POST["idBookD"])){
    
	    $class = new classFunction();
	    $idBookD = $_POST["idBookD"];
	    if($class->bookDel($idBookD)){
	      echo 'ok';
	    }else{
	      echo 'nok';
	    }
	}

	//Commentary
	if(isset($_POST["nameMsg"]) && isset($_POST["emailMsg"]) && isset($_POST["textMsg"])){
    
	    $class = new classFunction();

	    $nameMsg = $_POST["nameMsg"];
	    $emailMsg = $_POST["emailMsg"];    
	    $textMsg = $_POST["textMsg"];

	    $bool = $class->ctryAdd($nameMsg, $emailMsg, $textMsg);
	    
	    if($bool){
	      echo 'ok';
	    }else{
	      echo 'nok';
	    }
	}
	
	if(isset($_POST["idCtryD"])){
    
	    $class = new classFunction();
	    $idCtryD = $_POST["idCtryD"];
	    if($class->ctryDel($idCtryD)){
	      echo 'ok';
	    }else{
	      echo 'nok';
	    }
	}
}

?>