<?php
  include 'DBconnect.php'; 
  $s = DBconnect();  

  $pn = $_GET['pn'];
  $gn = $_GET['gn'];
  $nr = $_GET['nr'];
  $sc = $_GET['sc'];

  $q="UPDATE tblcg SET sc=$sc WHERE pn=$pn AND gn=$gn AND nr=$nr";
$res=mysqli_query($s,$q);

  if($res==NULL)
    echo "UPDATE(score):上書きに失敗しました";
  else
    echo "DONE";

  mysqli_close($s);
?>