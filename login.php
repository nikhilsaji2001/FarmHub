<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Farm_Hub</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <?php
	include'includes/head.php';
	?>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Login</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"> Login </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
<?php
if(isset($_POST['login']))
{
	$username=$_POST['uname'];
	$password=$_POST['pswd'];    //md5($_POST['pswd']);
	include('includes/dbconnect.php');
	$result = mysql_query("SELECT * FROM login WHERE username='$username'AND password='$password'",$con);
	$flag=0;
	$status='3';
	if($result)
	{
		while($row = mysql_fetch_array($result))
		{
	       $status=$row['status'];
	  	   if($status==1)
	       {
	        $flag=1;
	  	    session_start();
	        $type=$row['type'];
	  	    $_SESSION['user'] = $type;
	  	    $_SESSION['username'] = $username;
	      }
	  
		}
	}
	if($flag==1 && $type=="admin")
	  echo "<script>location.href='admin/index.php'</script>";
	else if($flag==1 && $type=="user")
	  echo "<script>location.href='user/index.php'</script>";
  else if($flag==1 && $type=="groceryshop")
    echo "<script>location.href='groceryshop/index.php'</script>";
  else if($flag==1 && $type=="delivery")
    echo "<script>location.href='delivery/index.php'</script>";
  
  else if($status=='0')
    echo "<script>location.href='login.php?msg=Your account is not validated'</script>";
  else if($status=='2')
  {
    echo "<script>location.href='login.php?msg=Request for your account is rejected'</script>";
  }
	else
	   echo "<script>location.href='login.php?msg=Invalid Username or Password'</script>";
    mysql_close($con);
}
?>
    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <form  action="" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="uname" placeholder="User Name" required data-error="Please enter user name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Your Password" id="email" class="form-control" name="pswd" required data-error="Please enter your Password">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                               <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="name" placeholder="Subject" required data-error="Please enter your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>-->
                                <div class="col-md-12">
                                    
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" name="login" type="submit">Login</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				
            </div>
        </div>
    </div>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
    
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <?php
	include'includes/footer1.php';
	?>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>