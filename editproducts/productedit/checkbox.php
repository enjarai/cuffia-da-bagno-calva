<?php
include ('../../config/db.php');
$checkbox1 = $_POST['vega'];
if ($_POST["Submit" ]=="Submit")
{
for ($i=0; $i<sizeof ($checkbox1);$i++) {
$query="INSERT INTO products (name) vega ('".$checkbox1[$i]. "')";
mysql_query($query) or die(mysql_error());
}
echo "Record is inserted";
}
?>
