<?php
session_start();
if (!isset($_SESSION["uid"]))
	header('location:login.php');
?>	
<div class="right-tab">
	<div class="right-child">
		<div class="right-child-head">Ongoing Events</div>
		<div class="g-events">
			<?php 
			require("config.php");
			$conn = new mysqli($servername, $username , $passd , $dbname);
			if($conn->connect_error){
				die("Connection failed: " . $conn->connect_error);
			}
			$sql = "select date , time, gameid, gamename , place From events order by date ASC";
			$result = $conn->query($sql);
			if ($result->num_rows >0){
				$i = 0;

				while(($row = $result->fetch_assoc()) && $i<5 ) {
					$today = date("Y-m-d");
					$ctime = date("H:i");
					$date = $row["date"];
					$time = $row["time"];
					$d2 = date_create($date);
					if (($today < $date) || ($today == $date && $ctime < $time )){
						?>

						<div class="event-items"><a href="home.php?wq=game&eid=<?php echo $row['gameid'] ?>"><div class="event-date"><?php echo date_format($d2,"d-M-y") ?></div><div class="event-name"><?php echo $row["gamename"] . ", " . $row["place"] ?></div>
						</a>
					</div>
					<?php
					$i++;
				}
			};
		}
		$conn->close();
		?>
	</div>
</div>
<div class="right-child">
	<div class="right-child-head">Gaming Events Around the country</div>
	<div class="g-events">
		<div class="event-items">
			<a href="http://iimamritsar.ac.in/aarunya17/">
				<div class="event-date">3<sup>rd</sup>-4<sup>th</sup> Feb, 18</div>
				<div class="event-name">Aarunya, IIM Amritsar</div>
			</a>
		</div>
		<div class="event-items">
			<a href="https://cognizance.org.in/">
				<div class="event-date">23<sup>rd</sup>-25<sup>th</sup> Mar, 18</div>	
				<div class="event-name">Cognizance, IITR</div>
			</a>
		</div>
		<div class="event-items">
			<a href="">
				<div class="event-date"></div>
				<div class="event-name"></div>
			</a>
		</div>			
	</div>
</div>	
</div>