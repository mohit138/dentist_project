<?php
 
include_once 'dbh.inc.php';

for ($i=1; $i <=32; $i++){
$sql = "DROP TABLE t".$i.";";
mysqli_query($conn,$sql);
}

$sql = "DROP TABLE flags;";
mysqli_query($conn,$sql);


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


$sql = "create table flags (
	id int(11) not null PRIMARY KEY,
	flag int(1) not null,
	button int(1) not null,
	side int(11) not null,
	user_id int(11) not null
);";
mysqli_query($conn,$sql);


$sql = "INSERT INTO flags(id,flag,button,side,user_id) VALUES(1,0,0,0,1)";
mysqli_query($conn,$sql);

echo "Database has been cleared !";