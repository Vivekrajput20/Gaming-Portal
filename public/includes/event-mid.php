		<?php 
		require("config.php");
		$conn = new mysqli($servername, $username , $passd , $dbname);
		if($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}
		if (isset($_GET["eid"])){
			$wq = $_GET["eid"];
			if (preg_match("/[^0-9]/", $wq)===0){
				$sql = "select * From events where gameid = '$wq' ";
			}
			else{
				$sql = "select * From events order by date ASC";
			}
		}
		else{
			$sql = "select * From events order by date ASC";
		}
		$result = $conn->query($sql);
		if ($result->num_rows >0){
			while(($row = $result->fetch_assoc()) ) {
				$today = date("Y-m-d");
				$ctime = date("H:i");
				$date = $row["date"];
				$time = $row["time"];
				$d2 = date_create($date);
				$t2 = date_create($time);
				if (($today < $date) || ($today == $date && $ctime < $time )){
					?>
					<div class="game-div">
						<div class="game-name event-name">
							<a href="#"><?php echo $row["gamename"]; ?> Event</a>
							<a href="#">
								Event by: 
								<?php 
								$sql1 = "select fname From userinfo where userid = " . $row["userid"];
								$result1 = $conn->query($sql1);
								if ($result1->num_rows ===1){
									$row1 = $result1->fetch_assoc();
									echo $row1["fname"];
								};
								?>
							</a>
						</div>
						<div class="game-body">
							<div class="game-body-top">
								<?php if ($row["type"] != ""){?>
								<div class="genre game-body-cont">
									<span>
										Event Type : 
									</span>
									<span>
										<?php echo $row["type"]; ?>
									</span>
								</div>
								<?php }; ?>
								<?php if ($row["noplayer"] != ""){?>
								<div class="genre game-body-cont">
									<span>
										Players Required : 
									</span>
									<span>
										<?php echo $row["noplayer"]; ?>
									</span>
								</div>
								<?php }; ?>
								<?php if ($row["required"] != ""){ ?>
								<div class="skills game-body-cont">
									<span>
										Necessary Things  : 
									</span>
									<span>
										<?php echo $row["required"]; ?>
									</span>
								</div>
								<?php }; ?>
								<?php if ($row["time"] != ""){ ?>
								<div class="num-player game-body-cont">
									<span>
										Time: 
									</span>
									<span>
										<?php echo date_format($t2,"h:ia"); ?>
									</span>
								</div>
								<?php }; ?>
								<?php if ($row["date"] != ""){ ?>
								<div class="num-player game-body-cont">
									<span>
										Date: 
									</span>
									<span>
										<?php echo date_format($d2,"d-M-y") . " (". date_format($d2,"D") .")" ?>
									</span>
								</div>
								<?php }; ?>
								<?php if ($row["place"] != ""){ ?>
								<div class="num-player game-body-cont">
									<span>
										Place: 
									</span>
									<span>
										<?php echo $row["place"] ?>
									</span>
								</div>
								<?php }; ?>
							</div>
							<?php if ($row["description"] != ""){ ?>
							<div class="descript">
								<div class="desc-det">Additional Details</div>
								<span>
									<?php echo $row["description"]; ?>
								</span>
							</div>
							<?php }; ?>
						</div>
						<div class="game-foot">
							<div class="game-foot-cont">
								<?php 
								$u1 = substr_count($row["intrested"],"&".$_SESSION["uid"]."&");
								if ($u1 === 1){
									?>
									<div class="g-f-c-item g-f-c-item-l g-f-active" onclick="events(<?php echo $_SESSION["uid"] . "," . $row["eventid"] ?>)">
										<i class="fa fa-calendar-check-o" aria-hidden="true"></i>Interested
									</div>
									<?php
								}
								else{
									?>
									<div class="g-f-c-item g-f-c-item-l" onclick="events(<?php echo $_SESSION["uid"] . "," . $row["eventid"] ?>)">
										<i class="fa fa-calendar-check-o" aria-hidden="true"></i>Interested
									</div>
									<?php
								}
								?>
							</div>
							<div class="game-foot-text" id="game-foot-text<?php echo $row["eventid"] ?>">
								<?php 
								$u = substr_count($row["intrested"],"&");
								$n = $u -2;
								if ($u1 === 1){
									if ($u ===2){
										echo "You are interested in the event.";
									}
									elseif ($u ===3) {
										echo "You and one other is interested in the event.";
									}
									else{
										echo "You and $n others are interested in the event.";
									};
								}
								else{
									if ($u ===1){
										echo "No interests Yet !";
									}
									elseif ($u ===2) {
										echo "$n person are interested in the event.";
									}
									else{
										echo "$n people are interested in the event.";
									}
								}
								?>
							</div>							
						</div>
					</div>
					<?php
				};
			};
		}
		else {
			echo "<div class=\"game-div-f game-div\"> No Event For Now! <a href=\"addevent.php\">Create an Event</a></div>";
		}
		$conn->close();x
		?>