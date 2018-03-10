<?php
session_start();
if (!isset($_SESSION["uid"]))
	header('location:login.php');
?>	
<div class="center-cont">
	<div class="center-top game-top"></div>
	<div class="center-mid">
		<?php 
		require("config.php");
		$conn = new mysqli($servername, $username , $passd , $dbname);
		if($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "select * From games order by gameid DESC";
		$result = $conn->query($sql);
		if ($result->num_rows >0){
			while(($row = $result->fetch_assoc()) ) {
				?>
				<div class="game-div">
					<div class="game-name">
						<a href="home.php?wq=game&eid=<?php echo $row["gameid"] ?>"><?php echo $row["gamename"]; ?></a>
						<a href="addevent.php?gid=<?php echo $row['gameid'] ?>&gname=<?php echo $row['gamename'] ?>">
							<i class="fa fa-calendar" aria-hidden="true"></i>
							Add Event
						</a>
					</div>
					<div class="game-body">
						<div class="game-body-top">
							<?php if ($row["genre"] != ""){?>
							<div class="genre game-body-cont">
								<span>
									Genre : 
								</span>
								<span>
									<?php echo $row["genre"]; ?>
								</span>
							</div>
							<?php }; ?>
							<?php if ($row["skill"] != ""){ ?>
							<div class="skills game-body-cont">
								<span>
									Skills Required to play  : 
								</span>
								<span>
									<?php echo $row["skill"]; ?>
								</span>
							</div>
							<?php }; ?>
							<?php if ($row["numplayer"] != ""){ ?>
							<div class="num-player game-body-cont">
								<span>
									Players Required : 
								</span>
								<span>
									<?php echo $row["numplayer"]; ?>
								</span>
							</div>
							<?php }; ?>
						</div>
						<?php if ($row["description"] != ""){ ?>
						<div class="descript">
							<span>
								<?php echo $row["description"]; ?>
							</span>
						</div>
						<?php }; ?>
					</div>
					<?php
					if ($row["imgurl"] != ""){
						$imgurl = explode(';', $row["imgurl"] , -1); ?>
						<div class="game-img">
							<div class="game-img-cont gf0" style="background:url('<?php echo $imgurl[0] ?>')"></div>
							<?php
						};
						?>
						</div>
					<div class="game-foot">
						<div class="game-foot-cont">
							<?php 
							$u1 = substr_count($row["upvote"],"&".$_SESSION["uid"]."&");
							if ($u1 === 1){
								?>
								<div class="g-f-c-item g-item g-f-c-item-l g-f-active" onclick="upvote(<?php echo $_SESSION["uid"] . "," . $row["gameid"] ?>)">
									<i class="fa fa-thumbs-up" aria-hidden="true"></i>Upvote
								</div>
								<?php
							}
							else{
								?>
								<div class="g-f-c-item g-item g-f-c-item-l" onclick="upvote(<?php echo $_SESSION["uid"] . "," . $row["gameid"] ?>)">
									<i class="fa fa-thumbs-up" aria-hidden="true"></i>Upvote
								</div>
								<?php
							}
							?>
							<div class="g-f-c-item">
								<a href="home.php?wq=event&eid=<?php echo $row["gameid"] ?>">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									Join an Event
								</a>
							</div>
						</div>
						<div class="game-foot-text" id="game-foot-text<?php echo $row["gameid"] ?>">
							<?php 
							$u = substr_count($row["upvote"],"&");
							$n = $u -2;
							if ($u1 === 1){
								if ($u ===2){
									echo "You have upvoted the game.";
								}
								elseif ($u ===3) {
									echo "You and 1 other upvoted the game.";
								}
								else{
									echo "You and $n others upvoted the game.";
								};
							}
							else{
								if ($u ===1){
									echo "No Upvotes Yet !";
								}
								elseif ($u ===2) {
									echo "$n person upvoted the game.";
								}
								else{
									echo "$n people upvoted the game.";
								}
							}
							?>
						</div>							
					</div>
				</div>
				<?php
			}
		}
		else {
			echo "<div class=\"game-div-f game-div\"> No Games Found.</div>";
		}
		$conn->close();
		?>
	</div>
</div>
<script type="text/javascript" src="../static/scripts/center.js"></script>