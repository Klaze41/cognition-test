<?php
include 'DBconnect.php'; 
$s = DBconnect();  

$p_Name = $_GET['name'];
 
$Yid = 0;
  // id2 が NULL になっているデータを選択
$q="SELECT id FROM tblid WHERE name = '$p_Name' AND state >= now() - interval 10 SECOND ";

$res = mysqli_query($s,$q);
$row = mysqli_fetch_row($res);
$Yid=0;
if($row[0]>0){
    $Yid=$row[0];
}

echo $Yid;
mysqli_close($s);
?>
