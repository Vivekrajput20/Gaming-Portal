<?php
require_once("config.php");
$conn = new mysqli($servername, $username, $passd, $dbname);

$result = $conn->query("SELECT gameid, gamename FROM games");

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	?>
	<li><?php echo $rs["gamename"]; ?></li><span class="gaid"><?php echo $rs["gameid"]; ?></span>
	<?php 
}
$conn->close();
?>