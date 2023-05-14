<?php session_start();
if(isset($_SESSION["uid"]))
{ $id=$_SESSION["uid"];
    



if(isset($_REQUEST["inv"]))
	{$no=$_REQUEST["inv"];	
 include 'databaseconn.php';
$qry="DELETE  FROM invoice WHERE usrid='$id' AND inv='$no'";
if(mysqli_query($conn,$qry))
	header("Location:invoice.php");}

    else if(isset($_REQUEST["iname"]))
	{
		$no=$_REQUEST["iname"];	
 include 'databaseconn.php';
$qry="DELETE  FROM product WHERE usrid='$id' AND iname='$no'";
if(mysqli_query($conn,$qry))
	header("Location:view items.php");
		
		
		
		
	}









}
else {header("Location:login.php");}
?>