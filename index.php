<?php

function pg_connection_string() { 
	return "dbname= d2b8h06bak4ivo host= ec2-23-23-176-135.compute-1.amazonaws.com user=kykiyayfiroilv password=rYI3CtNdygxh8_gn358BjPutkw port=5432 sslmode=require"
} 

function select() { 
	$con = pg_connect(pg_connection_string()); 
	var_dump( pg_query($con, "SELECT * from usuarios"));
} 