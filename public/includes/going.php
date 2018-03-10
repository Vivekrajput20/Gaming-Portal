<?php 
require("config.php");
$conn = new mysqli($servername, $username , $passd , $dbname);
if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
$uid = $_REQUEST["uid"];
$gid = $_REQUEST["gid"];
if (preg_match("/[^0-9]/", $uid)===0 &&  preg_match("/[^0-9]/", $gid) ===0){
	$sql = "select  intrested From events where eventid ='$gid'";
	$result = $conn->query($sql);
	if ($result->num_rows === 1){
		$gdata = $result->fetch_assoc();
		if (substr_count($gdata["intrested"],"&$uid&")===0){
			$sql1 = "update events set intrested = concat(intrested, '$uid' , '&') where eventid = $gid";
			if ($conn->query($sql1)===TRUE){ 
				$result2 = $conn->query($sql);
				if ($result2->num_rows === 1){
					$gdata2 = $result2->fetch_assoc();
					$u = substr_count($gdata2["intrested"],"&");
					$n = $u -2;
					if ($u ===2){
						echo "You are intrested in the event.";
					}
					elseif ($u ===3) {
						echo "You and one other is interested in the event.";
					}
					else{
						echo "You and $n others are interested in the event.";
					}
				}                 
			};
		}
		elseif (substr_count($gdata["intrested"],"&$uid&")=== 1) {
			$sql2 = "update events set intrested = REPLACE(intrested , '&$uid&' , '&') where eventid =$gid";
			if ($conn->query($sql2)===TRUE){
				$result2 = $conn->query($sql);
				if ($result2->num_rows === 1){
					$gdata2 = $result2->fetch_assoc();
					$u = substr_count($gdata2["intrested"],"&");
					$n = $u -1;
					if ($u ===1){
						echo "No interests Yet !";
					}
					elseif ($u ===2) {
						echo "$n person are interested in the event.";
					}
					else{
						echo "$n people are interested in the event.";
					};
				} ;
			};
		};
	};
};
$conn->close();
?>