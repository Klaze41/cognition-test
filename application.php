<?php
  session_start();
  $a = $_COOKIE['nam']; //ユーザ名
  

  $This = $_SERVER['PHP_SELF'];
  $Host = dirname($This);

  $mode=$_GET['mode'];
  $p_Name=$_GET['name'];
  $p_Age=$_GET['age'];
  $p_Sex=$_GET['sex'];
  $Iid=$_GET['Iid'];
  $Yid=$_GET['Yid'];
  $gn=$_GET['gn'];
  $nvs=$_GET['nvs'];

  if($p_Age=="") $p_Age=0;
  if($Iid  =="") $Iid=0;
  if($Yid  =="") $Yid=0;
  if($gn   =="") $gn=0;
  if($nvs  =="") $nvs=0;

if (isset($p_Name)&& $p_Name!=""){
  $_SESSION['nm'] = $p_Name;//ユーザ
  setcookie('nam', $p_Name, time()+12096000, "/");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="initial-scale=1.0">
<link rel="apple-touch-icon" href="images/HomeIcon.png">
<link rel="stylesheet" href="css/application.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/math.js"></script>

<script type="text/javascript" language="javascript">
<?php
  // js で使用する変数の初期化

  // 文字の場合
  print 'var mode = "' . $mode   . '";';
  print 'var name = "' . $p_Name . '";';
  print 'var sex  = "' . $p_Sex  . '";';

  // 数値の場合
  print 'var age  =  ' . $p_Age  . ' ;';
  print 'var Iid  =  ' . $Iid    . ' ;';
  print 'var Yid  =  ' . $Yid    . ' ;';
  print 'var gn   =  ' . $gn     . ' ;';
  print 'var nvs  =  ' . $nvs    . ' ;';
?>
</script>

<script type="text/javascript" src="js/application.js"></script>

<title>実験参加登録（Application Form）</title>

</head>
<body>

<?php

include 'DBconnect.php'; 

//$q="UPDATE tblid SET state=NOW() where id=$Iid";
//$res=mysql_query($q);

switch ($mode) {
case "entry":
  $Message_entry='以下を入力して登録ボタンを押してください';
  DispEntryForm();
  break;
case "confirm":
  $Message_entry='以下の情報でゲームに参加します';
  DispConfirmForm();
  break;
}

function DispConfirmForm() {
  global $This,$Message_entry,
    $p_Name,
    $p_Age,
    $p_Sex;

  print '<table border="0" cellspacing="2" cellpadding="2" class="add_theme">';
  print '<tr><td colspan="2"><p class="warning">'.$Message_entry.'</p></td></tr>';
  print '<tr><td class="cell_menu" id="txt">名前（Name）:</td>';
  print '    <td class="cell_menu" id="txt">'.$p_Name.'</td>';
  print '<tr><td class="cell_menu" id="txt">年齢（Age）:</td>';
  print '    <td class="cell_menu" id="txt">'.$p_Age.'</td>';
  print '<tr><td class="cell_menu" id="txt">性別（Sex）:</td>';
  print '    <td class="cell_menu" id="txt">'.$p_Sex.'</td>';
  print '</td></tr>';
  print '</table></form>';
  print '<p class="state" id="txt">相手が決まるのを待っています．．．</p>';
  print '<input type="button" value="次へ" id="btn_next" visibility="hedden">';
  print '</body>';
  print '</html>';
}

function DispEntryForm() {
    global $This,$Message_entry,$a;

  print '<table border="0" cellspacing="20" cellpadding="2" class="add_theme">';
  print '<tr><td colspan="2"><p class="warning">'.$Message_entry.'</p></td></tr>';
  print '<tr><td class="cell_menu" id="txt">名前（なまえ）:</td>';
  print '<td><input type="text" size="20" value="'.$a.'" name="name" style="position: relative; top:0px; left:80px; -webkit-transform: scale(2,2);"></td>';
  //print '<td><select name="name" size="1" style="position: relative; top:0px; left:30px; -webkit-transform: scale(2,2);">';
  //print '    <option value="G1" selected>Group1</option>';
  //print '    <option value="G2">Group2</option>';
  //print '    <option value="G3">Group3</option>';
  //print '    <option value="G4">Group4</option>';
  //print '    <option value="G5">Group5</option>';
  //print '    <option value="G6">Group6</option>';
  //print '    <option value="G7">Group7</option>';
  //print '    <option value="G8">Group8</option>';
  //print '</td>';
  print '<tr><td class="cell_menu" id="txt">年齢（ねんれい）:</td>';
  print '<td><select name="age" size="1" style="position: relative; top:0px; left:30px; -webkit-transform: scale(2,2);">';
  print '    <option value=" 7"> 7</option>';
  print '    <option value=" 8"> 8</option>';
  print '    <option value=" 9"> 9</option>';
  print '    <option value="10">10</option>';
  print '    <option value="11">11</option>';
  print '    <option value="12">12</option>';
  print '    <option value="13">13</option>';
  print '    <option value="14">14</option>';
  print '    <option value="15">15</option>';
  print '    <option value="16">16</option>';
  print '    <option value="17">17</option>';
  print '    <option value="18">18</option>';
  print '    <option value="19" selected>19</option>';
  print '    <option value="20">20</option>';
  print '    <option value="21">21</option>';
  print '    <option value="22">22</option>';
  print '    <option value="23">23</option>';
  print '    <option value="25">25</option>';
  print '    <option value="24">24</option>';
  print '    <option value="26">26</option>';
  print '    <option value="27">27</option>';
  print '    <option value="28">28</option>';
  print '    <option value="29">29</option>';
  print '    <option value="30">30</option>';
  print '    <option value="31">31</option>';
  print '    <option value="32">32</option>';
  print '    <option value="33">33</option>';
  print '    <option value="34">34</option>';
  print '    <option value="35">35</option>';
  print '    <option value="36">36</option>';
  print '    <option value="37">37</option>';
  print '    <option value="38">38</option>';
  print '    <option value="39">39</option>';
  print '    <option value="30">30</option>';
  print '    <option value="41">41</option>';
  print '    <option value="42">42</option>';
  print '    <option value="43">43</option>';
  print '    <option value="44">44</option>';
  print '    <option value="45">45</option>';
  print '    <option value="46">46</option>';
  print '    <option value="47">47</option>';
  print '    <option value="48">48</option>';
  print '    <option value="49">49</option>';
  print '    <option value="50">50</option>';
  print '    <option value="51">51</option>';
  print '    <option value="52">52</option>';
  print '    <option value="53">53</option>';
  print '    <option value="54">54</option>';
  print '    <option value="55">55</option>';
  print '    <option value="56">56</option>';
  print '    <option value="57">57</option>';
  print '    <option value="58">58</option>';
  print '    <option value="59">59</option>';
  print '    <option value="50">50</option>';
  print '    <option value="61">61</option>';
  print '    <option value="62">62</option>';
  print '    <option value="63">63</option>';
  print '    <option value="64">64</option>';
  print '    <option value="65">65</option>';
  print '    <option value="66">66</option>';
  print '    <option value="67">67</option>';
  print '    <option value="68">68</option>';
  print '    <option value="69">69</option>';
  print '    <option value="70">70</option>';
  print '</td>';
  print '<tr><td class="cell_menu" id="txt">性別（せいべつ）:</td>';
  //print '<td><input type="radio" name="sex" style="width:50px; height:50px" value="男（male）" checked>男（male）';
  print '<td><input type="radio" name="sex" id="sex1" style="position: relative; top:-4px; left:10px; -webkit-transform: scale(2,2);" value="男（male）" checked /><label for="sex1" id="txt" style="position: relative; left: 20px; margin: 0px 30px 0px 0px; ">男（おとこ）</label>';
  print '    <input type="radio" name="sex" id="sex2" style="position: relative; top:-4px; left:10px; -webkit-transform: scale(2,2);" value="女（female）"       /><label for="sex2" id="txt" style="position: relative; left: 20px; margin: 0px  0px 0px 0px; ">女（おんな）</label></td>';
  print '<tr><td class="cell_menu" colspan="2">';
  print '    <input type="button" value="登録（とうろく）" id="btn_submit" >';
  print '</td></tr>';
  print '</table></form>';
  print '<p class="warning">実験参加者のプライバシーを保護するため、<br>仮名IDでの参加をお願いしています．<br>
以前の授業において下記のアンケートを回答した際のIDを入力してください。
<br><a href="https://moritalab.inf.shizuoka.ac.jp/sites/cg15/mind/result.php">https://moritalab.inf.shizuoka.ac.jp/sites/cg15/mind/result.php</a><br>上記を参照しても仮名IDがわからなかった人、新しい仮名IDを作成して実験に参加してください。';
  print '</body>';
  print '</html>';
}
?>
