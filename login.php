<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>

		<!-- Bootstrap CSS -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

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
						<li class=""><a href="index.php#tour">Tours</a></li></li>
						<li class=""><a href="signup.php">Sign up</a></li>
						<li class="active"><a href="login.php">Login</a></li>
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
	      <!-- <div class="container">
	        <div class="intro-text">
	          <div class="intro-lead-in">Welcome To London Tours!</div>
	          <div class="intro-heading text-uppercase">Enjoy with Us!</div>
	          <a class="btn btn-success btn-xl text-uppercase js-scroll-trigger" href="#services">Sign Up</a>
	        </div>
	      </div> -->
	    </header>
		<!-- <main class="headerbg"> -->
			<div class="limiter">
				<div class="container-login100">
					<div class="wrap-login100">
						<form class="login100-form validate-form" method="post" action="php/validate-login.php">
							
							
							<span class="login100-form-title">
								<img src="img/LogoBrand.png">
								Welcome
							</span>
							<!-- <span class="login100-form-title p-b-48">
								<i class="zmdi zmdi-font"></i>
							</span> -->

							<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
								<input class="input100" type="text" name="email">
								<span class="focus-input100" data-placeholder="Email"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate="Enter password">
								<span class="btn-show-pass">
									<i class="zmdi zmdi-eye"></i>
								</span>
								<input class="input100" type="password" name="pass">
								<span class="focus-input100" data-placeholder="Password"></span>
							</div>

							<div class="container-login100-form-btn">
								<div class="wrap-login100-form-btn">
									<div class="login100-form-bgbtn"></div>
									<button class="login100-form-btn">
										Login
									</button>
								</div>
							</div>

							<div class="text-center p-t-115">
								<span class="txt1">
									Don’t have an account?
								</span>

								<a class="txt2" href="signup.php">
									Sign Up
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>	
		<!-- </main> -->
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
		

		<!-- jQuery -->
		<!-- <script src="//code.jquery.com/jquery.js"></script> -->
		<script src="js/jquery-3.3.1.min.js"></script>

		<!-- Bootstrap JavaScript -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
		<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>

		<!-- JavaScript -->
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/login.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		
	</body>
</html>