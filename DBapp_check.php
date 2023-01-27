<?php
  include 'DBconnect.php'; 
  $s = DBconnect();  

  $Iid = $_GET['Iid'];

  $q = "LOCK TABLES tblid WRITE";
$res = mysqli_query($s,$q);

  $q="SELECT id2 from tblid where id='$Iid'";
$res = mysqli_query($s,$q);
  $row = mysqli_fetch_row($res);
  $Yid=0;
  if($row[0]>0){
    $Yid=$row[0];
  }
  
  $q = "UNLOCK TABLES";
$res = mysqli_query($s,$q);  

  echo $Yid;
  mysqli_close($s);
?>
