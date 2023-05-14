<?php session_start();
if(isset($_SESSION["uid"]))
{
	$id=$_SESSION["uid"];
    $inv=$_REQUEST["inv"];
    $name=$_REQUEST["name"];
    $mbl=$_REQUEST["mbl"];
    $date=$_REQUEST["date"];
include'databaseconn.php';
$qry="SELECT * FROM invoice WHERE usrid='$id' AND inv='$inv'";
$res=mysqli_query($conn,$qry);
	$total=0;
    $n=1;	
	
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Print Bill</title>
  </head>
  <body>
  <h1  class="clearfix"><small><span>DATE-</span><?php echo "$date";?></small><br>INVOICE:<?php echo "$inv";?> </small></h1>
    <table class="table">
  <thead>
  <tr>
            <th>Serial No.</th>
            <th class="desc">Item Name</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
  </thead>		  
		 <tbody>
		  <?php while($row=mysqli_fetch_array($res))
           { $it=$row["itname"]; 
            $quan=$row["quantity"]; 
            $amt=$row["amt"]; 
		   $total=$total+$amt; 
         echo '<tr>
            <td class="service"> '.$n.' </td>
            <td class="desc">'.$it.'</td>
            <td class="unit">"Price"</td>
            <td class="qty">'.$quan.'</td>
            <td class="total">'.$amt.'</td>
          </tr>';
		   $n=$n+1; }?>
		    <tr>
            <td colspan="4" class="grand total"><h6>GRAND TOTAL</h6></td>
            <td class="grand total"><?php echo"$total";?></td>
          </tr>
        </tbody>
          
</table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>




<?php }else{header("Location:login.php");} ?>