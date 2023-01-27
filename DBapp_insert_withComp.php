<?php
  include 'DBconnect.php'; 
  $s = DBconnect();  

  $p_Name = $_GET['name'];
  $p_Age  = $_GET['age'];
  $p_Sex  = $_GET['sex'];

  $q = "LOCK TABLES tblid WRITE";
$res = mysqli_query($s,$q);

  // gid番号の最大値を取得
  $q = "SELECT max(gid) FROM tblid";
$res = mysqli_query($s,$q);
  $row = mysqli_fetch_row($res);
  if($row==0) $Igid = 1;
  else        $Igid = $row[0]+1;

  // 人ユーザのデータを登録
  $q="INSERT INTO tblid (id2,gid,name,age,sex,date) VALUES(NULL,$Igid,'$p_Name',$p_Age,'$p_Sex',NOW())";
$res=mysqli_query($s,$q);
  // 自分のid番号を取得→つまりはid番号の最大値を取得
  $q = "SELECT max(id) FROM tblid";
$res = mysqli_query($s,$q);
  $row = mysqli_fetch_row($res);
  $Iid = $row[0];
  $Yid = $Iid+1;

  // コンピュータを登録
  $p_Name = $p_Name."_comp";
  $p_Age  = 0;
  $p_Sex  = "comp";
  $q="INSERT INTO tblid (id2,gid,name,age,sex,date) VALUES($Iid,$Igid,'$p_Name',$p_Age,'$p_Sex',NOW())";
$res=mysqli_query($s,$q);

  // コンピュータのIdをユーザの対戦相手として設定
  $q = "UPDATE tblid SET id2=$Yid WHERE id=$Iid";
$res=mysqli_query($s,$q);

  $q = "UNLOCK TABLES";
$res = mysqli_query($s,$q);  

  echo $Iid.":".$Yid;

  mysqli_close($s);
?>
