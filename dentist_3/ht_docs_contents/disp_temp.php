<?php

	//BELOW PHP RUNS ONCE AND HANDLES DATA FOR NEW PATIEN


	// run sql query code, which enters form details into DB , once
	include_once 'includes/dbh.inc.php';
	$name = $_POST['name'];
	$age = $_POST['age'];
	$contact = $_POST['contact'];
	$gender = $_POST['gender'];
	$addr = $_POST['addr'];
	$c_comp = $_POST['c_comp'];
	$m_hist = $_POST['m_hist'];
	$pd_hist = $_POST['pd_hist'];
	$m_brush = $_POST['m_brush'];
	$freq = $_POST['freq'];
	$dur = $_POST['dur'];
	$mat = $_POST['mat'];
	$diag = $_POST['diag'];
	$b_prob = $_POST['b_prob'];
	$prob_d = $_POST['prob_d'];
	$treatment = $_POST['treatment'];

	$sql = "INSERT INTO  info(name,age,contact,gender,addr,c_comp,m_hist,pd_hist,m_brush,freq,dur,mat,diag,b_prob,prob_d,treatment) VALUES ('$name','$age','$contact','$gender','$addr','$c_comp','$m_hist','$pd_hist','$m_brush','$freq','$dur','$mat','$diag','$b_prob','$prob_d','$treatment');";
	mysqli_query($conn,$sql);


	// below arrangement is done, to obtain the id for latest user
	$u_id = 0;

	$sql = "SELECT id FROM info ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$u_id = $row['id'];
		}
	}

	// latest user id stored in flags table
	// reseting side variable in DB, cause of new 
	$sql="UPDATE flags 
	SET user_id=$u_id, side=0 
	WHERE id=1";
	mysqli_query($conn,$sql);


	// inserting null rows in each teeth table
	for ($i=1; $i <= 32; $i++) { 
		$read_tmp = "INSERT INTO t".$i."(user_id) VALUES(".$u_id.") ;";
		$result = mysqli_query($conn, $read_tmp);
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){});
		setInterval(function(){
			$('#temps').load('update_temp.php');
		}, 200);
	</script>
</head>
<body >    
	<header>
	<h1>Temperatures of Teeth</h1>
	</header>
	<!--div id="temps">disp</div-->
	<div class="container" id="temps" >

		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 1</h2>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3" id="c"></div>
							<div class="col-xs-3" id="c"></div>
							<div class="col-xs-3" id="c"></div>
							<div class="col-xs-3" id="c"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 2</h2>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3"></div>
							<div class="col-xs-3"></div>
							<div class="col-xs-3"></div>
							<div class="col-xs-3"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 3</h2>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3"></div>
							<div class="col-xs-3"></div>
							<div class="col-xs-3"></div>
							<div class="col-xs-3"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-6 outter_col">
				<div>
					<h2>Teeth 4</h2>
					<div class ="container-fluid">
						<div class="row inner_col">
							<div class="col-xs-3"></div>
							<div class="col-xs-3"></div>
							<div class="col-xs-3"></div>
							<div class="col-xs-3"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="text-align: center;">
	<a href="form.html" >
		<button type="button" class="btn btn-primary">Next Patient</button>
	</a>
	</div>
	<br>
</body>
</html>