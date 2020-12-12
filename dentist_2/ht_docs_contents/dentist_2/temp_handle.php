<?php
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
	<title>Teeth Temperatures</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){});
		setInterval(function(){
			$('#temps').load('load_tmp.php');
		}, 200);
	</script>
</head>
<body>
	<div id="temps"></div>
	<form action="form">
		<button>New Patient</button>
	</form>
</body>
</html>
<?php


// keep on getting data from arduino and insert into appropriate table one by one. 
// 2 global vars will be used, which will keep on updating as data is recived. 
// and parallely j query will keep on running to display latest data , with autorefreshing 

// after recieving last data, wait for submit, and get back to form, 

// hence one entry is done. 


?>