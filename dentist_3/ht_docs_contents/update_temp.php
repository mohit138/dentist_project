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

	/*	
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
	*/
	
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

$temp1 = null;
$temp2 = null;
$temp3 = null;
$temp4 = null;

?>

<?php


	function get_temp($t) {
		$read_tmp = "SELECT * FROM t".$t." ORDER BY t_id DESC LIMIT 1;";
		$result = mysqli_query($GLOBALS['conn'], $read_tmp);
		if(mysqli_num_rows($result)>0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$GLOBALS['temp1'] = $row['temp1'];
				$GLOBALS['temp2'] = $row['temp2'];
				$GLOBALS['temp3'] = $row['temp3'];
				$GLOBALS['temp4'] = $row['temp4'];
			}
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TEMPERATURES</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
	<title></title>
</head>
<body>
	<!--header>
	<h1>Temperatures of Teeth</h1>
	</header-->
	<div class="container">

		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 1</h2>
					<?php
						get_temp("1");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 2</h2>
					<?php
						get_temp("2");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 3</h2>
					<?php
						get_temp("3");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 4</h2>
					<?php
						get_temp("4");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 5</h2>
					<?php
						get_temp("5");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 6</h2>
					<?php
						get_temp("6");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 7</h2>
					<?php
						get_temp("7");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 8</h2>
					<?php
						get_temp("8");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 9</h2>
					<?php
						get_temp("9");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 10</h2>
					<?php
						get_temp("10");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 11</h2>
					<?php
						get_temp("11");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 12</h2>
					<?php
						get_temp("12");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 13</h2>
					<?php
						get_temp("13");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 14</h2>
					<?php
						get_temp("14");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 15</h2>
					<?php
						get_temp("15");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 16</h2>
					<?php
						get_temp("16");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 17</h2>
					<?php
						get_temp("17");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 18</h2>
					<?php
						get_temp("18");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 19</h2>
					<?php
						get_temp("19");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 20</h2>
					<?php
						get_temp("20");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 21</h2>
					<?php
						get_temp("21");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 22</h2>
					<?php
						get_temp("22");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 23</h2>
					<?php
						get_temp("23");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 24</h2>
					<?php
						get_temp("24");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 25</h2>
					<?php
						get_temp("25");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 26</h2>
					<?php
						get_temp("26");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 27</h2>
					<?php
						get_temp("27");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 28</h2>
					<?php
						get_temp("28");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 29</h2>
					<?php
						get_temp("29");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 30</h2>
					<?php
						get_temp("30");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 31</h2>
					<?php
						get_temp("31");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 32</h2>
					<?php
						get_temp("32");
					?>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"> <?php if($temp1 == null) echo"-"; else echo $temp1; ?> </div>
							<div class="col-xs-3" id="c"><?php if($temp2 == null) echo"-"; else echo $temp2; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp3 == null) echo"-"; else echo $temp3; ?></div>
							<div class="col-xs-3" id="c"><?php if($temp4 == null) echo"-"; else echo $temp4; ?></div>
						</div>
					</div>
				</div>
			</div>	
		</div>

	</div>

</body>
</html>