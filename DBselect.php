<?php
  include 'DBconnect.php'; 
  $s = DBconnect();  

  $Yid = $_GET['Yid'];
  $gn  =  $_GET['gn'];
  $nr  =  $_GET['nr'];

  $q = "SELECT ml,mr,p1,p2 FROM tblcg WHERE pn=$Yid AND gn=$gn AND nr=$nr";
$res=mysqli_query($s,$q);
  $row = mysqli_fetch_assoc($res);

  $ml = ($row["ml"]==NULL)? "NoData" : $row["ml"];
  $mr = ($row["mr"]==NULL)? "NoData" : $row["mr"];
  $p1 = ($row["p1"]==NULL)? "NoData" : $row["p1"];
  $p2 = ($row["p2"]==NULL)? "NoData" : $row["p2"];

  echo $ml.":".$mr.":".$p1.":".$p2;

  mysqli_close($s);
?>