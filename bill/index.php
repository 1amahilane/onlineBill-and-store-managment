<?php session_start();
if(isset($_SESSION["uid"]))
{
	$id=$_SESSION["uid"];
	$cname="";
    $teliphone="";
?>
<!--for put the purchasing product detail in database-->
<?php
if(isset($_REQUEST["addbill"])){
$inv=$_REQUEST["inv"];
$cname=$_REQUEST["cusname"];
$teliphone=$_REQUEST["teli"];
$product=$_REQUEST["item"];
$quan=$_REQUEST["qua"];
include 'databaseconn.php';
$qry="SELECT price,stock FROM product WHERE usrid='$id' AND iname='$product'";
$result=mysqli_query($conn,$qry);
if(mysqli_affected_rows($conn)>0)
{
	$record=mysqli_fetch_array($result);
	$amt=$record["price"]*$quan;
	$stk=$record["stock"]-$quan;
}
include 'databaseconn.php';
$qry="INSERT INTO invoice (usrid, inv, custname,mobile, itname, quantity, amt) 
VALUES('$id', '$inv', '$cname', '$teliphone', '$product', '$quan', '$amt')";
 if(mysqli_query($conn,$qry))
 {}
else
    {
        echo"Error Occurred ".mysqli_error($conn);
    }	
/* For managing the stock according to sold product*/
include 'databaseconn.php';
$qr="UPDATE product SET stock='$stk' WHERE usrid='$id' AND iname='$product'";
if(mysqli_query($conn,$qr))
{}
else { echo"Error Occurred ".mysqli_error($conn); } 
   

}
?>


<?php
include 'databaseconn.php';
$qry="SELECT MAX(inv) AS INV FROM invoice WHERE usrid='$id'";
$result=mysqli_query($conn,$qry);
if(mysqli_affected_rows($conn)>0)
{    
	$record=mysqli_fetch_array($result);
    $max=$record["INV"]+1;
	if(isset($_REQUEST["addbill"]))
	{$max=$max-1;}
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
     <title>Make Bill</title>
	
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
	   }
   	   
		  
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
<p class="hed">BILLING<p>
<form name="calculator" method="POST" action="index.php">
		<div class="form-floating mb-3">
		<input type="number" name="inv" value="<?php echo $max; ?>" class="form-control"  placeholder="Name"   required>
		<label for="inv"  class="form-label">Invoice</label>		
		</div>
		
		
		<div class="form-floating mb-3">		
		<input type="text" name="cusname"  class="form-control" value="<?php echo"$cname";?>" placeholder="Age" required>
		<label for="c-name"  class="form-label">Customer Name</label>
		</div>

        <div class="form-floating mb-3">
		<input type="tel" name="teli" value="<?php echo "$teliphone";?>" class="form-control"  placeholder="Name" required>
		<label for="teli"  class="form-label">Mobile Number</label>		
		</div>
  
  
        		
<div class="form-group">
    <select name="item" class="form-control" id="exampleFormControlSelect1">
     <?php
	 include'databaseconn.php';
	 $qry = "SELECT * FROM product WHERE usrid='$id'";
	 $resultproduct=mysqli_query($conn,$qry);
	 while($row=mysqli_fetch_array($resultproduct))
	 {
		 echo "<option value='".$row["iname"]."'>".$row["iname"]."--Rs.".$row["price"]."</option>";
	 }
     ?>
    </select>
  </div>


 <!--Quantity input box-->
 <div class="form-floating mb-3 mt-3">
		<input type="number" name="qua" class="form-control"  placeholder="Name" required>
		<label for="quan"  class="form-label">Quantity</label>		
		</div>
		


     <!--addition items and totel buttons-->
	 <div style="text-align:center;">
	 <input type="submit" name="addbill" class="btn btn-outline-success bt" value="Add item">
	  </form>
      <a href="print.php?inv=<?php echo"$inv";?> & name=<?php echo"$cname";?> & mbl=<?php echo"$teliphone";?> & date="><button type="button" class="btn btn-outline-danger bt"><span style="font-weight: bold;">BIll Totel</span ></button></a>
	   </div>
		
	
<!--For Table of selected items-->
<?php
if(isset($_REQUEST["addbill"]))
{
include 'databaseconn.php';
$qry="SELECT * FROM invoice WHERE usrid='$id' AND inv='$inv'";
$result=mysqli_query($conn,$qry);

	
?>

<div class="container mt-5" >
<div class="row">
<table class="table">
  <thead>
    <tr style="text-align:center;">
      <th scope="col"><i class="fas fa-circle"></i></th>
      <th scope="col">ITEM NAME</th>
      <th scope="col">Quantity</th>
      <!--<th scope="col">PRICE</th>-->
      <th scope="col">Amount</th>
	  </tr>
  </thead>
   <tbody>
   <?php $sn=1; while($row=mysqli_fetch_array($result))
   {$item=$row['itname'];
    $quantity=$row['quantity'];
    $amt=$row['amt'];
     ?>
    <tr style="text-align:center;">
      <th scope="row"><?php echo"$sn.";?></th>
      <td><?php echo"$item";?></td>
      <td><?php echo"$quantity";?></td>
      
      <td><?php echo "$amt".". ".'<i class="fas fa-rupee-sign text-muted"></i>';?></td>
    </tr>
   <?php $sn=$sn+1;}?>
  </tbody>	
</table>  
</div>
</div>
<?php
}
?>
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