<?php
  session_start();
  //authorization
  if(!isset($_SESSION['username'])||$_SESSION['user']!='admin')
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
form {
    margin-top: 100px;
    text-align: center;
  }
  input[type='file'] {
    border: 2px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    width: 250px;
    outline: none;
  }
  input[type='submit'] {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin-top: 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
  }
  input[type='submit']:hover {
    background-color: #45a049;
  }
  .upload-box {
    background-color: #d4d4d4;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 300px;
  }
</style>
</head>

<body>
   
    <?php
	include'includes/head.php';
  include'includes/dbconnect.php';
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
                    <h2>Upload Data</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Requests </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
<form method='POST' enctype='multipart/form-data'>
<center><div class="upload-box">
<b>Upload CSV FILE: </b><br><br><input type='file' name='csv_info' /><br><br>
<input type='submit' name='submit' value='Upload' style="height: 40px; width: 150px; left: 250; top: 250;"/>
</div></center>
</form><br><br>
<?php

if(isset($_POST['submit'])) {
    if($_FILES['csv_info']['name']) {
        $arrFileName = explode('.',$_FILES['csv_info']['name']);
        if($arrFileName[1] == 'csv') {
            $handle = fopen($_FILES['csv_info']['tmp_name'], "r");
            if($handle !== FALSE) {
                // Assuming you have a database connection established
                $mysqli = new mysqli("localhost", "username", "password", "database");
                if ($mysqli->connect_errno) {
                    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                    exit();
                }
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $id = $mysqli->real_escape_string($data[0]);
                    $result = $mysqli->real_escape_string($data[2]);
                    $sql = "UPDATE review SET label='$result' WHERE id='$id'";
                    if ($mysqli->query($sql) === FALSE) {
                        echo "Error updating record: " . $mysqli->error;
                    }
                }
                fclose($handle);
                $mysqli->close();
                echo "CSV file uploaded and records updated successfully!";
            } else {
                echo "Error opening CSV file.";
            }
        } else {
            echo "Invalid file format. Please upload a CSV file.";
        }
    } else {
        echo "No file uploaded.";
    }
}
?>
