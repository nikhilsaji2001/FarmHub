<?php


$id=$_GET['id'];

include 'includes/dbconnect.php';
$sql="update ordermain set dstatus='3' where orderid='$id'";
if(mysql_query($sql,$con))
{
	$sql="update ordermain set pstatus='1' where orderid='$id'";
	if(mysql_query($sql,$con))
	{
		
		echo "<script>alert('Order Delivered!');location.href='vorder.php';</script>";
	}
     else
     	{"<script>alert('error!');location.href='vorder.php';</script>";
		}
}
?>