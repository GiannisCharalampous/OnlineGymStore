<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); // connection to db
error_reporting(0);
session_start();

include_once 'product-action.php'; //including controller

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
    <!-- /.navbar -->
</header>
<div class="page-wrapper">
    <?php $gyms = mysqli_query($db, "select * from GYM where gym_id='$_GET[gym_id]'");
    $rows = mysqli_fetch_array($gyms);

    ?>
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                        <div class="image-wrap">
                            <figure><?php echo '<img src="admin/Gym_img/' . $rows['image'] . '" alt="GYM logo">'; ?></figure>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                        <div class="pull-left right-text white-txt">
                            <h6><a href="#" style="color: black"><?php echo $rows['title']; ?></a></h6>
                            <p style="color: black"><?php echo $rows['address']; ?></p>
                            <ul class="nav nav-inline">
                                <li class="nav-item"><a class="nav-link active" style="color: black"
                                                        href="#"><i class="fa fa-check" style="color: black"
                                        ></i> Min
                                        $ 10,00</a></li>
                                <li class="nav-item" style="color: black"><a class="nav-link" style="color: black" href="#">
                                        <i class="fa fa-motorcycle"></i> 30
                                        min</a></li>
                                <li class="nav-item ratings">
                                    <a class="nav-link" href="#"> <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    </span> </a>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- end:Inner page hero -->
    <div class="breadcrumb">
        <div class="container">

        </div>
    </div>
    <div class="container m-t-30">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                <div class="widget widget-cart">
                    <div class="widget-heading">
                        <h3 class="widget-title text-dark">
                            Your Shopping Cart
                        </h3>


                        <div class="clearfix"></div>
                    </div>
                    <div class="order-row bg-white">
                        <div class="widget-body">


                            <?php

                            $item_total = 0;

                            foreach ($_SESSION["cart_item"] as $item)  // fetch items define current into session ID
                            {
                                ?>

                                <div class="title-row">
                                    <?php echo $item["title"]; ?><a
                                            href="equipment.php?gym_id=<?php echo $_GET['gym_id']; ?>&action=remove&id=<?php echo $item["t_id"]; ?>">
                                        <i class="fa fa-trash pull-right"></i></a>
                                </div>

                                <div class="form-group row no-gutter">
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control b-r-0"
                                               value=<?php echo "$" . $item["price"]; ?> readonly id="exampleSelect1">

                                    </div>
                                    <div class="col-xs-4">
                                        <input class="form-control" type="text" readonly
                                               value='<?php echo $item["quantity"]; ?>' id="example-number-input"></div>

                                </div>

                                <?php
                                $item_total += ($item["price"] * $item["quantity"]); // calculating current price into cart
                            }
                            ?>


                        </div>
                    </div>

                    <!-- end:Order row -->

                    <div class="widget-body">
                        <div class="price-wrap text-xs-center">
                            <p>TOTAL</p>
                            <h3 class="value"><strong><?php echo "$" . $item_total; ?></strong></h3>
                            <p>Free Shipping</p>
                            <a href="checkout.php?gym_id=<?php echo $_GET['gym_id']; ?>&action=check"
                               class="btn theme-btn btn-lg">Checkout</a>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">

                <!-- end:Widget menu -->
                <div class="menu-widget" id="2">
                    <div class="widget-heading">
                        <h3 class="widget-title text-dark">
                            POPULAR ORDERS! <a class="btn btn-link pull-right" data-toggle="collapse"
                                                                  href="#popular2" aria-expanded="true">
                                <i class="fa fa-angle-right pull-right"></i>
                                <i class="fa fa-angle-down pull-right"></i>
                            </a>
                        </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="collapse in" id="popular2">
                        <?php // display values and item of food/dishes
                        $stmt = $db->prepare("select * from GYM_Equipment where gym_id='$_GET[gym_id]'");
                        $stmt->execute();
                        $products = $stmt->get_result();
                        if (!empty($products)) {
                            foreach ($products as $product) {
                                ?>
                                <div class="food-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
                                            <form method="post"
                                                  action='equipment.php?gym_id=<?php echo $_GET['gym_id']; ?>&action=add&id=<?php echo $product['t_id']; ?>'>
                                                <div class="rest-logo pull-left">
                                                    <a class="restaurant-logo pull-left"
                                                       href="#"><?php echo '<img src="admin/Gym_img/equipment/' . $product['img'] . '" alt="GYM logo">'; ?></a>
                                                </div>
                                                <!-- end:Logo -->
                                                <div class="rest-descr">
                                                    <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                </div>
                                                <!-- end:Description -->
                                        </div>
                                        <!-- end:col -->
                                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info">
                                            <span class="price pull-left">$<?php echo $product['price']; ?></span>
                                            <input class="b-r-0" type="text" name="quantity" style="margin-left:30px;"
                                                   value="1" size="2"/>
                                            <input type="submit" class="btn theme-btn" style="margin-left:40px;"
                                                   value="Add to cart"/>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-md-12 col-lg-3">
                <div class="sidebar-wrap">
                    <div class="widget clearfix">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Popular tags
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-body">
                            <ul class="tags">
                                <li><a href="#" class="tag">
                                        Coupons
                                    </a></li>
                                <li><a href="#" class="tag">
                                        Discounts
                                    </a></li>
                                <li><a href="#" class="tag">
                                        Deals
                                    </a></li>
                                <li><a href="#" class="tag">
                                        Amazon
                                    </a></li>
                                <li><a href="#" class="tag">
                                        Ebay
                                    </a></li>
                                <li><a href="#" class="tag">
                                        Fashion
                                    </a></li>
                                <li><a href="#" class="tag">
                                        Shoes
                                    </a></li>
                                <li><a href="#" class="tag">
                                        Kids
                                    </a></li>
                                <li><a href="#" class="tag">
                                        Travel
                                    </a></li>
                                <li><a href="#" class="tag">
                                        Hosting
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="app-section">
        <div class="app-wrap">
            <div class="container">
                <div class="row text-img-block text-xs-left">
                    <div class="container">
                        <div class="col-xs-12 col-sm-6 hidden-xs-down right-image text-center">
                            <figure><img class="img-fluid2" src="images/app.jpg" alt="Right Image"></figure>
                        </div>
                        <div class="col-xs-12 col-sm-6 left-text">
                            <h3>The Fitness App</h3>
                            <p>A year from now you may wish you had started today. Find us on:</p>
                            <div class="social-btns">
                                <a href="#" class="app-btn apple-button clearfix">
                                    <div class="pull-left"><i class="fa fa-apple"></i></div>
                                    <div class="pull-right"><span class="text">Available on the</span> <span
                                                class="text-2">App Store</span></div>
                                </a>
                                <a href="#" class="app-btn android-button clearfix">
                                    <div class="pull-left"><i class="fa fa-android"></i></div>
                                    <div class="pull-right"><span class="text">Available on the</span> <span
                                                class="text-2">Play store</span></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row top-footer">
                <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                    <a href="#"> <img class="img-rounded" src="images/navbarLogo.jpg" alt="Footer logo"> </a> <span>GET Fit!</span>
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
<!-- end:page wrapper -->
</div>
<!--/end:Site wrapper -->
<!-- Modal -->
<div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <div class="modal-body cart-addon">
                <div class="food-item white">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <div class="item-img pull-left">
                                <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70"
                                                                                   alt="GYM logo"></a>
                            </div>
                            <div class="rest-descr">
                                <h6><a href="#">Sandwich de Alegranza Grande Men?? (28 - 30 cm.)</a></h6></div>
                        </div>
                        <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"><span
                                    class="price pull-left">$ 2.99</span></div>
                        <div class="col-xs-6 col-sm-4 col-lg-4">
                            <div class="row no-gutter">
                                <div class="col-xs-7">
                                    <select class="form-control b-r-0" id="exampleSelect2">
                                        <option>Size SM</option>
                                        <option>Size LG</option>
                                        <option>Size XL</option>
                                    </select>
                                </div>
                                <div class="col-xs-5">
                                    <input class="form-control" type="number" value="0" id="quant-input-2"></div>
                            </div>
                        </div>
                    </div
                </div>
                <div class="food-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <div class="item-img pull-left">
                                <a class="food-logo pull-left" href="#"><img src="http://placehold.it/70x70"
                                                                                   alt="GYM logo"></a>
                            </div>
                            <!-- end:Logo -->
                            <div class="rest-descr">
                                <h6><a href="#">Sandwich de Alegranza Grande Men?? (28 - 30 cm.)</a></h6></div>
                            <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"><span
                                    class="price pull-left">$ 2.49</span></div>
                        <div class="col-xs-6 col-sm-4 col-lg-4">
                            <div class="row no-gutter">
                                <div class="col-xs-7">
                                    <select class="form-control b-r-0" id="exampleSelect3">
                                        <option>Size SM</option>
                                        <option>Size LG</option>
                                        <option>Size XL</option>
                                    </select>
                                </div>
                                <div class="col-xs-5">
                                    <input class="form-control" type="number" value="0" id="quant-input-3"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end:row -->
                </div>
                <!-- end:Food item -->
                <div class="food-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <div class="item-img pull-left">
                                <a class="food-logo pull-left" href="#"><img src="http://placehold.it/70x70"
                                                                                   alt="GYM logo"></a>
                            </div>
                            <!-- end:Logo -->
                            <div class="rest-descr">
                                <h6><a href="#">Sandwich de Alegranza Grande Men?? (28 - 30 cm.)</a></h6></div>
                            <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"><span
                                    class="price pull-left">$ 1.99</span></div>
                        <div class="col-xs-6 col-sm-4 col-lg-4">
                            <div class="row no-gutter">
                                <div class="col-xs-7">
                                    <select class="form-control b-r-0" id="exampleSelect5">
                                        <option>Size SM</option>
                                        <option>Size LG</option>
                                        <option>Size XL</option>
                                    </select>
                                </div>
                                <div class="col-xs-5">
                                    <input class="form-control" type="number" value="0" id="quant-input-4"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end:row -->
                </div>
                <!-- end:Food item -->
                <div class="food-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <div class="item-img pull-left">
                                <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70"
                                                                                   alt="Food logo"></a>
                            </div>
                            <!-- end:Logo -->
                            <div class="rest-descr">
                                <h6><a href="#">Sandwich de Alegranza Grande Men?? (28 - 30 cm.)</a></h6></div>
                            <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"><span
                                    class="price pull-left">$ 3.15</span></div>
                        <div class="col-xs-6 col-sm-4 col-lg-4">
                            <div class="row no-gutter">
                                <div class="col-xs-7">
                                    <select class="form-control b-r-0" id="exampleSelect6">
                                        <option>Size SM</option>
                                        <option>Size LG</option>
                                        <option>Size XL</option>
                                    </select>
                                </div>
                                <div class="col-xs-5">
                                    <input class="form-control" type="number" value="0" id="quant-input-5"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end:row -->
                </div>
                <!-- end:Food item -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn theme-btn">Add to cart</button>
            </div>
        </div>
    </div>
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
