<?php
  include 'DBconnect.php'; 
  $s = DBconnect();  

  $Yid = $_GET['Yid'];
  $gn  =  $_GET['gn'];
  $nr  =  $_GET['nr'];

  $q = "SELECT ps FROM tblcg WHERE pn=$Yid AND gn=$gn AND nr=$nr";
$res=mysqli_query($s,$q);
  $row = mysqli_fetch_assoc($res);

  $ps = ($row["ps"]==NULL)? "NoData" : $row["ps"];

  echo $ps;

  mysqli_close($s);

?>