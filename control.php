<html>
<body>
<form action="dataset.php" method="POST">
	

<?php


$select=$_POST['state'];

$dbhost='localhost';
$dbuser='root';
$dbpass='shwetha';

$conn=mysql_connect($dbhost,$dbuser,$dbpass);
if(! $conn)
{
	die ('could not connect'.mysql_error());
}

$sql = "SELECT DISTRICT FROM dataset WHERE STATE='".$select."'";

mysql_select_db('dataset_proj_1');
$retval1=mysql_query($sql,$conn);

if(! $retval1)
{
	die ('could not connect'.mysql_error());
}

	$i = 0;
	
while($row = mysql_fetch_assoc($retval1))
{
    $row1[$i] = $row['DISTRICT'];	
    $i++;
}
//print_r($row1);
?>
Select the district value:<select name="district">
	<?php
	for($j=0; $j < count($row1); $j++)
	{
?>

 <option><?php print_r($row1[$j]);?></option>
<?php
}

?>
</select>
<input type=submit value="submit">
  
<?php
SESSION_START();
$_SESSION['name']=$_POST['state'];


?>
                                                                                                                                                                                                                                                                                                   
</form>
</body>

</html>
