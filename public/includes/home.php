<?php
session_start();
if (!isset($_SESSION["uid"]))
    header('location:login.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../static/images/favicon-32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../static/scripts/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../static/css/reset.css">
    <link rel="stylesheet" type="text/css" href="../static/css/home.css">
    <link rel="stylesheet" href="../static/css/footer.css">    
</head>
<body>
    <?php include "navbar2.php" ?>
    <div class="home-body">
        <div class="home-cont">
            <?php include "left.php" ?>
            <div class="center-tab">
                <?php 
                if (isset($_GET["wq"])){
                    $wq = $_GET["wq"];
                    include "$wq.php" ;
                }
                else{
                    include "center.php";
                }
                ?>
            </div>
            <?php include "right.php" ?>
        </div>
    </div>
    <?php include "footer.php" ?>
</body>
</html>