<?php
  session_start();
  //authorization
  if(!isset($_SESSION['username'])||$_SESSION['user']!='deliveryboy')
  {
    echo"<script>alert('You are not authorized to view this page!');</script>";
    echo"<script>location.href='../login.php';</script>";
  }
	include('includes/dbconnect.php');//Database connection
	$id=$_GET['id'];//getting user id 
	$sq=mysql_query("UPDATE ordermain SET pstatus='1',dstatus='3' WHERE orderid='$id'");
	if($sq)
	{
		echo"<script>alert('Order Delivered!');</script>";
        //echo"<script>window.history.go(-1);</script>";
		echo"<script>location.href='index.php';</script>";
	}
?>