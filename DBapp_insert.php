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

  // id2 が NULL になっているデータを選択
  $q = "SELECT * FROM tblid WHERE id2 IS NULL AND state >= now() - interval 5 SECOND";
$res = mysqli_query($s,$q);

  if($row = mysqli_fetch_assoc($res)){
    $Yid=$row['id'];
    $q="INSERT INTO tblid (id2,gid,name,age,sex,state,date) VALUES($Yid,$Igid,'$p_Name',$p_Age,'$p_Sex',NOW(),NOW())";
    $res=mysqli_query($s,$q);

    // 自分のid番号を取得→つまりはid番号の最大値を取得
    $q = "SELECT max(id) FROM tblid";
    $res = mysqli_query($s,$q);
    $row = mysqli_fetch_row($res);
    $Iid = (int)$row[0];

    $q = "UPDATE tblid SET id2=$Iid,gid=$Igid WHERE id=$Yid";
    $res=mysqli_query($s,$q);

    // 既に登録済みの人とすぐにペアリングされるケース
    // 自分のID番号 $Iid
    // 相手のID番号 $Yid
    // ゲームID     $Igid

  }else{
    $q="INSERT INTO tblid (id2,gid,name,age,sex,state,date) VALUES(NULL,NULL,'$p_Name',$p_Age,'$p_Sex',NOW(),NOW())";
    $res=mysqli_query($s,$q);

    // 自分のid番号を取得→つまりはid番号の最大値を取得
    $q = "SELECT max(id) FROM tblid";
    $res = mysqli_query($s,$q);
    $row = mysqli_fetch_row($res);
    $Iid = (int)$row[0];
    $Yid = "0";
  }

  $q = "UNLOCK TABLES";
$res = mysqli_query($s,$q);  

  
  echo $Iid.":".$Yid;

  mysqli_close($s);
?>
