<?php
session_start();
if (!isset($_SESSION["uid"]))
	header('location:login.php');
?>	
<div class="center-cont">
	<div class="center-top event-top"></div>
	<div class="center-mid">
		<?php require("event-mid.php") ?>
	</div>
</div>
<script type="text/javascript" src="../static/scripts/center.js"></script>