<?php
 include ('config.php');
	session_start(); // Starting Session
	
	$userid=$_SESSION['userid'];
	if(!isset($_SESSION['userid'])){ //if login in session is not set

		header("Location: login.php");
	}
		$sql = "select * from users where userid = '$userid'";
        $query = mysqli_query($connection,$sql) or die("Data Not Inserted");
        $rows = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="images/icon.png">
        <title>Home  : :  PhotoLab</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

    </head>
    <body>
		<header class="headerTop">
			<div class="container-fluid">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-5 headerTopMenu">
								<p><?php echo $rows['email']; ?></p>
							</div>
							<div class="col-md-7">
								<div class="col-md-6 timeZone">
									<div id="clockbox"></div>
								</div>
								<div class="col-md-6 registerButton">
									<!-- Split button -->
									<div class="btn-group">
									  <button type="button" class="btn">Hi! <?php echo $rows['name']; ?></button>
									  <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									  </button>
									  <ul class="dropdown-menu">
										<li><a href="logout.php">Logout</a></li>
									  </ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="mainMenu">
			<!-- Fixed navbar -->
			<nav class="navbar navbar-inverse">
			  <div class="container">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="#"><img src="images/logow.png" alt="Logo" /></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
				  <ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="profile.php">Profile</a></li>
					<li class="active"><a href="upload.php">Upload Photo</a></li>
					<li><a href="contact.php">Contact</a></li>
				  </ul>
				</div><!--/.nav-collapse -->
			  </div>
			</nav>
		</div>
        <div class="uploadPage">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
						<div class="col-md-6 col-md-offset-3">
							<h2 class="uploadtitle">Upload a new Photo</h2>
							<div class="uploadForm">
								<form action="query.php" method="post"  enctype="multipart/form-data">       
								  <input type="text" name="title" placeholder="Photo title" required="" autofocus="" />
								  <input type="textarea" name="desc" placeholder="Photo description" required="" autofocus="" />
								  <input type="file" name="file" placeholder="Upload Image" required=""/>      
								  <button class="btn btn-primary" name="btn-upload" type="submit">Upload</button>    
								</form>
							</div>
						</div>
        			</div>
        		</div>
        	</div>
        </div>
		
		<footer class="footerArea">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6 copyrightText">
							<p>&copy; <span>FhotoLab</span> - 2016 . All right reserved. </p>
						</div>
						<div class="col-md-6 socialArea">
							<ul>
								<li><a href="#" target="_blank" ><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-vimeo"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>

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