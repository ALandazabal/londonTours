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

    //Bookings
    function bookEdit($idBook){

        setcookie("idBook",$idBook,time()+(86400),"/");       
        
        return true;
    }

    function bookUpdt($tickets, $state, $date, $user, $tour, $idBookU){
    	include('connection.php');
    	$connection = connect();

       $sql = "UPDATE t_user_tour SET nTickets = '$tickets', state = '$state', date = '$date', fk_user = '$user', fk_tour = '$tour' WHERE id = '$idBookU'";
       
       	$rc = mysqli_query($connection, $sql);

        disconnect($connection);
        if($rc){
            return true;
        }

        return false;
        
    }

    function bookCancel($idBookC){
        include('connection.php');
        $connection = connect();

       $sql = "UPDATE t_user_tour SET state = 0 WHERE id = '$idBookC'";
       
        $rc = mysqli_query($connection, $sql);

        disconnect($connection);
        if($rc){
            return true;
        }

        return false;
        
    }

    function bookDel($idBookD){

    	include('connection.php');
    	$connection = connect();
        
        $sqlca = "DELETE FROM t_user_tour WHERE id = '$idBookD'";
        $rcca = mysqli_query($connection, $sqlca);

        disconnect($connection);

        if($rcca){

            return true; 
        }

        return false;
    }

    //Commentaries
    function ctryAdd($nameMsg, $emailMsg, $textMsg){

        include('connection.php');
        $connection = connect();

        /*$query2 = "SELECT COUNT(*) total FROM t_comentary";*/
        $query2 = "SELECT * FROM t_comentary ORDER BY id DESC LIMIT 1";
        $result2 = mysqli_query( $connection, $query2 ) or die("Something went wrong in the query to the database");
        $lastId = mysqli_fetch_array($result2);
        $id = $lastId['id'];
        //echo $id;
        if($id == ''){
            $id = 0;
        }
        $id++;
       
        $sql1 = "INSERT INTO t_comentary VALUES('$id', current_date, '$nameMsg','$emailMsg','$textMsg')";
        $rc1 = mysqli_query($connection, $sql1);
        disconnect($connection);
        if($rc1){
            return true;
        }
        
        return false;
    }

    function ctryDel($idCtryD){

    	include('connection.php');
    	$connection = connect();
        
        $sqlca = "DELETE FROM t_comentary WHERE id = '$idCtryD'";
        $rcca = mysqli_query($connection, $sqlca);

        disconnect($connection);

        if($rcca){

            return true; 
        }

        return false;
    }

    //Tours
    function tourCreate($date, $name, $image, $price, $itinerary, $duration, $description){

        include('connection.php');
        $connection = connect();

        $query2 = "SELECT * FROM t_tour ORDER BY id DESC LIMIT 1";
        $result2 = mysqli_query( $connection, $query2 ) or die("Something went wrong in the query to the database");
        $lastId = mysqli_fetch_array($result2);
        $id = $lastId['id'];

        if($id == ''){
            $id = 0;
        }
        $id++;
       
        $sql1 = "INSERT INTO t_tour VALUES('$id', '$name','$image', '$date','$price', '$itinerary', '$duration','$description')";
        $rc1 = mysqli_query($connection, $sql1);
        disconnect($connection);
        if($rc1){
            return true;
        }
        
        return false;
    }

    function tourEdit($idTour){

        setcookie("idTour",$idTour,time()+(86400),"/");     
        
        return true;
    }

    function tourUpdt($date, $name, $image, $price, $itinerary, $duration, $description, $idTourU){
        include('connection.php');
        $connection = connect();

       $sql = "UPDATE t_tour SET date = '$date', name = '$name', image = '$image', price = '$price', itinerary = '$itinerary', duration = '$duration', description = '$description' WHERE id = '$idTourU'";
       
        $rc = mysqli_query($connection, $sql);

        disconnect($connection);
        if($rc){
            return true;
        }

        return false;
        
    }

    function tourDel($idTourD){

        include('connection.php');
        $connection = connect();
        
        $sqlca = "DELETE FROM t_tour WHERE id = '$idTourD'";
        $rcca = mysqli_query($connection, $sqlca);

        disconnect($connection);

        if($rcca){

            return true; 
        }

        return false;
    }
}

?>