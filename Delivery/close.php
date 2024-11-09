<?php
  session_start();
  //authorization
  if(!isset($_SESSION['username'])||$_SESSION['user']!='groceryshop')
  {
    echo"<script>alert('You are not authorized to view this page!');</script>";
    echo"<script>location.href='../login.php';</script>";
  }
	include('includes/dbconnect.php');//Database connection
	$id=$_GET['id'];//getting user id 
	$sq=mysql_query("UPDATE items SET itemstatus='0'WHERE itemid='$id'");
	if($sq)
	{
		echo"<script>alert('Item Closed!');</script>";
        //echo"<script>window.history.go(-1);</script>";
		echo"<script>location.href='additem.php';</script>";
	}
?>