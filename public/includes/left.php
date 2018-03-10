<?php
session_start();
if (!isset($_SESSION["uid"]))
	header('location:login.php');
?>	
<div class="left-tab">
	<?php if ($_SESSION["gender"] === "male"){ ?>
	<div class="left-tab-item"><img src="../static/images/umale.jpg"></div>
	<?php }
	else{
		?>
		<div class="left-tab-item"><img src="../static/images/ufemale.jpg"></div>
		<?php } ?>
		<div class="left-tab-item"><?php echo  $_SESSION["fname"] . " " . $_SESSION["lname"] ?> </div>
		<a href="#"  onclick="alert('Under Development. Coming Soon!');"><div class="left-tab-item">Profile</div></a>
		<a href="home.php?wq=center" ><div class="left-tab-item">Games</div></a>	
		<a href="home.php?wq=event" ><div class="left-tab-item">Events</div></a>	
		<a href="#" onclick="alert('Under Development. Coming Soon!');"><div class="left-tab-item">Help</div></a>
		<a href="#" onclick="alert('Under Development. Coming Soon!');"><div class="left-tab-item">Settings</div></a>
		<a href="addgame.php" ><div class="left-tab-item">Suggest Game</div></a>	
		<a href="addevent.php" ><div class="left-tab-item">Add Event</div></a>	
	</div>