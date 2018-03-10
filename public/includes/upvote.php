<?php 
require("config.php");
$conn = new mysqli($servername, $username , $passd , $dbname);
if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
$uid = $_REQUEST["uid"];
$gid = $_REQUEST["gid"];
if (preg_match("/[^0-9]/", $uid)===0 &&  preg_match("/[^0-9]/", $gid) ===0){
	$sql = "select upvote  From games where gameid ='$gid'";
	$result = $conn->query($sql);
	if ($result->num_rows === 1){
		$gdata = $result->fetch_assoc();
		if (substr_count($gdata["upvote"],"&$uid&")===0){
			$sql1 = "update games set upvote = concat(upvote, '$uid' , '&') where gameid = $gid";
			if ($conn->query($sql1)===TRUE){ 
				$result2 = $conn->query($sql);
				if ($result2->num_rows === 1){
					$gdata2 = $result2->fetch_assoc();
					$u = substr_count($gdata2["upvote"],"&");
					$n = $u -2;
					if ($u ===2){
						echo "You have upvoted the game.";
					}
					elseif ($u ===3) {
						echo "You and 1 other upvoted the game.";
					}
					else{
						echo "You and $n others upvoted the game.";
					};
				};        
			};
		}
		elseif (substr_count($gdata["upvote"],"&$uid&")=== 1) {
			$sql2 = "update games set upvote = REPLACE(upvote , '&$uid&' , '&') where gameid =$gid";
			if ($conn->query($sql2)===TRUE){
				$result2 = $conn->query($sql);
				if ($result2->num_rows === 1){
					$gdata2 = $result2->fetch_assoc();
					$u = substr_count($gdata2["upvote"],"&");
					$n = $u -1;
					if ($u ===1){
						echo "No Upvotes Yet !";
					}
					elseif ($u ===2) {
						echo "$n person upvoted the game.";
					}
					else{
						echo "$n people upvoted the game.";
					};
				};
			};
		};
	};
};
$conn->close();
?>