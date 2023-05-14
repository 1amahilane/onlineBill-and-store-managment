<?php session_start();
if(isset($_REQUEST["btnlogin"]))
{ 
$usrid=$_REQUEST["txtuser"];
$pass=$_REQUEST["txtpass"];
echo $usrid;
echo $pass;
include 'databaseconn.php';
$quer="SELECT * FROM user WHERE usrid='$usrid' AND password='$pass'";
$result=mysqli_query($conn,$quer);
  if(mysqli_affected_rows($conn)>0)
  {
	  $row=mysqli_fetch_array($result);
	  $_SESSION["uid"]=$row["usrid"];
	  header("Location:index.php");
  }
  else
	{
		echo"<p class='bg-warning text-white'>Invalid Username or Password</p>";
	}
 
include 'databaseconn.php';
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<title>LOGIN PAGE</title>
		<style type="text/css">
	  *
      {
          margin: 0;
          padding: 0;
      }

	.form
			{
				margin-top:200px;
				padding:20px;
				background-color:rgba(0,0,0,0.6);
				-webkit-box-shadow: -1px 2px 45px 5px rgba(0,0,0,0.75);
				-moz-box-shadow: -1px 2px 45px 5px rgba(0,0,0,0.75);
				box-shadow: -1px 2px 45px 5px rgba(0,0,0,0.75);
			}
			.color
				{
					color:white;
				}
			
		</style>
  </head>
  <body>
  <div class="container-fluid bg">
	<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	
	
	<form name="loginform" action="login.php" method="GET" class="form">
	<p class="lead text-center font-weight-bold color">Sign In</p>
	<div class="form-group">
 
	<input type="text" name="txtuser" value="" placeholder="Enter Username" class="form-control" autocomplete="off" required>
	</div>
	
	<div class="form-group">

	<input type="password" name="txtpass" value="" placeholder="Enter Password" class="form-control" required>
	</div>
	
	<div class="form-group">
	<input type="submit" name="btnlogin" value="Login" class="btn btn-success btn-block" >
	</div>
	
	</form>
	
	</div>
	<div class="col-md-4"></div>
	</div>
	</div>
	


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>