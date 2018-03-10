<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
   <title>Gaming Portal</title>
   <link rel="icon" type="image/png" sizes="32x32" href="./static/images/favicon-32.png">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="static/css/reset.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="static/scripts/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="static/css/index.css">
<link rel="stylesheet" type="text/css" href="static/css/footer.css">
<body>
   <div class="nav-container">
      <div class="navbar">
         <div class="navbar-left">
            <div class="logo">
               <img id="logo-img" src="static/images/gp.png">
            </div>
            <div class="nav-heading">Gaming Portal</div>
         </div>
         <div class="nav-menu">            
            <div class="nav-link nl1">
               <a href="#home">Home </a>
            </div>
            <div class="nav-link nl2">
               <a href="#game">Games</a>
            </div>
            <div class="nav-link nl3">
               <a href="#event">Events</a>
            </div>
            <div class="nav-link nl4">
               <a href="includes/signup.php">
                  <i class="fa fa-user-plus" aria-hidden="true"></i>
                  Sign up
               </a>
            </div>
            <div class="nav-link nl5">
               <a href="includes/login.php">
                  <i class="fa fa-sign-in" aria-hidden="true"></i>
               </a>
            </div>
         </div>
         <div class="menu" onclick="menu();">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
         </div>
      </div>
      <div class="menu-mobile" id="men">
         <a href="#top">
            <div>Home</div>
            <a href="#pra">
               <div>Games</div>
            </a>
            <a href="#vis">
               <div>Events</div>
            </a>
            <a href="includes/signup.php">
               <DIV>Login</DIV>
            </a>
         </div>
      </div>
      <script type="text/javascript" src="static/scripts/navbar.js">
      </script>
      <a name="home" style="position: absolute;"></a>
      <div class="home-div">

         <div class="home">
            <div class="home-child-right">
               <div class="Welcome-head"><span>Welcome To </span><span>Gaming Portal</span></div>
               <div class="welcome-content">
                  <span class="typed-left">We have </span><span class="typed-right"></span>
               </div>
            </div>
         </div>
         <div class="next-div">
            <div class="wrapper">
               <div class="box" data-scroll-speed="0">G</div>
               <div class="box" data-scroll-speed="0">A</div>
               <div class="box" data-scroll-speed="0">M</div>
               <div class="box" data-scroll-speed="0">E</div>
               <div class="box" data-scroll-speed="0">S</div>
            </div>
         </div>
      </div>
      <a name="game" class="event-fix"> </a>
      <div class="game-div" >
         <div class="game-filter gf1"></div>                   
         <div class="game-filter gf2"></div>
         <div class="game-filter gf3"></div>                   
         <div class="game-filter gf4"></div>
         <div class="game-filter gf5"></div>
         <div class="game-overlay">
            <div class="gc gc-left">&lt;</div>
            <?php include "includes/game-label.php" ?>
            <div class="gc gc-right">  &gt;</div>
         </div>
      </div>
      <a name="event" class="event-fix"></a>
      <div class="event-div">
         <div class="event-cont">
            <div class="event-head">Events</div>
            <div class="event-body">
               <div>Since the launch of Gaming Portal
               </div>               
               <div class="typed-parent">
                  <div class="event-typed"></div>
               </div>
               <div class="event-foot"><a href="#"> Let's Play a game with Us </a></div>
            </div>
         </div>
      </div>
      <div class="join-us">
         <a name="join"></a>
         <a href="includes/signup.php"><div class="join">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
         Join Us !</div></a>
      </div>
      <?php include "includes/footer.php" ?>
      <span id="media-check"></span>
      <script src="static/scripts/typed.min.js"></script>
      <script type="text/javascript" src="static/scripts/index.js"></script>
   </body>
   </html>
