<?php

	include_once 'includes/dbh.inc.php';
// display teeth tables and temps which have been entered
// ie. 		teeth table --> int(side/4)+1
//			temp column --> (side%4) + 1
	$read_side = "SELECT side FROM flags";
	$result = mysqli_query($conn, $read_side);
	if(mysqli_num_rows($result)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$side = $row['side'];
		}
	}

	$teeth = $side/4 + 1;
	$side_t = ($side%4) + 1;

	if($teeth>32) $teeth=32;

	for ($i=1; $i <= $teeth; $i++) { 
		$read_tmp = "SELECT * FROM t".$i." ORDER BY t_id DESC LIMIT 1;";
		$result = mysqli_query($conn, $read_tmp);
		echo "<br><b>".$i."</b><br>";
		if(mysqli_num_rows($result)>0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$temp1 = $row['temp1'];
				echo $temp1."	";
				$temp2 = $row['temp2'];
				echo $temp2."	";
				$temp3 = $row['temp3'];
				echo $temp3."	";
				$temp4 = $row['temp4'];
				echo $temp4."	";
			}
		}
		echo "<br>";
	}
	
	//	 USING FLAGS TO TRANSFER TEMP APPROPRIATELY
	// obtain flag and button state
	$read_flg = "SELECT * FROM flags ORDER BY id DESC LIMIT 1 ; ";
	$result = mysqli_query($conn, $read_flg);
	
	
	$resultCheck = mysqli_num_rows($result);
	
	if($resultCheck>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$flag = $row['flag'];
			$button = $row['button'];
			// the arg in [] will take the column you want to show.
		}
	}


	// reseting flag so that new data can be entered. and it is also ensured that button is unpressed
	if(!$button)
	{
		if($flag==1)
		{
			$write_flg = "UPDATE flags SET flag=0 WHERE id='1'";
			mysqli_query($conn, $write_flg);
		}
	}

?>