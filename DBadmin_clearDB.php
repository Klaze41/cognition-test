<?php
  include 'DBconnect.php'; 
  $s = DBconnect();  

  $q="delete from tblid";
$res = mysqli_query($s,$q);

  $q="alter table tblid auto_increment = 1";
$res = mysqli_query($s,$q);

  $q="delete from tblcg";
$res = mysqli_query($s,$q);

  mysqli_close($s);
?>
