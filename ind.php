<?php
print md5('denys_kibebe');

$B=$_SERVER['HTTP_USER_AGENT'];
print($B); 
echo "<br>";

$ADDR=$_SERVER['REMOTE_ADDR']; 
echo $ADDR;
$a="2020-12-04";
$conn=mysqli_connect("localhost","root","");
$sel=mysqli_query($conn,"SELECT DATE_SUB('$a',INTERVAL '7' DAY) as days");
$arr=mysqli_fetch_assoc($sel);
$val=$arr['days'];
echo $a."_____".$val;

?>

