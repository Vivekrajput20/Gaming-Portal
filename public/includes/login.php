<?php
session_start();
if (isset($_SESSION["uid"]))
 header('location:/public/includes/home.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign In</title>
  <link rel="icon" type="image/png" sizes="32x32" href="../static/images/favicon-32.png">
  <link rel="stylesheet" href="../static/css/reset.css">
  <link rel="stylesheet" href="../static/css/signup.css">
  <link rel="stylesheet" href="../static/css/footer.css">
</head>
<body>
 <?php
 $email = $password = "";
 $emailerr = $passerr = "";
 function prepare($data){            
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}
  if ($_SERVER["REQUEST_METHOD"] === "POST")
  {
   if(empty($_POST["email"]))
   {
    $emailerr = "<div class=\"error\">  * Email is required! </div>";
  }
  else{            
    $email = prepare($_POST["email"]);                    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerr = "<div class=\"error\"> Invalid email format </div>";
    }
    else {
      $emailerr="";
      $password = prepare($_POST["pass"]);
      $passHash = hash("sha256" , $password);
      require_once("config.php");
      $conn = new mysqli($servername, $username , $passd , $dbname);
      if($conn->connect_error){
       die("Connection failed: " . $conn->connect_error);
     }

     $sql = "select * From userinfo where email='" . $email . "' and password='" . $passHash . "'";
     $result = $conn->query($sql);
     
     if ($result->num_rows ===1){
      $user = $result->fetch_assoc();
      $_SESSION["uid"] = $user["userid"];
      $_SESSION["email"] = $user["email"];
      $_SESSION["fname"] = $user["fname"];
      $_SESSION["lname"] = $user["lname"];
      $_SESSION["gender"] = $user["gender"];
      $conn->close();
      header('Location: /public/includes/home.php?wq=center');
    }
    else{
      $passerr = "<div class=\"error\"> Wrong Email or Password ! </div>";
    };
  };
};
};
?>
<?php include "navbar.php" ?>
<form id="msform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">    
  <fieldset>
    <h2 class="fs-title">Sign In</h2>
    <div class="login-image"><img src="../static/images/avtar.png"></div>
    <input type="text" name="email" value="<?php echo $email ?>"  placeholder="Email"  />
    <?php echo $emailerr ; ?>
    <input type="password" name="pass"  value="<?php echo $lname ?>"  placeholder="Password"  />
    <?php echo $passerr ; ?>
    <div class="forgot-form"><a href="#"> Forgot your Password?</a></div>
    <input type="submit" name="submit" class="submit action-button" value="Sign In"  />
    <div class="signup-message">Don't have an account? <a href="signup.php">Create Account </a></div>
  </fieldset>
</form>
<?php include "footer.php" ?>
</body>
</html>
