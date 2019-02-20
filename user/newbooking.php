<?php
	session_start();
	$tour_id = $_GET['tour'];
    include('../php/connection.php');
    $con = connect();
    $query = "SELECT * FROM t_tour where id ='".$tour_id."'";
    $result = mysqli_query( $con, $query ) or die("Something went wrong in the query to the database");
    $tour = $result->fetch_array();
    disconnect($con);
    $_SESSION['idtour'] = $tour_id; 
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>New Booking</title>

		<!-- Bootstrap CSS -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		 -->
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="../css/admin.css">
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
						<li class="active"><a href="../php/validate-logout.php">Logout</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		<div class="main-menu-area mg-tb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                            <li class="active"><a href="user.php"><i class="notika-icon notika-house"></i>Tours</a>
                            </li>
                            <li><a href="mybookings.php"><i class="notika-icon notika-mail"></i> My Bookings</a>
                            </li>
                            <li><a href="profile.php"><i class="notika-icon notika-mail"></i> My Profile</a>
                            </li>
                        </ul>
                        <!-- <div class="tab-content custom-menu-content">
                            <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                                <ul class="notika-main-menu-dropdown">
                                    <li><a href="user.php">Do it</a>
                                    </li>
                                </ul>
                            </div>
                            <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                                <ul class="notika-main-menu-dropdown">
                                    <li><a href="mybookings.php">Bookings</a>
                                    </li>
                                    <li><a href="editbooking.php">Edit Bookings</a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Menu area End-->
        <div class="container">
        	<div class="row">
        		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        			<?php echo "<h1 class='title-tour'>".$tour['name']."</h1>"; ?>	
        		</div>
        		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        			<div class="imgtour box-white">
        				<?php echo "<img src='../img/".$tour['image']."' alt=''>"; ?>
        			</div>
        		</div>
        		<div class="col-lg-4 col-md-4 col-xs-12">
        			<div class="text-tour box-white">
        				<?php echo "<label>Itinerary</label><p>".$tour['itinerary']."</p>" ?>
        				<br/>
        				<a href='#' style="" data-toggle='modal' data-target='#myModal' class="btn btn-success">Book!</a>
        			</div>
        		</div>
        	</div>
        	<div class="row section-div">
        		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        			<div class="box-white">
        				<?php echo "<h3 class = 'subtitle'>Price</h3>" ?>
        				<?php echo "<p>".$tour['price']."</p>" ?>
        			</div>
        		</div>
        		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        			<div class="box-white">
        				<?php echo "<h3 class = 'subtitle'>Date</h3>" ?>
        				<?php echo "<p>".$tour['date']."</p>" ?>
        			</div>
        		</div>
        		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        			<div class="box-white">
        				<?php echo "<h3 class = 'subtitle'>Duration</h3>" ?>
        				<?php echo "<p>".$tour['duration']."</p>" ?>
        			</div>
        		</div>
        	</div>	
        </div>
        <br/>
        <br/>
        <footer>
	      <div class="container">	
	        <div class="row">
	          <div class="col-md-4">
	            <span class="copyright">Copyright &copy; London Tours 2019</span>
	          </div>
	          <div class="col-md-4">
	            <ul class="list-inline social-buttons">
	              <li class="list-inline-item">
	                <a href="#">
	                  <i class="fab fa-twitter"></i>
	                </a>
	              </li>
	              <li class="list-inline-item">
	                <a href="#">
	                  <i class="fab fa-facebook-f"></i>
	                </a>
	              </li>
	              <li class="list-inline-item">
	                <a href="#">
	                  <i class="fab fa-linkedin-in"></i>
	                </a>
	              </li>
	            </ul>
	          </div>
	          <div class="col-md-4">
	            <ul class="list-inline quicklinks">
	              <li class="list-inline-item">
	                <a href="#">Privacy Policy</a>
	              </li>
	              <li class="list-inline-item">
	                <a href="#">Terms of Use</a>
	              </li>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </footer>
        
		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Tickets</h4>
		      </div>
		      <form action="../php/validate-booking.php" method="post" accept-charset="utf-8">
			      <div class="modal-body">
			      	<label for="mcNamelgm">Please choose the number of tickets to request:</label>
			      	<input type="number" name="tickets" value="1" placeholder="Tickets" class="inputNumber" min="1" max="20" >
			      </div>
			      <div class="modal-footer">
			        <input type="submit" class="btn btn-default" value="Book!" required="At least One"></input>
			      </div>
		      </form>
		    </div>

		  </div>
		</div>

		<!-- jQuery -->
		<!-- <script src="//code.jquery.com/jquery.js"></script> -->
		<script src="../js/jquery-3.3.1.min.js"></script>

		<!-- Bootstrap JavaScript -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
		<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>

		<!-- JavaScript -->
		<script type="text/javascript" src="../js/main.js"></script>
		<script type="text/javascript" src="../js/login.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	</body>
</html>