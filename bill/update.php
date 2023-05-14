<?php session_start();
if(isset($_SESSION["uid"]))
{$id=$_SESSION["uid"];
	
	if(isset($_REQUEST["d"])){
	$pd=$_REQUEST["d"]; 	
    $name=$_REQUEST["iname"];
    $price=$_REQUEST["price"];
    $stc=$_REQUEST["stock"]; }

if(isset($_REQUEST["update"]))
{ 
 $pd=$_REQUEST["pd"];
 $item=$_REQUEST["pro"];
 $rupee=$_REQUEST["prc"];
 $stck=$_REQUEST["stck"];
 
 
 
include 'databaseconn.php';
$qry="UPDATE product SET iname='$item', price = '$rupee', stock = '$stck' WHERE usrid='$id' AND pid='$pd'";
if(mysqli_query($conn,$qry))
{header("Location:view items.php");}
else { echo"Error Occurred ".mysqli_error($conn); } 
   
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/195e9e5dd2.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <title>Updating...</title>
	
	<style type="text/css">
	*{margin:0; padding:0;}
	.hed{text-align:center;
	margin-top:20px;
	font-size:70px;
	@import url('https://fonts.googleapis.com/css2?family=Fredoka+One&family=Lobster&family=Permanent+Marker&display=swap');
	font-weight:bold;
	      color:rgb(0,0,0);}
		  
    .bt{width:20%;
	   border-radius:7px;
	   border-width:3px;}		  
	   
	   
	 .bt1{width:40%;
	   border-radius:7px;
	   border-width:3px;}		  
	      
    	   
	</style>
  </head>
  <body>
   
   
    <div class="container-fluid">
	 <div class="row"  style="background-color:rgb(195,196,199); height:55px;">
	 </div>
	</div>
	
	

		<nav class="navbar navbar-expand-lg navbar-light bg-light  sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="fas fa-cash-register"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="/*width:100%;*/">
        <a class="nav-link active" aria-current="page" href="home.php">Make Bill</a>
        <a class="nav-link active" aria-current="page" href="view items.php">View Items</a>
        <a class="nav-link active" aria-current="page" href="Add item.php">Add Items</a>
        <a class="nav-link active" aria-current="page" href="invoice.php">Invoice</a>
		
		</div>
	  <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active text-white  badge bg-danger text-wrap" aria-current="page" style="font-weight:bold; font-size:18px;border-radius:6px; border:3px solid rgb(254,215,7);" href="logout.php">Log-out</a>  
            </li>
            
        </ul>
    </div>
  </div>
</nav>



<div  class="container-fluid">
<div class="row" style="width:100%; height:600px;">
<div class="col-md-2 d-none d-md-block">
<img src="images/bill.jpg" style="width:100%; height:100%;">
</div>
<div class="col-md-8">
<p class="hed">Updation<p>
<form name="product" method="GET" action="update.php">
		
		<table class="table">
  <thead>
    <tr style="text-align:center;">
      <th scope="col">ITEM NAME</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
	  </tr>
  </thead>
   <tbody>
 <tr style="text-align:center;">
 <th scope="row"><input type="text" name="pro" value="<?php echo $name;?>"></th>
    
      
      <td><input type="number" name="prc" value="<?php echo $price;?>">.Rs</td>
	  <td><input type="number" name="stck" value="<?php echo $stc;?>">.pcs</td>
	 
     
    </tr>    
    
   
  </tbody>
		</table>
		<div class="text-center">
	  <input type="submit" name="update" class="btn btn-outline-info bt " value="Update">
	    </div>
      <input type="text" name="pd" value="<?php echo $pd      ;?>" readonly class="invisible">  
	  </form>
	 
	
		
		
		
</div>
<div class="col-md-2 d-none d-md-block">
<img src="images/bill-2.png" style="width:100%; height:100%;">
</div>
</div>	
</div>
	
	
   
   
   
   
   
   
   
   
   
   
   
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>


<?php } else {header("Location:login.php");}?> 


