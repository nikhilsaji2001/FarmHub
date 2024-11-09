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
.search-box{
	margin-top : 10px;
	margin-left : 10px;
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
                    <h2>Items</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Items</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
	
     <form  action="" method="POST">
                            <div class="row search-box" >
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="itemname" placeholder="Enter item name to search"required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								
                                								
                                <div class="col-md-0">
                                    
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" name="register" type="submit">Search</button>
										
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
    <!-- Start Gallery  -->
    <div class="products-box">
        <div class="container">
            
            <!--<div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".bulbs">Bulbs</button>
                            <button data-filter=".fruits">Fruits</button>
							<button data-filter=".podded-vegetables">Podded vegetables</button>
							<button data-filter=".root-and-tuberous">Root and tuberous</button>
                        </div>
                    </div>
                </div>
            </div>-->

            <div class="row special-list">
			    <?php
					  include'includes/dbconnect.php';
					  //$uname=$_SESSION['username']; 
				if(isset($_POST['register']))
				   {
					
					$itemname=$_POST['itemname'];
					
					
					
						
						$sq=mysql_query("select * from items NATURAL JOIN greg where greg.gid=items.gid AND itemstatus='1' AND itemname like '%$itemname%' ",$con);
						while($row = mysql_fetch_array($sq))
					  {?>
					<div class="col-lg-3 col-md-6 special-grid bulbs">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale"><?php echo $row['itemname'];?></p>
                            </div>
                            <img style="height: 200px; width: 300px;" src="../groceryshop/<?php echo $row['itempic'];?>"  class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><p class="sale">Rate :<?php echo $row['itemrate'];?></p></li>
									
                                </ul>
								 <p class="cart" style="color:#fff;">Shop :<?php echo $row['gname'];?></p>
                                <a class="cart" href="order.php?id=<?php echo$row['itemid'];?>">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
			    <?php }	
					
				   }
					else
                    {						
					  $result = mysql_query("SELECT * FROM items NATURAL JOIN greg WHERE greg.gid=items.gid AND itemstatus='1'",$con);

					  while($row = mysql_fetch_array($result))
					  {
                ?>
                <div class="col-lg-3 col-md-6 special-grid bulbs">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale"><?php echo $row['itemname'];?></p>
                            </div>
                            <img src="../groceryshop/<?php echo $row['itempic'];?>" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><p class="sale">Rate :<?php echo $row['itemrate'];?></p></li>
									
                                </ul>
								 <p class="cart" style="color:#fff;">Location :<?php echo $row['gname'];?></p>
                                <a class="cart" href="order.php?id=<?php echo$row['itemid'];?>">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
			    <?php }
					}?>
                

                

                
            </div>
        </div>
    </div>
    <!-- End Gallery  -->

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