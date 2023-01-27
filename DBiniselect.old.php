<?php
  include 'DBconnect.php'; 
  $s = DBconnect();  

  $Yid = $_GET['Yid'];
  $gn  =  $_GET['gn'];
  $nr  =  $_GET['nr'];

  $q = "SELECT ps FROM tblcg WHERE pn=$Yid AND gn=$gn AND nr=$nr";
$res=mysqli_query($s,$q);

  if(mysqli_num_rows($res) > 0){
    echo "fill";
  }else{
    echo "NULL";
  }

  mysqli_close($s);

?>