<?php
    include 'DBconnect.php'; 
    $s = DBconnect();  

    $Iid = $_GET['Iid'];
    $Yid = $_GET['Yid'];
    $gn  = $_GET['gn'];
$flg =0;

    $q = "SELECT * FROM tblid WHERE id =$Iid AND state > now() - interval 10 SECOND";
$res3 = mysqli_query($s,$q);


    if($row = mysqli_fetch_assoc($res3)){
      $q = "SELECT max(nr) FROM tblcg WHERE pn =$Iid";
      $res4 = mysqli_query($s,$q);
      $row2 = mysqli_fetch_assoc($res4);
       $flg=$row2;
       //echo "<pre>";
       //var_dump($row2);
       //echo "</pre>";
       echo $flg['max(nr)'];
    }else{
        $q = "LOCK TABLES tblcg WRITE";
        $res = mysqli_query($s,$q);

    // pn,gn に合致するデータを削除
        $q="DELETE FROM tblcg WHERE pn=$Iid AND gn=$gn";
        $res=mysqli_query($s,$q);

    // 相手データの中でml,mr,p2がNULLではなければ，ゴミが残っていることになるので，それを削除
        $q = "SELECT ml,mr,p2 FROM tblcg WHERE pn=$Yid AND gn=$gn AND nr=1";
        $res=mysqli_query($s,$q);
        $row = mysqli_fetch_assoc($res);
        if(($row["ml"]!=NULL)||($row["mr"]!=NULL)||($row["p2"]!=NULL)){
            $q="DELETE FROM tblcg WHERE pn=$Yid AND gn=$gn";
            $res=mysqli_query($s,$q);
        }

        $q = "UNLOCK TABLES";
        $res = mysqli_query($s,$q);  
    }
    mysqli_close($s);
?>