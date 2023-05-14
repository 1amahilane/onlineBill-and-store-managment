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
     <title>View Items</title>
	
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
	   border-width:3px;
	   margin-top:5px;}		  
	      
    	   
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
<p class="hed">Display products<p>
<form name="product" method="GET" action="view items.php">
		<div class="form-floating mb-1">
		<input type="text" name="key" class="form-control"  placeholder="search">
		<label for="key"  class="form-label">Search</label>		
		</div>
		

        <!--add wala submit button-->
		 
	  <input type="submit" name="search" class="btn btn-outline-info bt" value="Search">
	  </form>
	 
	    <form name="showall" method="GET" action="view items.php">
		 <input type="submit" name="all" class="btn btn-outline-info bt1" value="Show All">
		 
		</form>
<?php
if(isset($_REQUEST["search"]) OR isset($_REQUEST["all"]))
{    $key="";
    if(isset($_REQUEST["search"]))
    $key=$_REQUEST["key"];
	include 'databaseconn.php';
	$qry="SELECT * FROM product WHERE usrid='$id' AND (iname LIKE '%$key%' OR pid LIKE '%$key%') ";
$result=mysqli_query($conn,$qry);?>
<div class="container mt-5" >
<div class="row">
<table class="table">
  <thead>
    <tr style="text-align:center;">
      <th scope="col">pid</th>
      <th scope="col">ITEM NAME</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
	  </tr>
  </thead>
   <tbody>
  <?php while($row=mysqli_fetch_array($result))
   {
    
    $pid=$row['pid'];
    $itname=$row['iname'];
    $amt=$row['price'];
	$stock=$row["stock"];?>
 <tr style="text-align:center;">
 <th scope="row"><?php echo"$pid";?></th>
      <td><?php echo"$itname";?></td>
      <td><?php echo "$amt".". ".'<i class="fas fa-rupee-sign text-muted"></i>';?></td>
	  <td><?php echo"$stock".".pcs Available";?></td>
     
	  <td><a href="update.php?d=<?php echo"$pid";?> & iname=<?php echo"$itname";?> & price=<?php echo"$amt";?>& stock=<?php echo"$stock";?>"><i class="fas fa-edit"></i></a> |
	  <a href="delete.php?iname=<?php echo"$itname";?>"><i class="fas fa-trash text-danger"></i></a></td>
    </tr>    
    
   <?php echo"";}?>
  </tbody>	
</table>  
</div>
</div>
<?php echo"";}?>	
		
		
		
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