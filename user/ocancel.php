<?php
  session_start();
  //authorization
  if(!isset($_SESSION['username'])||$_SESSION['user']!='user')
  {
    echo"<script>alert('You are not authorized to view this page!');</script>";
    echo"<script>location.href='../login.php';</script>";
  }
	include('includes/dbconnect.php');//Database connection
	//getting user id 
	
		echo"<script>alert('Order Cancelled!');</script>";
        //echo"<script>window.history.go(-1);</script>";
		echo"<script>location.href='index.php';</script>";

?>