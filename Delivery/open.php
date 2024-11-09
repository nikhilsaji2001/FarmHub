<?php
 
	include('includes/dbconnect.php');//Database connection
	$id=$_GET['id'];//getting user id 
	$sq=mysql_query("UPDATE items SET itemstatus='1'WHERE itemid='$id'");
	if($sq)
	{
		echo"<script>alert('Item Opened!');</script>";
        //echo"<script>window.history.go(-1);</script>";
		echo"<script>location.href='additem.php';</script>";
	}
?>