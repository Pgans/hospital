

<?php

$hostdb = 'localhost';
$usernamedb = 'mhospit1';
$passworddb = 'Xik97be76C';
$objConnect = mysql_connect($hostdb,$usernamedb,$passworddb);
if($objConnect)
{
//เลือก DBNAME STD
$objDB = mysql_select_db('mhospit1_mbase');
mysql_query("SET NAMES UTF8");

}else
{
echo 'MySQL Connect Failed : Error : '.mysql_error();

echo “\r\n”;
exit();
}
//ดึงข้อมูล ID มาจาก Databases

$json_return = array();
 $query = mysql_query("SELECT * FROM populations LIMIT 100");
 while ($row = mysql_fetch_assoc($query)) {
 array_push($json_return, 
 array(
 "CID" => $row["CID"],
 "FNAME" => $row["FNAME"],
 "LNAME" => $row["LNAME"],
 "ID" => $row["auto_id"]
 )
 );
 }
 echo json_encode($json_return);
?>