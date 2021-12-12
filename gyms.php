<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<!--header starts-->
<header id="header" class="header-scroll top-header headrom">
    <!-- .navbar -->
    <nav class="navbar navbar-dark">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                    data-target="#mainNavbarCollapse">&#9776;
            </button>
            <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/navbarLogo.jpg" alt="">
            </a>
            <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link active" href="gyms.php">GYMs <span
                                    class="sr-only"></span></a></li>

                    <?php
                    if (empty($_SESSION["user_id"])) {
                        echo '<li class="nav-item"><a href="login.php" class="nav-link active">login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">signup</a> </li>';
                    } else {


                        echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">your orders</a> </li>';
                        echo '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';
                    }

                    ?>

                </ul>
            </div>
        </div>
    </nav>

</header>
<div class="page-wrapper">

    <div class="hero bg-image">
        <div class="container"></div>

    </div>
    <div class="result-show">
        <div class="container">
            <div class="row">


            </div>
        </div>
    </div>

    <section class="restaurants-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">


                    <div class="widget clearfix">
                        <!-- /widget heading -->
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Popular tags
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-body">
                            <ul class="tags">
                                <li><a href="#" class="tag">
                                        Dumbbells
                                    </a></li>
                                <li><a href="#" class="tag">
                                        Z - bars
                                    </a></li>
                                <li><a href="#" class="tag">
                                        Barbell
                                    </a></li>
                                <li><a href="#" class="tag">
                                        Elliptical
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end:Widget -->
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                    <div class="bg-gray restaurant-entry">
                        <div class="row">
                            <?php $gyms = mysqli_query($db, "select * from GYM");
                            while ($rows = mysqli_fetch_array($gyms)) {


                                echo ' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="equipment.php?gym_id=' . $rows['gym_id'] . '" > <img src="admin/Gym_img/' . $rows['image'] . '" alt="GYM logo"></a>
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
																<h5><a href="equipment.php?gym_id=' . $rows['gym_id'] . '" >' . $rows['title'] . '</a></h5> <span>' . $rows['address'] . ' <a href="#">...</a></span>
																<ul class="list-inline">
																	<li class="list-inline-item"><i class="fa fa-check"></i> Min $ 10,00</li>
																	<li class="list-inline-item"><i class="fa fa-motorcycle"></i> 30 min</li>
																</ul>
															</div>
															<!-- end:Entry description -->
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																	<div class="right-review">
																		<div class="rating-block"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
																		<p> 245 Reviews</p> <a href="equipment.php?gym_id=' . $rows['gym_id'] . '" class="btn theme-btn-dash">View Menu</a> </div>
																</div>
																<!-- end:right info -->
															</div>';
                            }


                            ?>

                        </div>
                        <!--end:row -->
                    </div>


                </div>


            </div>
        </div>
</div>
</section>
<section class="app-section">
    <div class="app-wrap">
        <div class="container">
            <div class="row text-img-block text-xs-left">
                <div class="container">
                    <div class="col-xs-12 col-sm-6 hidden-xs-down right-image text-center">
                        <figure><img src="images/app.jpg" alt="Right Image" class="img-fluid2"></figure>
                    </div>
                    <div class="col-xs-12 col-sm-6 left-text">
                        <h3>The Fitness App</h3>
                        <p>A year from now you may wish you had started today. Find us on:</p>
                        <div class="social-btns">
                            <a href="#" class="app-btn apple-button clearfix">
                                <div class="pull-left"><i class="fa fa-apple"></i></div>
                                <div class="pull-right"><span class="text">Available on the</span> <span class="text-2">App Store</span>
                                </div>
                            </a>
                            <a href="#" class="app-btn android-button clearfix">
                                <div class="pull-left"><i class="fa fa-android"></i></div>
                                <div class="pull-right"><span class="text">Available on the</span> <span class="text-2">Play store</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- start: FOOTER -->
<footer class="footer">
    <div class="container">
        <!-- top footer statrs -->
        <div class="row top-footer">
            <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                <a href="#"> <img class="img-rounded" src="images/navbarLogo.jpg" alt="Footer logo"> </a> <span>GET Fit! </span>
            </div>
            <div class="col-xs-12 col-sm-2 about color-gray">
                <h5>About Us</h5>
                <ul>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">History</a></li>
                    <li><a href="#">Our Team</a></li>
                    <li><a href="#">We are hiring</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-2 how-it-works-links color-gray">
                <h5>How it Works</h5>
                <ul>
                    <li><a href="#">Enter your location</a></li>
                    <li><a href="#">Choose GYM</a></li>
                    <li><a href="#">Choose equipment</a></li>
                    <li><a href="#">Pay via credit card</a></li>
                    <li><a href="#">Wait for delivery</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-2 pages color-gray">
                <h5>Pages</h5>
                <ul>
                    <li><a href="#">Search results page</a></li>
                    <li><a href="#">User Sing Up Page</a></li>
                    <li><a href="#">Pricing page</a></li>
                    <li><a href="#">Make order</a></li>
                    <li><a href="#">Add to cart</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3 popular-locations color-gray">
                <h5>Popular locations</h5>
                <ul>
                    <li><a href="#">Sarajevo</a></li>
                    <li><a href="#">Split</a></li>
                    <li><a href="#">Tuzla</a></li>
                    <li><a href="#">Sibenik</a></li>
                    <li><a href="#">Zagreb</a></li>
                    <li><a href="#">Brcko</a></li>
                    <li><a href="#">Beograd</a></li>
                    <li><a href="#">New York</a></li>
                    <li><a href="#">Gradacac</a></li>
                    <li><a href="#">Los Angeles</a></li>
                </ul>
            </div>
        </div>
        <!-- top footer ends -->
        <!-- bottom footer statrs -->
        <div class="row bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 payment-options color-gray">
                        <h5>Payment Options</h5>
                        <ul>
                            <li>
                                <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 address color-gray">
                        <h5>Address</h5>
                        <p>Concept design of online orders for workout equipment</p>
                        <h5>Phone: <a href="tel:+080000012222">080 000012 222</a></h5></div>
                    <div class="col-xs-12 col-sm-5 additional-info color-gray">
                        <h5>Additional information</h5>
                        <p>Join with the best personal trainers and begin to change your life.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- bottom footer ends -->
    </div>
</footer>
<!-- end:Footer -->
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<script src="js/jquery.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/animation.min.js"></script>
<script src="js/bootstrap-slider.min.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/headroom.js"></script>
<script src="js/equipmentPicky.min.js"></script>
</body>

</html>