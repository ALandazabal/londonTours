<?php 
	include('php/connection.php');
	if(!$_GET){
		header('Location:index.php?page=1');
	}
 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="fonts/fontawesome-free-5.6.3-web/css/all.min.css">
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="menu">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><img src="img/LogoBrand.png"></a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class=""><a href="#tour">Tours</a></li>
						<li><a href="signup.php">Sign up</a></li>
						<li><a href="login.php">Login</a></li>
						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li> -->
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		<header class="headerbg">
	      <div class="container">
	      	<div class="row">
	      		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	      			<div class="intro-text">
			          <div class="intro-lead-in">Welcome To London Tours!</div>
			          <div class="intro-heading text-uppercase">Enjoy with Us!</div>
			          <a class="btn btn-signup btn-xl text-uppercase" href="signup.php">Sign Up</a>
			        </div>
	      		</div>
	      		<div class="col-lg-12 col-md-12 col-sm-12 col">
	      			
	      		</div>
	      	</div>
	        
	      </div>
	    </header>
		<main>
			<section class="container tours" id="tour">
				<div class="row">
					<?php 
				$bypage = 4;
                $connection = connect();
                $query = "SELECT * FROM t_tour";
                $result = mysqli_query( $connection, $query ) or die("Something went wrong in the query to the database");
                $row_cnt = mysqli_num_rows($result);
                
                
                while ($column = mysqli_fetch_array( $result ))
                {
                    echo "<div class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>";
                    echo "<div class='card'>";
                    echo "<img class='card-img-top' src='../img/".$column['image']."' alt='Card image cap'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>".$column['name']."</h5>";
                    echo "<p class='card-text'>".$column['description']."</p>";
                    echo "<div class='wrap-login100-form-btn'>";
                    echo "<div class='login100-form-bgbtn'></div>";
                    echo "<a href='newbooking.php?tour=".$column['id']."' class='login100-form-btn'>Book</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }

                /*$pages = ($row_cnt>$bypage) ? ceil($row_cnt/$bypage) : 1 ;
               
                $start = ($_GET['page']-1)*$bypage;
                $queryByPage = "SELECT * FROM t_tour LIMIT ".$start.",".$bypage."";
                $resutl = mysqli_query($connection,$queryByPage);
                echo $queryByPage;*/

                disconnect($connection)
           ?>

		           <!-- <ul class="pagination">
					  
						<?php 
						$pagePrev = $_GET['page']-1;
						$classPrev = ($pagePrev == 0) ? 'disabled' : '' ;
						
						echo "<li class ='".$classPrev."'><a href='index.php?page=".$pagePrev."' > Prev</a></li>" 
						?>
					  	
					  <?php for ($i=0; $i < $pages; $i++):?>
					  	<li><a href="index.php?page=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
					  <?php endfor ?>
					  
					  <?php 
					  $pageNext = $_GET['page']+1;
					  $ClassNext = ($pageNext == $row_cnt+1 ) ? 'disabled' : '' ;
					  echo "<li class = '".$ClassNext."'><a href='index.php?page=".$pageNext."'>Next</a></li>"; ?>
					</ul> -->
				</div>

			</section>
			<section class="about-us container-fluid" id="about">
				<div class="row">
					<div class="title-about text-center col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<h1>About us</h1>
					</div>
					<div class="col-lg-4 col-md-4">
						
					</div>
					<div class="text-about text-center col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<p>We are the leading company in online distribution of activities, excursions and guided tours in the main tourist destinations of London.</p>
					</div>
				</div>
			</section>
			<section id="contact" class="container">
				<div class="row">
					<form class="login100-form validate-form" method="post" action="#">
						<span class="login100-form-title">Contact</span>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="wrap-input100 validate-input" >
								<input class="input100" type="text" id="nameMsg" name="nameMsg" required="this field is required" placeholder="Name">
								<span class="focus-input100"></span>
							</div>
							<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
								<input class="input100" type="email" id="emailMsg" name="emailMsg" required="this field is required" placeholder="E-mail">
								<span class="focus-input100" data-placeholder=""></span>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<textarea id="textMsg" name="textMsg" required="this field can't be empty" class="text-area-contact"></textarea>
						</div>
						<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center submit-contact">
							<button type="button" class="btn btn-signup" onclick="ctryAdd()">Send!</button>
						</div>
					</form>
				</div>
			</section>	
		</main>
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


	    <div id="myctry" class="modal fade ctryModal" role="dialog">
		  <div class="modal-dialog">

		    <div class="modal-content">
		      
		      <form id="ctryModal" action="save.php" method="post" accept-charset="utf-8">
		      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Confirmation: </h4>
			      </div>
			    <div class="modal-body">
			      	<label for="mcNamelgm">Your message was sent successfully</label>
			    </div>
			  
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".ctryModal">Ok!</button>
			      </div>
		      </form>
		    </div>

		  </div>
		</div>
		

		<!-- jQuery -->
		<!-- <script src="//code.jquery.com/jquery.js"></script> -->
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
    	<script src="js/data-table-act.js"></script>
		<!-- Bootstrap JavaScript -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
		<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>

		<!-- JavaScript -->
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/ajax.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		
	</body>
</html>