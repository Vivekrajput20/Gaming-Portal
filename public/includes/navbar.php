<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../static/css/navbar.css">
<div class="nav-container">  
   <div class="navbar">
      <div class="nav-left">
         <div class="logo">
            <a href="../index.php">
               <img id="logo-img" src="../static/images/gp.png">
            </a>
         </div>
         <div class="nav-heading">Gaming Portal</div>
      </div>
      <form class="form-inline login-form" action="login.php" method="POST">      
         <div class="nav-menu">
            <div class="nav-form">
               <div>
                  <input type="text" placeholder="Email or Phone" class=" login-textc transp" name="email" id="email">
                  <input type="password" placeholder="password" class=" login-textc transp" id="pwd" name="pass">
               </div>
               <div class="forgot">Forgotten Password ?</div>
            </div>
            <button type="submit" class="submit-button transp">
               <i class="fa fa-sign-in" aria-hidden="true"></i>
               Login
            </button>            
         </div>
      </form>
      <div class="menu" onclick="menu();">
         <div class="bar"></div>
         <div class="bar"></div>
         <div class="bar"></div>
      </div>
   </div>
   <form class="mobile-form" action="login.php" method="POST">
      <div class="menu-mobile" id="men">         
         <input type="text" placeholder="Email or Phone" class=" login-textm transp" name="email" id="email">
         <input type="password" placeholder="password" class=" login-textm transp" id="pwd" name="pass"> 
         <div class="forgot">Forgotten Password ?</div>
         <button  type="submit" class="submit-button transp">Login</button>            
      </div>
   </form>
</div>
<script type="text/javascript" src="../static/scripts/navbar.js">
</script>