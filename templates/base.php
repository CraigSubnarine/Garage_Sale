<?php
    if(!isset($_SESSION)){
      session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Garage</title>


    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="../css/main.css" rel="stylesheet" type="text/css">

    <!--<link rel="stylesheet" href="../css/style.css">-->


    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/main.js"></script>


</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div id="container" class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="glyphicon glyphicon-menu-hamburger glyphicon-default"></span>
                </button>
                <a class="navbar-brand" href="http://localhost:8080/garage_sale/templates/home.php">Garage</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li>
                      <a href="http://localhost:8080/garage_sale/templates/newitem.php"><span class="glyphicon glyphicon-plus"></span>  New Item</a>
                  </li>
                    <li>
                        <a href="http://localhost:8080/garage_sale/templates/myprofile.php"><span class="glyphicon glyphicon-user"></span>  Profile</a>
                    </li>
                    <li>
                        <a href="http://localhost:8080/garage_sale/templates/home.php"><span class="glyphicon glyphicon-tags"></span>  Sales</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-pushpin"></span>  My Interests</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-info-sign"></span> About Us</a>
                    </li>
                    <li>
                      <a href="http://localhost:8080/garage_sale/"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <hr>
    <!-- Page Content -->
    <div class="container">


    </div>

    <!-- /.container -->
    <hr>
    <!-- Footer -->
    <!-- <footer class="footer-distributed">
    </footer> -->
