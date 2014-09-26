<html>
	<body>
<?php
if(empty($_POST['uname']))     
{         
    echo("UserName is empty!");         
    return false;     
}          
if(empty($_POST['pwd']))     
{         
    echo("Password is empty!");
            return false;     
}           
$user=$_POST['uname'];
$pwd=$_POST['pwd'];
$dbhost='localhost';
$dbuser='root';
$dbpass='shwetha';

$conn=mysql_connect($dbhost,$dbuser,$dbpass);
if(! $conn)
{
	die ('could not connect'.mysql_error());
}

$sql = "SELECT * FROM USERS WHERE Username='".$user."'";
mysql_select_db('dataset_proj_1');
$retval=mysql_query($sql,$conn);
if(! $retval)
{
	die ('could not connect'.mysql_error());
}
while($row=mysql_fetch_array($retval))
{
	if($user===$row['Username'] && $pwd===$row['Password'])
	{
		echo " Valid Login";
		require("database2.html");
	}
	else
	{
		echo"Invalid Login";
}
}
mysql_close($conn);
?>
</body>
</html>
