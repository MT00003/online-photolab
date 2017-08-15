<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="images/icon.png">
        <title>Login  : :  PhotoLab</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

    </head>
    <body>
        <div class="loginPage">
        	<div class="container-full">
        		<div class="row">
        			<div class="col-md-12">
        				<div class="col-md-6 loginPageDetails">
        					<img src="images/logo2.png" alt="PhotoLab Logo" />
							
							<h2>Welcome</h2>
							<h4>Register here for <span>PhotoLab</span> account</h4>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text in the display line.</p>
							<a href="#" id="registerButton" class="btn"> Register Here</a>
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">Profile</a></li>
								<li><a href="#">Gallery</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
						<div class="col-md-6 loginPageForm">
							<div id="loginForm" class="loginForm">
								<p>Or login to the account</p>
								<form action="query.php" method="post">       
								  <input type="text" name="userId" placeholder="Your email" required="" autofocus="" />
								  <input type="password" name="password" placeholder="Password" required=""/>      
								  <button class="btn btn-primary" name="loginSubmit" type="submit">Login</button>   
								  <!--a href="#"> Forget Password ? </a-->
								</form>
							</div>
							<div id="registerForm" class="registerForm">
								<p>Register Here</p>
								<form action="query.php" method="post">       
								  <input type="text" name="username" placeholder="Your name" required="" autofocus="" />
								  <input type="email" name="useremail" placeholder="Your email" required="" autofocus="" />
								  <input type="password" name="password" placeholder="Password" required=""/>      
								  <button class="btn btn-primary" name="userRegistration" type="submit">Register</button>    
								  <a id="loginButton" href="#"> Back to Login ? </a>
								</form>
							</div>
						</div>
        			</div>
        		</div>
        	</div>
        </div>

        <script src="js/jquery-2.2.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

		<script type="text/javascript">
			$('#registerButton').click(function() {
				$('#loginForm').hide('slow');
				$('#registerForm').show('slow');
			  });
			$('#loginButton').click(function() {
				$('#registerForm').hide('slow');
				$('#loginForm').show('slow');
			  });
		</script>
    </body>
</html>