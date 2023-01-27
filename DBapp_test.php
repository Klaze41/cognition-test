<?php
  include 'DBconnect.php'; 
  $s = DBconnect();  

  //$p_Name = $_GET['name'];
  //$p_Age  = $_GET['age'];
  //$p_Sex  = $_GET['sex'];

  $Iid = "10";
  $Yid = "20";

  echo $Iid.":".$Yid;

  mysqli_close($s);
?>
