<?php
session_start();
if (!isset($_SESSION["uid"]))
   header('location:login.php');
?> 
<link rel="stylesheet" type="text/css" href="../static/css/navbar2.css">
<div class="nav-container">
   <div class="navbar">
      <div class="nav-left">
         <a href="home.php">
            <img id="logo-img" src="../static/images/gp.png">
         </a>
      </div>
      <div class="nav-menu">
         <div>
            <form class="search-form" action="search.php" method="POST" onclick="alert('Under Development. Coming Soon!');">      
               <input type="text" placeholder="Search Something" class=" login-textc " name="email" id="email">  
            </form>
         </div>
         <div class="nav-cont">
            <a href="addgame.php"><div>Suggest Game</div></a>
            <a href="addevent.php"><div>Add Event</div></a>
            <a href="logout.php"><div>Logout</div></a>
         </div>        
      </div>
      <div class="menu" onclick="menu();">
         <div class="bar"></div>
         <div class="bar"></div>
         <div class="bar"></div>
      </div>
   </div>
   <form class="mobile-form" action="login.php" method="POST">
      <div class="menu-mobile" id="men">         
         <input type="text" placeholder="Search Something" class=" login-textm transp" name="email" id="email">
         <button onclick="alert('Under Development. Coming Soon!');"  type="submit" class="mob-search-btn transp">Search</button> 
         <div class="mob-f-d"><a href="addgame.php">Suggest Game</a></div>
         <div class="mob-f-d"><a href="addevent.php">Add Event</a></div>
         <div class="mob-f-d"><a href="logout.php">Logout</a></div>                           
      </div>
   </form>
</div>
<script type="text/javascript" src="../static/scripts/navbar.js">
</script>
