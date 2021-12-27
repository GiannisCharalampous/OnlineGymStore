<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
    <link href="css/style.css?version=51" rel="stylesheet">
</head>
<!-- ?version=51 -->

<body class="home">

<!--header starts-->
<header id="header" class="header-scroll top-header headrom">
    <!-- .navbar -->
    <nav class="navbar navbar-dark">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                    data-target="#mainNavbarCollapse">&#9776;
            </button>
            <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/navbarLogo.jpg" alt=""> </a>
            <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link active" href="gyms.php">GYMs <span
                                    class="sr-only"></span></a></li>


                    <?php
                    if (empty($_SESSION["user_id"])) // if user is not login
                    {
                        echo '<li class="nav-item"><a href="login.php" class="nav-link active">login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">signup</a> </li>';
                    } else {
                        //if user is login

                        echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">your orders</a></li>';
                        echo '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';
                    }

                    ?>

                </ul>

            </div>
        </div>
    </nav>
    <!-- /.navbar -->
</header>
<!-- banner part starts -->

<section class="hero bg-image" style="background: url(images/img/main.jpeg) no-repeat; display: block;">
    <div class="hero-inner">
        <div class="container text-center hero-text font-white">
            <h1>Let's get shredded</h1>
            <h5 class="font-white space-xs">Search for fitness centers and order gym equipment for free</h5>
            <div class="banner-form">
                <form class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputAmount">I would like to find....</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" id="exampleInputAmount"
                                   placeholder="I would like to find...."></div>
                    </div>
                    <button onclick="location.href='gyms.php'" type="button" class="btn theme-btn btn-lg">
                        Search
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!--end:Hero inner -->
</section>
<!-- banner part ends -->


<!-- Popular block starts -->
<section class="popular">
    <div class="container">
        <div class="title text-xs-center m-b-30">
            <h2>You will find the best quality of workout equipment</h2>
            <p class="lead">The easiest way to build an aesthetic body</p>
        </div>
        <div class="row">

            <?php
            // fetch records from database to display popular first 3 equipment from table
            $query_res = mysqli_query($db, "select * from gym_equipment LIMIT 3");
            while ($r = mysqli_fetch_array($query_res)) {

                echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
														<div class="food-item-wrap">
															<div class="figure-wrap bg-image" style="background:url(admin/Gym_img/equipment/gymEquipment.jpeg) no-repeat;">
																<div class="distance"><i class="fa fa-pin"></i>1240m</div>
																<div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
																<div class="review pull-right"><a style="color: blue; font-size: 17px;" href="#">198 reviews</a> </div>
															</div>
															<div class="content">
																<h5><a href="equipment.php?gym_id=' . $r['gym_id'] . '">' . $r['title'] . '</a></h5>
																<div class="price-btn-block"> <span class="price">$' . $r['price'] . '</span> <a href="equipment.php?gym_id=' . $r['gym_id'] . '" class="btn theme-btn-dash pull-right">Order Now</a> </div>
															</div>
														</div>
												</div>';

            }
            ?>

        </div>
    </div>
</section>

<!-- Featured restaurants starts -->
<section class="featured-restaurants" style="background: url(images/wall.jpg) no-repeat; width: 100%; height: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="title-block pull-left">
                    <h4>All fitness centers' URLs:</h4></div>
            </div>
            <div class="col-sm-8">
                <!-- restaurants filter nav starts -->
                <div class="restaurants-filter pull-right">
                    <nav class="primary pull-left">
                        <ul>
                            <?php
                            // display categories here
                            $res = mysqli_query($db, "select * from GYM");
                            while ($row = mysqli_fetch_array($res)) {
                                echo '<li><a href="#" style="text-transform: lowercase;" data-filter=".' . $row['title'] . '"> ' . $row['url'] . '</a> </li>';
                            }
                            ?>

                        </ul>
                    </nav>
                </div>

            </div>
        </div>

    </div>
</section>
<!-- Featured restaurants ends -->
<section class="app-section">
    <div class="app-wrap">
        <div class="container">
            <div class="row text-img-block text-xs-left">
                <div class="container">
                    <div class="col-xs-12 col-sm-5 right-image text-center">
                        <figure><img src="images/app.jpg" alt="Right Image" class="img-fluid2"></figure>
                    </div>
                    <div class="col-xs-12 col-sm-7 left-text">
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
                <a href="#"> <img class="img-rounded" src="images/navbarLogo.jpg" alt="Footer logo"> </a> <span>Become Fit!</span>
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
        <div class="bottom-footer">
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
        <!-- bottom footer ends -->
    </div>
</footer>
<!-- end:Footer -->

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