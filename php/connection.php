<?php 
	function connect(){
		$user = "root";
		$pass = "";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
		$server = "localhost";
		$database = "mysql";
		$connection = mysqli_connect( $server, $user, $pass,$database ) or die ("Unable to connect to the Database server");
		mysqli_set_charset($connection,"utf8");
		return $connection;
	}

	function disconnect($connection){
		$close = mysqli_close($connection);
	    /*if($close){
	        echo 'La desconexion de la base de datos se ha hecho satisfactoriamente';
	    }else{
	       echo 'Ha sucedido un error inexperado en la desconexion de la base de datos';
	   }   

	    return $close;*/
	}
 ?>