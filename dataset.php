
<?php
SESSION_START();
$state=$_POST['state'];
$district=$_POST['district'];
$dbhost='localhost';
$dbuser='root';
$dbpass='shwetha';

$conn=mysql_connect($dbhost,$dbuser,$dbpass);
if(!$conn)
{
	die ('could not connect'.mysql_error());
}

$sql="SELECT AADHARGENERATED,ENROLLMENTREJECTED FROM dataset WHERE STATE='".$_SESSION['name']."'AND DISTRICT='".$district."'";
mysql_select_db('dataset_proj_1');
$retval=mysql_query($sql,$conn);

if(! $retval)
{
	die ('could not connect'.mysql_error());
}
while($row = mysql_fetch_assoc($retval,MYSQL_ASSOC))
{
	
	echo"Aadhar Generated:{$row['AADHARGENERATED']} <br>".
        "Enrollment Rejected:{$row['ENROLLMENTREJECTED']} <br>";
        
}
echo "Data fetched successfully";
mysql_close($conn);
?>

