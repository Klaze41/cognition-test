<?php
  include 'DBconnect.php'; 
  $s = DBconnect();  

  $Iid = (int)$_GET['Iid'];

//$q = "LOCK TABLES tblid WRITE";
//$res = mysql_query($q);

  $q="UPDATE tblid SET state=NOW() where id=$Iid";
$res2=mysqli_query($s,$q);

  
//  $q = "UNLOCK TABLES";
//  $res = mysql_query($q);  

  $q = "SELECT * FROM tblid WHERE id2 =$Iid AND state > now() - interval 10 SECOND";
$res3 = mysqli_query($s,$q);


  mysqli_close($s);

  if($row = mysqli_fetch_assoc($res3)){
      echo "found";
  }else{
      echo "kill";
  }


?>
