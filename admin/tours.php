<?php 
	include('../php/connection.php');
	session_start();
	$connection = connect();
	$query = "SELECT * FROM t_tour";
	$result = mysqli_query($connection, $query);

	$objTourEdit = null;
	if(isset($_COOKIE['idTour'])){
	    $idTour = $_COOKIE['idTour'];
	    $sqledit = "SELECT * FROM t_tour WHERE id = '$idTour'";
	    $rcedit = mysqli_query($connection, $sqledit);
	    $objTourEdit = $rcedit->fetch_array();
	}

	disconnect($connection);
 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tours - London Tours</title>

		<!-- Bootstrap CSS -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		 -->
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="../css/admin.css">
		<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default " role="navigation" id="menu">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><img src="../img/LogoBrand.png"></a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class=""><a href="../php/validate-logout.php">Logout</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		<div class="main-menu-area mg-tb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                            <li><a href="customers.php"><i class="notika-icon notika-house"></i>Customers</a>
                            </li>
                            <li><a href="bookings.php"><i class="notika-icon notika-mail"></i>Bookings</a>
                            </li>
                            <li class="active"><a href="tours.php"><i class="notika-icon notika-mail"></i>Tours</a>
                            </li>
                            <li><a href="commentaries.php"><i class="notika-icon notika-mail"></i>Commentaries</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        	<div class="row">
        		
        	</div>	
        </div>
		<!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <!-- <div class="basic-tb-hd">
                            <p>It's just that simple. Turn your simple table into a sophisticated data table and offer your users a nice experience and great features without any effort.</p>
                        </div> -->
                        <div class="table-responsive">
                            <h2>Tours  </h2> 
                            <a href='#' style="" data-toggle='modal' data-target='#newTour' class="btn btn-success">New Tour!</a>
                            <br/>
                            <br/>
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                        <th>Edit Booking</th>    
                                        <th>Delete Booking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php 
					        			if($result){
					        				$connection = connect();

					        				while ( $column = mysqli_fetch_array($result)) {
					        					echo "<tr>";
					        					echo "<td>".$column['id']."</td>";
					        					echo "<td>".$column['name']."</td>";
					        					echo "<td>".$column['date']."</td>";
					        					echo "<td>".$column['price']."</td>";
					        					echo "<td>".$column['duration']."</td>";
					        					$on = 'return confirm("Are you sure?") && tourDel('.$column['id'].')';
				        						echo '<td><a class="btn" title="Edit" data-toggle="modal" data-target=".tourEditModal" onclick="tourEdit('.$column['id'].')"><i class="glyphicon glyphicon-edit"></i></a></td>';
							                	echo "<td><a class='btn' title='Delete' onclick= '".$on."'><i class='glyphicon glyphicon-trash'></i></a></td>";
					        					
					        					echo "</tr>";
					        					

					        				}
					        				disconnect($connection);	
					        			}else{
					        				echo "<p>Ups! there isn't Booking</p>";
					        			}
					        		 ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                        <th>Edit Booking</th>    
                                        <th>Delete Booking</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

    <!--modal edit booking-->
	<div id="myModal" class="modal fade tourEditModal" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <form id="tourEditModal" action="save.php" method="post" accept-charset="utf-8">
		      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Edit Tour: # <?php echo $objTourEdit['id']; ?></h4>
			      </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Date</label>
			      	<input type="text" id="dateE" name="dateE" value="<?php echo $objTourEdit['date']; ?>" placeholder="Date" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">name</label>
			      	<input type="text" id="nameE" name="nameE" value="<?php echo $objTourEdit['name']; ?>" placeholder="name" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Image</label>
			      	<input type="text" id="imageE" name="imageE" value="<?php echo $objTourEdit['image']; ?>" placeholder="image" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Price</label>
			      	<input type="text" id="priceE" name="priceE" value="<?php echo $objTourEdit['price']; ?>" placeholder="price" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Itinerary</label>
			      	<input type="text" id="itineraryE" name="itineraryE" value="<?php echo $objTourEdit['itinerary']; ?>" placeholder="itinerary" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Duration</label>
			      	<input type="text" id="durationE" name="durationE" value="<?php echo $objTourEdit['duration']; ?>" placeholder="duration" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Description</label>
			      	<input type="text" id="descriptionE" name="descriptionE" value="<?php echo $objTourEdit['description']; ?>" placeholder="description" class="form-control" >
			    </div>
			    
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" onclick="tourUpdt(<?php echo $objTourEdit['id']; ?>)">Update!</button>
			      </div>
		      </form>
		    </div>

		  </div>
		</div>


		<!--modal new Tour-->
	<div id="newTour" class="modal fade newTour" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <form  action="save.php" method="post" accept-charset="utf-8">
		      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">New Tour:</h4>
			      </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Date</label>
			      	<input type="text" id="date" name="date" value="" placeholder="Date" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">name</label>
			      	<input type="text" id="name" name="name" value="" placeholder="name" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Image</label>
			      	<input type="text" id="image" name="image" value="" placeholder="image" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Price</label>
			      	<input type="text" id="price" name="price" value="" placeholder="price" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Itinerary</label>
			      	<input type="text" id="itinerary" name="itinerary" value="" placeholder="itinerary" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Duration</label>
			      	<input type="text" id="duration" name="duration" value="" placeholder="duration" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Description</label>
			      	<input type="text" id="description" name="description" value="" placeholder="description" class="form-control" >
			    </div>
			    
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" onclick="tourCreate()">Create!</button>
			      </div>
		      </form>
		    </div>

		  </div>
		</div>


		<!-- jQuery -->
		<!-- <script src="//code.jquery.com/jquery.js"></script> -->
		<script src="../js/jquery-3.3.1.min.js"></script>
		<script src="../js/jquery.dataTables.min.js"></script>
    	<script src="../js/data-table-act.js"></script>
		<!-- Bootstrap JavaScript -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
		<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>

		<!-- JavaScript -->
		<script type="text/javascript" src="../js/main.js"></script>
		<script type="text/javascript" src="../js/login.js"></script>
		<script type="text/javascript" src="../js/ajax.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	</body>
</html>