<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Freshshop</title>
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
                    <h2>Delivery Boy Registration</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Registration </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
<?php
	include 'includes/dbconnect.php';
	if(isset($_POST['register']))
   {
	$flag=0;           
    $name=$_POST['name'];              //class,subject,pswd,cpswd
    $address=$_POST['address'];
	$email=$_POST['email'];  
    $phno=$_POST['phno'];
	$gender=$_POST['gender'];
	$age=$_POST['age'];
	$qual=$_POST['qual'];
    $password=$_POST['pswd'];
    $cpassword=$_POST['cpswd'];
    //name,email,phno,pswd,cpswd
    if($password!=$cpassword)
        {
            //$error_msg['password']="*Passwords doesn't match";
			echo"<script>alert('The passwords doesnot matching');</script>";
            $flag=1;
        }
	if($flag==0)
    {
        $pass=md5($_POST['pswd']);
        $data="SELECT * FROM dreg natural join login";
        $c=0;
        $sd="SELECT * FROM dreg";
        $p=mysql_query($sd,$con);
        while($row=mysql_fetch_array($p))
        {
            $c++;
        }
        $c++;
        $sq=mysql_query($data,$con);
        while($row=mysql_fetch_array($sq))
        {
            if($row['dmailid']==$email||$row['dphno']==$phno)
            {
                $flag=1;
            }
        }
        if($flag==1)
        {
            echo"<script>alert('This  account already exits');</script>";
        }
        else if($flag==0)
        {
			$target_dir = "images/dcertificates/";
			$target_file=$email.".jpg";
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.$target_file);   
			$file="images/dcertificates/".$target_file; 
			
            $sql="INSERT INTO dreg VALUES ('','$name','$address','$phno','$email','$gender','$age','$qual','$file')";
            if(mysql_query($sql,$con))
            {
                $sql1="INSERT INTO login VALUES ('$email','$password','delivery',1)";
                if(mysql_query($sql1,$con))
                {
                    echo"<script>alert('Account created ! Please login ');</script>";
                    echo"<script>location.href='login.php';</script>";
                }
            }
        }
    }
   }	   
	?>
    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" pattern='[a-zA-Z]{3,30}' title='Min 3 characters and Max 30 characters. Only Letters permitted'required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" name="address" placeholder="Your Address" rows="4" data-error="Write your address" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Your Phno" id="email" class="form-control" name="phno" pattern='[0-9]{10}'title='10 numbers' required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Your gender" id="email" class="form-control" name="gender" required data-error="Please enter your gender">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Your age" id="email" class="form-control" name="age" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Your Highest Qualification" id="email" class="form-control" name="qual" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        Upload Certificate Image(Mentioned in Qualification)
										<input type="file"  id="email" class="form-control" name="fileToUpload"   required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Your Password" id="email" class="form-control" name="pswd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								 <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Confirm Password" id="email" class="form-control" name="cpswd" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" name="register" type="submit">Register</button>
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