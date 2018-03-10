<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Gaming Portal</title>
</head>
<body>
	<?php
	ini_set('max_execution_time', 300);
	$sum =0 ;
	$count = 0;
	for ($i = 10000 ; $i <= 99999 ; $i++){
		$j =  $i ;
		$ds = 0;
		$rem = 0;
		while ($j !=0){
			$rem = $j%10;
			$ds += $rem ;
			$j = (int)$j/10;
		};
		if ($ds == 41){
			$count += 1;
			if ($i%11 == 0){
				$sum +=1;
			}
		}
	}
	echo "total $count <br> divisible $sum";

	?>
</body>
</html>