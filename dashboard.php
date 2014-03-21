<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php 
          ini_set('display_startup_errors',1);
          ini_set('display_errors',1);
          error_reporting(-1);
          include('backend/functions/functions.php');
          session_start();
          ?>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>ShopPin - Dashboard</title>

    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" type="text/css" href="css/metro-bootstrap.css">
      <link rel="stylesheet" href="css/font-awesome.css">
      <!-- documentation styles -->
      <link rel="stylesheet" type="text/css" href="css/docs.css">

    <script src="js/modernizr.custom.js"></script>
  <!-- CSS Reset -->
  <link rel="stylesheet" href="css/reset.css">

  <!-- Global CSS for the page and tiles -->
  <link rel="stylesheet" href="css/main.css">


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/color-styles.css" rel="stylesheet">
    <link href="css/ui-elements.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    
    <!-- Resources -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500,400italic,500italic,700italic' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="body-green">

    

    <div class="navbar navbar-dark navbar-static-top" role="navigation">
      <div class="container">

        <!-- Navbar Header -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><i class="fa fa-th-large"></i> ShopPin </a>

         
       
        </div> <!-- / Navbar Header -->




  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <?php
        if (isset($_SESSION['logged_in'])) {
            if ($_SESSION['logged_in'] == TRUE) {
                    echo '<li><a href="backend/logoff.php" class="pull-right"><i class="fa fa-sign-out"></i> Sign Out</a></li>';
                                        echo'<li><a class="pull-right"><i class="fa fa-user"></i>'. $_SESSION["user"].'</a></li>';

            }
             else{
                    echo '<li><a href="#" data-toggle="modal" data-target="#signupModal" class="pull-right"><i class="fa fa-arrow-circle-down"></i> Sign Up</a></li>';
                    echo '<li><a href="#" data-toggle="modal" data-target="#signinModal" class="pull-right"><i class="fa fa-sign-in"></i> Sign In</a></li>';

        }
      }
      else{
        echo'<li><a href="#" data-toggle="modal" data-target="#signupModal" class="pull-right"><i class="fa fa-arrow-circle-down"></i> Sign Up</a></li>';
        echo '<li><a href="#" data-toggle="modal" data-target="#signinModal" class="pull-right"><i class="fa fa-sign-in"></i> Sign In</a></li>';

      }
          ?>
          <li><a href="#" class="pull-right" id="nav-search"><i class="fa fa-search"></i> Search</a>
          <a href="#" class="pull-right hidden" id="nav-search-close"><i class="fa fa-times"></i></a></li>
      </ul>

          <!-- Search Form -->
          <form class="pull-right hidden navbar-right" role="search" id="nav-search-form">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form></li>
    </div><!-- /.navbar-collapse -->
      </div> <!-- / container -->
    </div> <!-- / navbar -->


<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="Sign In" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
         <div class="sign-form">
                  <div id="error">&nbsp;</div><br> 
              <h3 class="first-child text-center">Sign In To Your Account</h3>
              <hr>
              <form id="loginForm" method="post" action="backend/login_submit.php">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input id="username" name="username" type="text" class="form-control" placeholder="Enter email" data-original-title="" title="">
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input id="password" name="password" type="password" class="form-control" placeholder="Password" data-original-title="" title="">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Remember me
                  </label>
                </div>
                <button type="submit" class="btn btn-color">Submit</button><img id="loading" src="img/loading.gif" alt="working .." />
                <hr>
              </form>
              <p>Not registered? <a href="sign-up-alt.html">Create an Account.</a></p>
              <div class="pwd-lost">
                <div class="pwd-lost-q show">Lost your password? <a href="#">Click here to recover.</a></div>
                <div class="pwd-lost-f hidden">
                  <p class="text-muted">Enter your email address and we will send you a link to reset your password.</p>
                  <form class="form-inline" role="form">
                    <div class="form-group">
                      <label class="sr-only" for="email-pwd">Email address</label>
                      <input type="email" class="form-control" id="email-pwd" placeholder="Enter email">
                    </div>
                    <button type="submit" class="btn btn-color">Send</button>
                  </form>
                </div>
              </div> <!-- / .pwd-lost -->
            </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="Sign Up" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
                    <div class="sign-form">
              <h3 class="first-child text-center">Create New Account</h3>
              <hr>
              <form id="contactform" method="post" action="backend/reg_submit.php">
                <div class="form-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Your name" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Enter your full name here." data-original-title="Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Enter your nickname here." data-original-title="Username">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Enter a valid email here." data-original-title="Email">
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6">
                      <input type="password" class="form-control margin-bottom-xs" id="password" name="password" placeholder="Password" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Three symbols minimum." data-original-title="Password">
                    </div>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" id="repeat-password" placeholder="Repeat Password" data-toggle="popover" data-trigger="focus" data-content="Make sure you still remember it." data-original-title="Repeat Password">
                    </div>
                  </div>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                  </label>
                </div>
                <button type="submit" class="btn btn-color">Create Account</button><img id="loading1" src="img/loading.gif" alt="working .." />
              </form>
                              <div class="done"><h5><font size="10"><font color="#000000"><center>Registration Successful!</center></font></font></h5></div><!--close done--> 
            </div>
      </div>
    </div>
  </div>
</div>


    <!-- Wrapper -->
<div class="wrapper">
    <!-- Dashboard Code -->
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 sidebar">
          <br>
          <br>
                <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Edit Profile</a></li>
            <li><a href="#">Go to Listings</a></li>
            <li><a href="#">Manage Tags</a></li>            
          </ul>
        </div>
        <div class="col-md-10 main">
          <h1 class="page-header">Dashboard</h1>
          <div id="main" role="main">

      <ul id="tiles">
        <!-- These are our grid blocks -->
        <li>
            <div class="thumbnail tile tile-green">
              <a href="#" >
                <br /><br />
                <h3>Automobile</h3>
              </a>
            </div>
        </li>
        <li>
            <div class="thumbnail tile tile-green">
              <a href="#" >
                <br /><br />
                <h3>Books</h3>
              </a>
            </div>
        </li>
        <li>
            <div class="thumbnail tile tile-green">
              <a href="#" >
                <br /><br />
                <h3>Electronics</h3>
              </a>
            </div>
        </li>
        <li>
            <div class="thumbnail tile tile-green">
              <a href="#" >
                <br /><br />
                <h3>Fashion</h3>
              </a>
            </div>
        </li>
        <li>
            <div class="thumbnail tile tile-green">
              <a href="#" >
                <br /><br />
                <h3>Collectibles</h3>
              </a>
            </div>
        </li>
        <li>
            <div class="thumbnail tile tile-green">
              <a href="#" >
                <br /><br />
                <h3>Art</h3>
              </a>
            </div>
        </li>
        <li>
            <div class="thumbnail tile tile-green">
              <a href="#" >
                <br /><br />
                <h3>Crafts</h3>
              </a>
            </div>
        </li>
        <li>
            <div class="thumbnail tile tile-green">
              <a href="#" >
                <br /><br />
                <h3>Home Décor</h3>
              </a>
            </div>
        </li>
        <li>
            <div class="thumbnail tile tile-green">
              <a href="#" >
                <br /><br />
                <h3>Sporting Goods</h3>
              </a>
            </div>
        </li>
        <li>
            <div class="thumbnail tile tile-green">
              <a href="#" >
                <br /><br />
                <h3>Toys</h3>
              </a>
            </div>
        </li>
        <li>
            <div class="thumbnail tile tile-green">
              <a href="#" >
                <br /><br />
                <h3>Kitchen & Dining</h3>
              </a>
            </div>
        </li>
        <li>
            <div class="thumbnail tile tile-green">
              <a href="#" >
                <br /><br />
                <h3>Memoribilia</h3>
              </a>
            </div>
        </li>
        <!-- End of grid blocks -->
      </ul>

    </div>
          

          
          
        </div>
      </div>
  </div>
    <!-- / .End of Dashboard Code -->

</div> <!-- / .wrapper -->

    <!-- Footer -->
    <footer class="footer-dark">
      <div class="container">
        <div class="row">
          <!-- Contact Us -->
          <div class="col-sm-4">
            <h3 class="text-color"><a href="contact-us.html"><span class="border-color">Contact Us</span></a></h3>
            <div class="content">
              <p>
              2811 Archer Road<br />
              Gainesville, FL 32608<br />
              Phone: +0 000 000 00 00<br />
              Fax: +0 000 000 00 00<br />
              Email: <a href="#">sales@shoppin.com</a>
              </p>
            </div>
          </div>
          <!-- Social icons -->
          <div class="col-sm-4">
            <h3 class="text-color"><span>Go Social</span></h3>
            <div class="content social">
              <p>Stay in touch with us:</p>
              <ul class="list-inline">
                  <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="plus"><i class="fa fa-google-plus"></i></a></li>
              </ul>
              <div class="clearfix"></div>
            </div>
          </div>
          <!-- Subscribe -->
          <div class="col-sm-4">
            <h3 class="text-color"><span>Subscribe</span></h3>
            <div class="content">
              <p>Enter your e-mail below to subscribe to our free newsletter.<br />We promise not to bother you often!</p>
              <form class="form" role="form">
                <div class="row">
                  <div class="col-sm-8">
                    <div class="input-group">
                      <label class="sr-only" for="subscribe-email">Email address</label>
                      <input type="email" class="form-control" id="subscribe-email" placeholder="Enter email">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">OK</button>
                      </span>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <hr>
          </div>
        </div>
        <!-- Copyrights -->
        <div class="row">
          <div class="col-sm-12">
            <p>&copy; ShopPin 2014. <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
          </div>
        </div>
      </div>
    </footer>

    
   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scrolltopcontrol.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/script.js"></script>
    <script> 
$(document).ready(function(){ 
  hideshow('loading',0);
  hideshow('loading1',0);
                $('.done').css('visibility','hidden');          

            $('#loginForm').submit(function(e) { 
                login(); 
                e.preventDefault();  
            }); 
            $('#contactform').submit(function(e) { 
                register(); 
                e.preventDefault();  
            });   
        });
</script> 
<script src="js/jquery.min.js"></script>

  <!-- Include the imagesLoaded plug-in -->
  <script src="js/jquery.imagesloaded.js"></script>
 <script src="js/jquery.wookmark.js"></script>

  <!-- Once the page is loaded, initalize the plug-in. -->
  <script type="text/javascript">
    (function ($){
      var $tiles = $('#tiles'),
          $handler = $('li', $tiles),
          $main = $('#main'),
          $window = $(window),
          $document = $(document),
          options = {
            autoResize: true, // This will auto-update the layout when the browser window is resized.
            container: $main, // Optional, used for some extra CSS styling
            offset: 20, // Optional, the distance between grid items
            itemWidth: 210 // Optional, the width of a grid item
          };

      /**
       * Reinitializes the wookmark handler after all images have loaded
       */
      function applyLayout() {
        $tiles.imagesLoaded(function() {
          // Destroy the old handler
          if ($handler.wookmarkInstance) {
            $handler.wookmarkInstance.clear();
          }

          // Create a new layout handler.
          $handler = $('li', $tiles);
          $handler.wookmark(options);
        });
      }

      /**
       * When scrolled all the way to the bottom, add more tiles
       */
      // Call the layout function for the first time
      applyLayout();

      // Capture scroll event.
      $window.bind('scroll.wookmark', onScroll);
    })(jQuery);
  </script>


</body></html>