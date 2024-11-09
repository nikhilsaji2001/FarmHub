<?php


$id=$_GET['id'];

include 'includes/dbconnect.php';

$sq=mysql_query("SELECT * FROM ordermain WHERE orderid='$id'");
$s=mysql_fetch_array($sq);
$long=$s['longitude'];
$lat=$s['latitude'];
$address=$s['orderaddress'];


$sql="delete from markers";
if(mysql_query($sql,$con))
{
$sql="insert into markers values('$id','$address','$address','$long','$lat','')";
if(mysql_query($sql,$con))
	echo "<script>location.href='test/map.html';</script>";
     else
     	{
		  echo"<script>alert('error!');location.href='vorder.php';</script>";
		}
}
else{
	echo"<script>alert('error!');location.href='vorder.php';</script>";
}
?>