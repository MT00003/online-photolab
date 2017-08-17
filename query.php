<?php
include('config.php');
session_start(); // Starting Session

//Login Query
if (isset($_POST['loginSubmit'])) {
if (empty($_POST['userId']) || empty($_POST['password'])) {
	echo "<script>
				alert('Please insert Username and Password!!!');	
				window.history.go(-1);	
			</script>";
}
else
{
// Define $username and $password
$userId=$_POST['userId'];
$password=$_POST['password'];

// To protect MySQL injection for Security purpose
$userId = stripslashes($userId);
$password = stripslashes($password);
$userId = mysqli_real_escape_string($connection,$userId);
$password = md5(mysqli_real_escape_string($connection,$password));

// SQL query to fetch information of registerd users and finds user match.
$query = "select * from users where password='$password' AND userid='$userId'";
$sql=mysqli_query($connection,$query);
$rows = mysqli_num_rows($sql);

	if(!$rows){
		echo "<script>
				alert('Invalid username and password!!!');
				window.history.go(-1);					
			</script>";
	} 
	else{
		$_SESSION['userid']=$userId; // Initializing Session
		
		echo "<script type='text/javascript'>  window.location='index.php'; </script>";// Redirecting To Home Page
	}
mysqli_close($connection); // Closing Connection
}
}

//User Registration
if (isset($_POST['userRegistration'])) {

	$userPatern="user-00";
	$us="0";
	
	$query = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
	$sql=mysqli_query($connection,$query);
	$row = mysqli_fetch_array($sql);
	$us=$row['id'];
	$us1=$us+1;
	$userId =$userPatern.$us1;

	$username=$_POST['username'];
	$useremail=$_POST['useremail'];	
	$password=md5($_POST['password']);	

	
	$sql="INSERT INTO users(userid,name,email,password) 
		VALUES('$userId' ,'$username' ,'$useremail' ,'$password' )";
		$result=mysqli_query($connection,$sql);
		
		if ($result) {
			echo "<script>
						alert('User Created succesfully!!!');
						alert('Last Id is:  $userId   !!!');
                        window.history.go(-1);															 
				</script>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error();
		}
}

//Photo Upload 
if(isset($_POST['btn-upload'])){ 
	$userid=$_SESSION['userid'];   
	$title=$_POST['title'];
	$desc=$_POST['desc'];
	$id = 1001; 
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$size = $_FILES['file']['size'];
	$type = $_FILES['file']['type'];
	$folder="uploads/";

	move_uploaded_file($file_loc,$folder.$file);
	$sql="INSERT INTO photos(id,name,uploadby,title,description,type,size) VALUES('','$file','$userid','$title','$desc','$type','$size')";
	$result=mysqli_query($connection,$sql);
	
	
	if ($result) {
	echo "<script>
				alert('Photo uploaded !!!');
				window.history.go(-1);															 
		</script>";
	} else {
	echo "Error: " . $sql . "<br>" . mysql_error();
	}
}
?>