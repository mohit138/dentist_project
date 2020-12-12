<?php
 
include_once 'dbh.inc.php';

for ($i=1; $i <=32; $i++){
$sql = "DROP TABLE t".$i.";";
mysqli_query($conn,$sql);
}


$sql = "DROP TABLE info;";
mysqli_query($conn,$sql);

$sql = "CREATE table info (
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
	name varchar(128) not null,
	age int(11),
	contact varchar(16),
	gender varchar(16),
	addr varchar(256),
	c_comp varchar(256),
	m_hist varchar(256),
	pd_hist varchar(256),
	m_brush varchar(128),
	freq varchar(128),
	dur varchar(128),
	mat varchar(128),
	diag varchar(128),
	b_prob varchar(128),
	prob_d varchar(128),
	treatment varchar(256)
);";
mysqli_query($conn,$sql);


for ($i=1; $i <=32; $i++) { 
	$sql="CREATE table t".$i."(
		t_id int(11) not NULL PRIMARY KEY AUTO_INCREMENT,
		user_id int(11) ,
		temp1 int(11) ,
		temp2 int(11) ,
		temp3 int(11) ,
		temp4 int(11) ,
		FOREIGN KEY (user_id) REFERENCES info(id)
	);";
	mysqli_query($conn,$sql);	
}

$sql = "UPDATE flags 
SET flag=0, button=0, side=0, user_id=1 
WHERE id=1";
mysqli_query($conn,$sql);


// $sql = "CREATE table t1(
// 	t_id int(11) not NULL PRIMARY KEY AUTO_INCREMENT,
// 	user_id int(11) ,
// 	temp1 int(11) ,
// 	temp2 int(11) ,
// 	temp3 int(11) ,
// 	temp4 int(11) ,
// 	FOREIGN KEY (user_id) REFERENCES info(id)
// );";
//mysqli_query($conn,$sql);