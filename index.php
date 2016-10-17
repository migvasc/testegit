


<?php


echo "Ola";
die();

function pg_connection_string() { 
	return "dbname= d2b8h06bak4ivo host= ec2-23-23-176-135.compute-1.amazonaws.com user=kykiyayfiroilv password=rYI3CtNdygxh8_gn358BjPutkw port=5432 sslmode=require"
} 


$conn = pg_connect(pg_connection_string()); 
$result= pg_query($conn, "SELECT * FROM x WHERE a=b;");
if  (!$result) {
   echo "query did not execute";
}
if (pg_num_rows($result) == 0) {
   echo "0 records"
 }
 else {
   while ($row = pg_fetch_array($result)) {
	echo "one row"
   }
 }
