<?php
  include 'DBconnect.php'; 
  $s = DBconnect();  

  $pn = $_GET['pn'];
  $gn = $_GET['gn'];
  $nr = $_GET['nr'];
  $ps = $_GET['ps'];
  $p1 = $_GET['p1'];

  // pn,gn,nr に合致するデータがある場合にはそれを削除
  $q="DELETE FROM tblcg WHERE pn=$pn AND gn=$gn AND nr=$nr";
$res=mysqli_query($s,$q);

  // データインサート
  $q="INSERT INTO tblcg (pn,gn,nr,ps,p1,sc) VALUES($pn,$gn,$nr,$ps,$p1,0)";
$res=mysqli_query($s,$q);

  if($res==NULL)
    echo "INSERT:書き込みに失敗しました";
  else
    echo "DONE";

  mysqli_close($s);
?>