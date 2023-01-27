<?php

function DBconnect(){
    $s=mysqli_connect("localhost","cgtest","cgtest","cgtest") or die("データベース接続に失敗しました");
    //mysql_select_db("cgtest",$s);
    
  return $s;
    
}


?>