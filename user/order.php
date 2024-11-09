<?php
  session_start();
  //authorization
  if(!isset($_SESSION['username'])||$_SESSION['user']!='user')
  {
    echo"<script>alert('You are not authorized to view this page!');</script>";
    echo"<script>location.href='../login.php';</script>";
  }
?>
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
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
#approve {
  background-color: blue;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
#reject {
  
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
#c {
  
  background-color: black;

}
</style>
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
                    <h2>My Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"> Profile </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->


    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                       
						
						<table  id="customers">
            <tr id="header">
              
              
			  
			  
              
            </tr>
              <?php
              //$c=1;
              //$uid=$_SESSION['userid'];
			  //echo $id;
			  include'includes/dbconnect.php';
			  $uname=$_SESSION['username']; 
			  $id=$_GET['id'];
				
              $result = mysql_query("SELECT * FROM items NATURAL JOIN greg WHERE greg.gid=items.gid AND itemid='$id'",$con);

              while($row = mysql_fetch_array($result))
              {
				  $gid=$row['gid']; 
				  $item=$row['itemname'];
				  $rate=$row['itemrate'];
              ?>
              
              
			  
              <form  action="" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        ItemName<input type="text" class="form-control" id="name" name="itemname" value="<?php echo $row['itemname'];?>"  disabled=disabled required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        ItemDetails<input type="text" class="form-control" id="name" name="itemname" value="<?php echo $row['details'];?>"  disabled=disabled required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        ShopName<input type="text" class="form-control" id="name" name="shopname" value="<?php echo $row['gname'];?>"  disabled=disabled >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        ItemRate<input type="text" class="form-control" id="name" name="itemrate"value="<?php echo $row['itemrate'];?>"  disabled=disabled >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <?php $ppic= $row['itempic'];?>
                                <?php $pid= $row['itemid'];?>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="message" name="qty" placeholder="Enter quantity"   required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" name="address" placeholder="Enter Address for Delivery" rows="4"  required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="message" name="long" placeholder="Enter latitude"   required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="message" name="lat" placeholder="Enter Longitude"   required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								
                                <div class="col-md-12">
                                    
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" name="register" type="submit">Book</button>
										<a href="ocancel.php" id="reject" >Cancel Order</a>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
            
            
          </table>
		  <?php
	//include 'includes/dbconnect.php';
	if(isset($_POST['register']))
   {
	//$itemname=$_POST['itemname'];
	$long=$_POST['long'];
	$lat=$_POST['lat'];
	$qty=$_POST['qty'];
	$total=$qty*$rate;
	$address=$_POST['address'];
    $uname=$_SESSION['username'];              //class,subject,pswd,cpswd
    $date=date('y-m-d');
	
	
        
        $sq=mysql_query("select uid from ureg where umailid='$uname'",$con);
        while($row=mysql_fetch_array($sq))
        {
            if($sq)
            {
				
                $id=$row['uid'];
				
            }
        }
		
	 
			
            $sql="INSERT INTO ordermain VALUES ('','$id','$pid','$ppic','$address','$long','$lat','$gid','$item','$qty','$total','0','0','$date')";
            if(mysql_query($sql,$con))
            {
                
                    echo"<script>alert('Item Ordered ');</script>";
                    echo"<script>location.href='mycart.php';</script>";
                
            }
        
    
   }	   
   
	?>
                    </div>
                </div>
				<?php 
              //$c++;
              }?>
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