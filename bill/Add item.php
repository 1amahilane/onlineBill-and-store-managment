<?php session_start();
if(isset($_SESSION["uid"]))
{
	$id=$_SESSION["uid"];
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
     <title>Add Items</title>
	
	<style type="text/css">
	*{margin:0; padding:0;}
	.hed{text-align:center;
	margin-top:20px;
	font-size:70px;
	@import url('https://fonts.googleapis.com/css2?family=Fredoka+One&family=Lobster&family=Permanent+Marker&display=swap');
	font-weight:bold;
	      color:rgb(0,0,0);}
		  
    .bt{width:48%;
	   border-radius:10px;
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
        <a class="nav-link active" aria-current="page" href="index.php">Make Bill</a>
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
<p class="hed">Customize Items List<p>
<form name="adder" method="GET" action="Add item.php">
		<div class="form-floating mb-3">
		<input type="text" name="item" class="form-control"  placeholder="Name" required>
		<label for="item"  class="form-label">Item name</label>		
		</div>
		
		
		<div class="form-floating mb-3">		
		<input type="number" name="price"  class="form-control" value="" placeholder="Age" required>
		<label for="price"  class="form-label">Price</label>
		</div>
		
		<div class="form-floating mb-3">		
		<input type="number" name="stock"  class="form-control" value="" placeholder="Age" required>
		<label for="stock"  class="form-label">Stock</label>
		</div>

        <!--add wala submit button-->
		 <div style="text-align:center;">
	  <input type="submit" name="putt" class="btn btn-info bt" value="Add Item">
 
	   </div>
		</form>

<?php
if(isset($_REQUEST["putt"]))
{$item=$_REQUEST["item"];
$price=$_REQUEST["price"];
$stock=$_REQUEST["stock"];
include 'databaseconn.php';
$qry="INSERT INTO product(usrid,iname,price,stock)
VALUE('$id','$item' ,'$price' , '$stock')";

if(mysqli_query($conn,$qry)){?>


<table class="table mt-5 table-success">
  <thead>
    <tr class="text-center">
     <th scope="col"><?php echo"$item";?></th>
      <th scope="col"><?php echo"$price".". ".'<i class="fas fa-rupee-sign text-muted"></i>';?></th>
      <th scope="col"><?php echo"$stock"." pcs Available";?></th>

      <th scope="col">Saved in products</th>
    </tr>
  </thead>
</table> 
 
<?php }else {echo"Error Occurred ".mysqli_error($conn);}}?>
		
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

<?php
}
else 
{
	header("Location:login.php");
}
?>