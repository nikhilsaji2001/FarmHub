<?php
  session_start();
  //authorization
  if(!isset($_SESSION['username'])||$_SESSION['user']!='delivery')
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
    <title>Farm Hub</title>
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
                    <h2>Orders</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"> AddItem </li>
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
                        
						<div></div>
						<center><h1></h1></center>
						<table  id="customers">
            <tr id="header">
              
              <th>OrderId</th>
			  <th>ItemName</th>
			  <th>Quantity</th>
			  <th>Total</th>
			  <th>Address</th>
			  <th>Location</th>
			  <th>Action</th>
			  
			  
              
            </tr>
              <?php
              //$c=1;
              //$uid=$_SESSION['userid'];
			  //echo $id;
			  include'includes/dbconnect.php';
			  $uname=$_SESSION['username']; 
			  $sq=mysql_query("select gid from greg where gmailid='$uname'",$con);
				while($row=mysql_fetch_array($sq))
				{
					if($sq)
					{
						
						$id=$row['gid'];
						
					}
				}
				
              $result = mysql_query("SELECT * FROM ordermain WHERE pstatus='0' AND dstatus!='0'",$con);

              while($row = mysql_fetch_array($result))
              {
              ?>
              <tr>
              
			  
              <td><?php echo $row['orderid'];?></td>
			  <td><?php echo $row['orderitem'];?></td>
			  <td><?php echo $row['orderqty'];?></td>
			  <td><?php echo $row['total'];?></td>
			  <td><?php echo $row['orderaddress'];?></td>
			  <?php echo "<td><a href='select.php?id=$row[orderid]' id='approve'>View</a></td>"; ?>
			  <?php
				  // if($row['dstatus']==0)
				  // {
					//   echo "<td><a href='approve.php?id=$row[orderid]' id='approve'>Approve</a></td>";
				  // }
				  if($row['dstatus']==1)
				  {
				      echo "<td><a href='ship.php?id=$row[orderid]'id='approve'>On Route</a></td>";
				  }
				  elseif($row['dstatus']==2)
				  {
					  echo "<td><a href='com.php?id=$row[orderid]'id='approve'>Delivered</a></td>";
				  }
			      
              ?>
			  
              
             <!-- <td><a href="approve.php?id=<?php //echo$row['gmailid'];?>" id="approve" >Approve<a><a href="reject.php?id=<?php //echo$row['gmailid'];?>" id="reject">Reject</a></td>-->
              </tr>
            <?php 
              //$c++;
              }?>
            
          </table>
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
    <!--<script src="js/custom.js"></script>-->
</body>

</html>