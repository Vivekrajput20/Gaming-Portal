<?php
session_start();
if (isset($_SESSION["uid"]))
  header('location:/public/includes/home.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Signup</title>
  <link rel="icon" type="image/png" sizes="32x32" href="../static/images/favicon-32.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <script src="../static/scripts/jquery-3.2.1.min.js"></script>
  <script src='../static/scripts/jquery.easing.min.js'></script>  
  <link rel="stylesheet" href="../static/css/signup.css">
  <link rel="stylesheet" href="../static/css/reset.css">
  <link rel="stylesheet" href="../static/css/footer.css">  
</head>
<body>
  <?php
  $email = $password = $password2 = $fname = $lname = $gender  ="";
  $emailerr = $passerr = $pass2err = $fnameerr = $lnameerr  = $success="";
  $flag1 = $flag2 = $flag3 = $flag4 =$flag5 = 0;  
  function prepare($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if ($_SERVER["REQUEST_METHOD"] === "POST"){
    if(empty($_POST["email"])){
      $emailerr = "<div class=\"error\">  * Email is required! </div>";
    }
    else{
      $email = prepare($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailerr = "<div class=\"error\"> Invalid email format </div>";
      }
      else{
        $emailerr="";
        $flag1 = 1;
      }
    }
    if(empty($_POST["pass"])){
      $passerr = "<div class=\"error\">  * Password is required! </div>";
    }
    else{
      $password = prepare($_POST["pass"]);
      if (strlen($password)<6  && is_string($password)){
        $passerr = "<div class=\"error\"> Your password must be at least 6 characters long.</div>";
      }
      else{
        $passerr="";
        $flag2 = 1;
      }
    }
    if(empty($_POST["cpass"])){
      $pass2err = "<div class=\"error\">  * Confirmation is required! </div>";
    }
    else{
      $password2 = prepare($_POST["cpass"]);
      if ($password !== $password2){
        $pass2err = "<div class=\"error\">Confirm Password do not match Password</div>";
      }
      else{
        $pass2err ="";
        $flag3 = 1;
      } 
    }
    if(empty($_POST["fname"])){
      $fnameerr = "<div class=\"error\">  * First Name is required! </div>";
    }
    else{
      $fname = prepare($_POST["fname"]);
      if (preg_match("/[^a-zA-Z]/", $fname)){
        $fnameerr = "<div class=\"error\"> First Name can't have special characters </div>";
      }
      else{
        $fnameerr ="";
        $flag4 =1;
      }
    }  
    if(empty($_POST["lname"])){
      $lnameerr = "<div class=\"error\">  * Last Name is required! </div>";
    }
    else{
      $lname = prepare($_POST["lname"]);
      if (preg_match("/[^a-zA-Z]/", $lname)){
        $fnameerr = "<div class=\"error\">  Last Name can't have special characters </div>";
      }
      else{
        $fnameerr ="";
        $flag5 =1;
      }
    }
    $gender = prepare($_POST["gender"]);

    if ($flag1 === 1 && $flag2 === 1  && $flag3 ===1 && $flag4 === 1 && $flag5 === 1){
      require_once("config.php");
      $conn = new mysqli($servername, $username , $passd , $dbname);
      if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT email FROM userinfo";
      $result = $conn->query($sql);
      if ($result->num_rows > 0 ){
        while ($row = $result->fetch_assoc()) {
          if (strtolower($email) === strtolower($row["email"])){
            $emailerr = "<div class=\"error\"> Email already exists ! </div>";
            $flag1 = 0;
          }
        }
      }
      if ($flag1 ==1){
        $passHash = hash("sha256" , $password);
        $sql = "INSERT INTO userinfo (email, fname, lname , gender , password)
        VALUES ('$email', '$fname', '$lname' ,  '$gender' , '$passHash')";
        if ($conn->query($sql) === TRUE) {
          $success = "<div class=\"login-message\">Account Successfully Created! <a href=\"login.php\">Login</a> </div>";
        }
        else{
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
      $conn->close(); 
    }
  }
  ?>
  <?php include "navbar.php" ?>
  <!-- multistep form -->
  <form id="msform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">Account Setup</li>
      <li>Personal Details</li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
      <h2 class="fs-title">Create your account</h2>
      <h3 class="fs-subtitle">This is step 1</h3>
      <input type="text" name="email" value="<?php echo $email ?>" placeholder="Email"  />
      <?php echo $emailerr ?>
      <input type="password" name="pass" placeholder="Password" />
      <?php echo $passerr ; ?>
      <input type="password" name="cpass" placeholder="Confirm Password" />
      <?php echo $pass2err ; ?>
      <input type="button" name="next" class="next action-button" value="Next" />
      <?php echo $success ?>
    </fieldset>
    <fieldset>
      <h2 class="fs-title">Personal Details</h2>
      <h3 class="fs-subtitle">We will never sell it</h3>
      <input type="text" name="fname" value="<?php echo $fname ?>"  placeholder="First Name"  />
      <?php echo $fnameerr ; ?>
      <input type="text" name="lname"  value="<?php echo $lname ?>"  placeholder="Last Name"  />
      <?php echo $lnameerr ; ?>
      <div class="gender">
        <input type="radio" class="gen" name="gender" value="male" checked> Male
        <input type="radio" class="gen" name="gender" value="female"> Female
        <input type="radio" class="gen" name="gender" value="other"> Other
      </div>
      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <input type="submit" name="submit" class="submit action-button" value="Submit"  />
    </fieldset>
  </form>
  <script src="../static/scripts/signup.js"></script>
  <?php include "footer.php" ?>
</body>
</html>