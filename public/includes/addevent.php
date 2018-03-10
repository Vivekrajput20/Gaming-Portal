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
	<title>Add Event</title>
	<link rel="stylesheet" type="text/css" href="../static/css/reset.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/png" sizes="32x32" href="../static/images/favicon-32.png">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../static/css/addgame.css">
	<link rel="stylesheet" href="../static/css/footer.css">
	<?php
	if (isset($_GET["gid"]) && isset($_GET["gname"])){
		$gn = $_GET["gname"];
		$gi = $_GET["gid"];
	}
	else{
		$gn ="";
		$gi = "";
	}
	if ($_SERVER["REQUEST_METHOD"]=== "POST"){
		function prepare($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			$data = str_replace("'", "&#039;", $data);
			return $data;
		}
		$gamename = prepare($_POST["gamename"]);
		$eventype = prepare($_POST["eventype"]);
		$numplayer =prepare($_POST["players"]);
		$gamid = prepare($_POST["gid"]);
		$place = prepare($_POST["place"]);
		$describe = prepare($_POST["describe"]);
		$things = prepare($_POST["things"]);
		$date = prepare($_POST["date"]);
		$time = prepare($_POST["time"]);
		$today = date("Y-m-d") ;
		$ctime = date("H:i");
		if ($numplayer>0 && $numplayer<999){
			$numerr = "";
			if(($today < $date) || ($today == $date && $ctime < $time )){
				$daterr="";
				require_once("config.php");
				$conn = new mysqli($servername , $username , $passd , $dbname) ;
				if ($conn->connect_error){
					die("Connection failed " . $conn->connect_error );
				}
				$result = $conn->query("SELECT gameid, gamename FROM games where gameid = $gamid");
				if ($result->num_rows === 1 ){
					$row = $result->fetch_assoc();
					if (strtolower($gamename) === strtolower($row["gamename"])){
						$sql = "insert into events(gamename, place, noplayer , required , description , userid ,  date , time, type , gameid , intrested) values ('$gamename' , '$place' , '$numplayer' , '$things' , '$describe' , '" . $_SESSION["uid"] . "' , '$date', '$time' , '$eventype' , '$gamid' , '&')";
						if ($conn->query($sql)===TRUE){
							$conn->close();
							header('location:home.php?wq=event');
						}
						else {
							echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}
				}
				else{
					$nameerr = "<div class='error'>Game does not exist in our database!</div>";
				}
				$conn->close();
			}
			else{
				$daterr = "<div class='error'>Invalid Date. Events can't be created for past!</div>";
			}
		}
		else{
			$numerr = "<div class='error'> Maximum number of players can only be integers</div>";
		}
	}
	?>
</head>
<body>
	<?php include "navbar2.php" ?>
	<div class="container">
	</script> 
	<form method="POST" class="info-form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="form-head">Create An Event</div>
		<input type="text"  autocomplete="off" placeholder="Name of the Game" value="<?php echo $gn ?>" name="gamename"     class="game-input chosen-value" required>
		<input type="hidden" name="gid" value="<?php echo $gi ?>" class="gamid">
		<ul class="value-list">
			<?php require_once("gamename.php") ?>  
		</ul>
		<?php echo $nameerr ?>
		<div class="select-div">
			<select name="eventype" class="event-select" required>
				<option>Real Life Event</option>
				<option>Online Event</option>
			</select>
		</div>
		<input type="text" value="" class="place" placeholder="Place Of Event" name="place" required>
		<input type="text" name="players" value="" placeholder="Maximum number of players (like 5,10 or 20)" required>
		<?php echo $numerr ?> 
		<input type="text" value="" name="things" placeholder="Things required (like: racquet, bat)">             
		<div class="form-subhead fff">Date And Time Of Event</div>
		<input type="Date" value="" placeholder="Date (mm/dd/yyyy)" name="date" required>
		<?php echo $daterr ?> 
		<input type="Time" value="" placeholder="Place Of Event" name="time" required>
		<textarea rows="3" cols="55" wrap="hard" name="describe" placeholder="Anything else you want to mention? Like Contact info."><?php $_SESSION["gameArray"]["describe"]?></textarea>	
		<input type="submit" class="submit-btn"  value="Create Event" name="submit">
	</form>
</div>
<?php include "footer.php" ?>
<script src="../static/scripts/addevent.js"></script>
</body>
</html>