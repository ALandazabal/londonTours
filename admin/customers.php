<?php 
	include('../php/connection.php');
	session_start();
	$connection = connect();
	$query = "SELECT * FROM t_user";
	$result = mysqli_query($connection, $query);

	$objUserEdit = null;
	if(isset($_COOKIE['idUser'])){
	    $idUser = $_COOKIE['idUser'];
	    $sqledit = "SELECT * FROM t_user WHERE id = '$idUser'";
	    $rcedit = mysqli_query($connection, $sqledit);
	    $objUserEdit = $rcedit->fetch_array();
	}

	disconnect($connection);
 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bookings - London Tours</title>

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
                            <li class="active"><a href="customers.php"><i class="notika-icon notika-house"></i>Customers</a>
                            </li>
                            <li><a href="bookings.php"><i class="notika-icon notika-mail"></i>Bookings</a>
                            </li>
                            <li><a href="tours.php"><i class="notika-icon notika-mail"></i>Tours</a>
                            </li>
                            <li><a href="commentaries.php"><i class="notika-icon notika-mail"></i>Commentaries</a>
                            </li>
                        </ul>
                        <!-- <div class="tab-content custom-menu-content">
                            <div id="Home" class="tab-pane  notika-tab-menu-bg animated flipInX">
                                <ul class="notika-main-menu-dropdown">
                                    <li><a href="user.php">Do it</a>
                                    </li>
                                </ul>
                            </div>
                            <div id="mailbox" class="tab-pane in active notika-tab-menu-bg animated flipInX">
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
                            <h2>Users</h2>
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>E-mail</th>
                                        <th>Name</th>
                                        <th>Type</th>   
                                        <th>Edit User</th>
                                        <th>Delete User</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php 
					        			if($result){
					        				$connection = connect();

					        				while ( $column = mysqli_fetch_array($result)) {
					        					$query = "SELECT * FROM t_user_type WHERE id = ".$column['fk_user_type'];
					        					$result2 = mysqli_query($connection,$query) or die("error on database");
					        					$type = $result2->fetch_array();
					        					//$retVal = ($column['state']==1) ? "active" : "cancelled";
					        					echo "<tr>";
					        					echo "<td>".$column['id']."</td>";
					        					echo "<td>".$column['email']."</td>";
					        					echo "<td>".$column['name']."</td>";
					        					echo "<td>".$type['desc']."</td>";
					        					if ($column['fk_user_type'] != 1) {
						        					$on = 'return confirm("Are you sure?") && userDel('.$column['id'].')';
									                echo '<td><a class="btn" title="Edit" data-toggle="modal" data-target=".userEditModal" onclick="userEdit('.$column['id'].')"><i class="glyphicon glyphicon-edit"></i></a></td>';
									                echo "<td><a class='btn' title='Delete' onclick= '".$on."'><i class='glyphicon glyphicon-trash'></i></a></td>";
									            }else{
									            	echo '<td><a class="btn" title="Edit" data-toggle="modal" data-target=".userEditModal" onclick="userEdit('.$column['id'].')"><i class="glyphicon glyphicon-edit"></i></a></td>';
									                echo "<td><a class='btn disabled' title='Delete'><i class='glyphicon glyphicon-trash'></i></a></td>";
									            }
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
                                        <th>E-mail</th>
                                        <th>Name</th>
                                        <th>Type</th>   
                                        <th>Edit User</th>
                                        <th>Delete User</th>
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

    <!--modal edit user-->
	<div id="myModal" class="modal fade userEditModal" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <!-- <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit User: # <?php echo $objUserEdit['id']; ?></h4>
		      </div> -->
		      <form id="userEditModal" action="save.php" method="post" accept-charset="utf-8">
		      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Edit User: # <?php echo $objUserEdit['id']; ?></h4>
			      </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Name</label>
			      	<input type="text" id="name" name="name" value="<?php echo $objUserEdit['name']; ?>" placeholder="Tickets" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">E-mail</label>
			      	<input type="text" id="email" name="email" value="<?php echo $objUserEdit['email']; ?>" placeholder="Tickets" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Phone</label>
			      	<input type="phone" id="phone" name="phone" value="<?php echo $objUserEdit['phone']; ?>" placeholder="Tickets" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Postcode</label>
			      	<input type="text" id="postcode" name="postcode" value="<?php echo $objUserEdit['postcode']; ?>" placeholder="Tickets" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Address</label>
			      	<input type="text" id="address" name="address" value="<?php echo $objUserEdit['address']; ?>" placeholder="Tickets" class="form-control" >
			    </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">City</label>
			      	<input type="text" id="city" name="city" value="<?php echo $objUserEdit['city']; ?>" placeholder="Tickets" class="form-control" >
			    </div>
			      <div class="modal-body">
			      	<label for="mcNamelgm">Password</label>
			      	<input type="password" id="password" name="password" placeholder="********" class="form-control" >
			      	<input type="hidden" id="passwordC" name="passwordC" value="<?php echo $objUserEdit['password']; ?>" placeholder="Tickets" class="form-control" >
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" onclick="userUpdt(<?php echo $objUserEdit['id']; ?>)">Update!</button>
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