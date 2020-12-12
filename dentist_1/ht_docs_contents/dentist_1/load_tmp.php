<?php
	include_once 'includes/dbh.inc.php';
	//include_once 'includes/delete_tmp';



	$read_tmp = "SELECT * FROM temp ";
	$result = mysqli_query($conn, $read_tmp);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			
			$temp = $row['temp'];
			echo $temp."<br>";     // the arg in [] ill take the column you want to show.
		}
	}

	// query to obtain button and flag values
	$read_flg = "SELECT * FROM flag ORDER BY id DESC LIMIT 1 ; ";
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

	if(!$button)
	{
		if($flag==1)
		{
			//$read_tmp = "SELECT * FROM temp ORDER BY id DESC LIMIT 1 ";
			/*
			$read_tmp = "SELECT * FROM temp ";
			$result = mysqli_query($conn, $read_tmp);
			$resultCheck = mysqli_num_rows($result);

			if($resultCheck>0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					
					$temp = $row['temp'];
					echo $temp."<br>";     // the arg in [] will take the column you want to show.
				}
			}
			*/

			$write_flg = "UPDATE flag SET flag=0 WHERE id='1'";
			mysqli_query($conn, $write_flg);
		}
	}

	
?>