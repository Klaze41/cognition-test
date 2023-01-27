<?php
  include 'DBconnect.php'; 
  $s = DBconnect();  

  $Iid = $_GET['Iid'];
  $file_name = "data/list_cg.csv";
  $bkfile_name ="data/list_cg".time()."csv";
  $file_header = "プレイヤ番号(pn), ゲーム番号(gn), ラウンド数(nr), 左図形(ml), 右図形(mr) , 配置パタン(ps), 初期位置(p1), 移動先(p2), スコア(sc), 図形送信日時(tm), 位置決定日時(tp) \n";

  //$q="SELECT * from tblid where id=$Iid";
  $q="SELECT * from tblcg";
$res = mysqli_query($s,$q);
  //$row = mysql_fetch_row($res);

  $contents = $file_header;
  while ($row = mysqli_fetch_array($res)) {
      $contents = $contents . 
	$row['pn'] . "," .
	$row['gn'] . "," .
	$row['nr'] . "," .
	$row['ml'] . "," .
	$row['mr'] . "," .
	$row['ps'] . "," .
	$row['p1'] . "," .
	$row['p2'] . "," .
	$row['sc'] . "," .
	$row['tm'] . "," .
	$row['tp'] . "\n";
  }
  file_put_contents($file_name, $contents);

  mysqli_close($s);
  copy($file_name, $bkfile_name);

?>
