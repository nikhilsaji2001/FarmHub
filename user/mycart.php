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
        .order-container {
            display: flex;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .product-image {
            flex: 0 0 30%; /* 30% width for product image */
            padding: 20px;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
        }

        .product-details {
            flex: 0 0 40%; /* 40% width for product details */
            padding: 20px;
        }

        .order-details {
            flex: 0 0 30%; /* 30% width for order details */
            padding: 20px;
        }

        @media (max-width: 768px) {
            .order-container {
                flex-direction: column; /* Stack items vertically on small screens */
            }

            .product-image,
            .product-details,
            .order-details {
                flex: 1 1 100%; /* Full width for each item on small screens */
            }
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
                    <h2>My Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Requests </li>
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
            <?php
            include 'includes/dbconnect.php';
            $user = $_SESSION['username'];
            $result = mysql_query("SELECT * FROM ureg WHERE umailid='$user'");
            while ($row = mysql_fetch_array($result))
                $usid = $row['uid'];
            $result = mysql_query("SELECT * FROM ureg NATURAL JOIN ordermain WHERE ureg.uid=ordermain.uid AND ordermain.uid='$usid' ORDER BY ordermain.dstatus");
            while ($row = mysql_fetch_array($result)) {
                ?>
                <div class="col-lg-12">
                    <div class="order-container">
                        <div class="product-image">
                            <img src="../groceryshop/<?php echo $row['pimg']; ?>" alt="Product Image"  width="200" height="200">
                        </div>
                        <div class="product-details">
                        <?php $pid= $row['pid']; ?>
                            <table>
                                <tr>
                                    <th>OrderId</th>
                                    <td><?php echo $row['orderid']; ?></td>
                                </tr>
                                <tr>
                                    <th>Item</th>
                                    <td><?php echo $row['orderitem']; ?></td>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <td><?php echo $row['orderqty']; ?></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td><?php echo $row['total']; ?></td>
                                </tr>
                                <tr>
                                    <th>Payment Status</th>
                                    <td><?php echo $row['pstatus'] == 0 ? "Not Payed" : "Payed"; ?></td>
                                </tr>
                                <tr>
                                    <th>Order Status</th>
                                    <td>
                                        <?php
                                        if ($row['dstatus'] == 0) {
                                            echo "Not Approved";
                                        } else if ($row['dstatus'] == 1) {
                                            echo "Approved";
                                        } else if ($row['dstatus'] == 2) {
                                            echo "On Route. The item will be delivered within 2 Days";
                                        } else {
                                            echo "Delivered";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Ordered Date</th>
                                    <td><?php echo $row['date']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="order-details">
                            <p>
                                <?php
                                if ($row['pstatus'] == 0) {
                                    echo "<a href='cancel.php?id=$row[orderid]' id='reject'>Cancel</a>";
                                } else {
                                    echo "You can't cancel the order. Already Delivered"; ?><br>
                                <form method="POST">
                                    <input type="text" name="review" placeholder="Add Your Review" style="padding: 10px; width: 300px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; margin-bottom: 10px;">
                                    <input type="submit" value="Review" name="submit" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                                </form>
                                    <?php
                                          if(isset($_POST['submit']))
                                          {
                                            $msg=$_POST['review'];     
                                            $sql="INSERT INTO review (pid,review)VALUES ('$pid','$msg')";
                                             if(mysql_query($sql,$con))
                                              {
                                                echo"<script>alert('Review Added');</script>";
                                              }
                                          }



                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
    <!-- <script src="js/custom.js"></script>-->
</body>

</html>