<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微笑365</title>
<meta name="keywords" content="微笑365, 微笑加倍, 健康倍速, 微笑加倍　健康倍速, 倍速" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="in.css" rel="stylesheet" type="text/css" />
<link href="photo.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_showHideLayers() { //v9.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
function s(d,a)
{
    for(i=0;i<d;i++)
    {
      document.getElementById('a'+i).style.display = 'none';
    }
    document.getElementById(a).style.display = '';
}

</script>
</head>

<body>
<div id="all" align="center" >
<div id="bg">
<!--menu-->
<div id="m_top_menu">手機板選單</div>
<div id="top_menu">
<ul>
<li><a href="index.html" class="white-blink">回首頁</a></li>
<li><a href="p01.html" class="white-blink">活動辦法</a></li>
<li><a href="p02.html" class="white-blink">照片走廊</a></li>
<li><a href="p03.html" class="white-blink">參加活動</a></li>
<li><a href="p04.html" class="white-blink">得獎專區</a></li>
<li><a href="http://fresenius-kabi.megais.com/2015campaign/?utm_source=google-keyword" target="_blank" class="white-blink">癌友營養補充</a></li>
</ul>
</div>
<!--menu end-->
<!--header-->
<div id="header">
<div id="header-in">
<div id="in-banner"><a href="index.html"><img src="images/in-banner.png" /></a></div>
<div id="header-item">
<ul>
<li><a href="p01.html">活動辦法</a></li>
<li><a href="p02.html">照片走廊</a></li>
<li><a href="p03.html">參加活動</a></li>
<li><a href="p04.html">得獎專區</a></li>
<li style="border-right:0;"><a href="http://fresenius-kabi.megais.com/2015campaign/?utm_source=google-keyword" target="_blank">癌友營養補充</a></li>
</ul>
</div>
</div>
</div>
<!--header end-->
<div id="wrapper">
<!--content-->
<div id="content">
<div id="in-tai"><img src="images/in-tai-02.gif" /></div>
<!--<div style="width:100%; float:left; text-align:right; margin-top:10px;">
  <label for="textfield10"></label>
  <input name="textfield10" type="text" id="textfield10" value="請輸入姓名" />
  <a href="p02-list.html"><img src="images/search01.gif" align="center" hspace="8" /></a>
</div>-->
<!--photo-->
<div id="in-photo">
<ul>

<?php
require('__include.php');

$_dataPerPage = 12;

$DB->Connect();
$DB->Select(DATABASE);

$_pageNo = (empty($_GET['page'])) ? 1 : $_GET['page'];
$_queryCount = $DB->Num($DB->Query("SELECT * FROM " . $t ));

$_pageTotal = ceil($_queryCount / $_dataPerPage);
$_pageStart = ($_pageNo * $_dataPerPage) - $_dataPerPage;
$_pageFirst = intval ($_pageNo / 10) * 10 + 1;
$_pageLast = $_pageFirst + 9;

if ($_pageNo < $_pageFirst)
{
  $_pageFirst = $_pageFirst - 10;
  $_pageLast = $_pageLast - 10;
}
if ($_pageLast > $_pageTotal)
{
  $_pageLast = $_pageTotal;
}

$data = array();
$q = $DB->Query("SELECT * FROM ". $t . " LIMIT ".$_pageStart.",".$_dataPerPage.";");
while($a = $DB->Arrays($q))
{
  $data[] = array(
    'name' => mb_substr($a[$t.'Name'], 0, 1, 'UTF-8') . (($a[$t.'Gender']=='男')?'先生':'小姐'),
    'type' => $a[$t.'Type'],
    'content' => $a[$t.'Content'],
    'pic' => $a[$t.'Pic']
  );
}

$DB->Close();


for($i = 0; $i < sizeof($data); $i++)
{
?>
  <li>
  <a href="#"><img src="<?php echo UPLOAD . $data[$i]['pic']?>" width="256" height="193" onclick="MM_showHideLayers('photo-detail','','show');s('<?php echo sizeof($data)?>', 'a<?php echo $i?>');" /></a>
  <div id="in-photo-words">
  <h3><?php echo $data[$i]['name']?> / <?php echo $data[$i]['type']?></h3>
  <p><?php echo (mb_strlen($data[$i]['content'], 'UTF-8') > 36) ? mb_substr($data[$i]['content'], 0, 36,'UTF-8') : $data[$i]['content']?></p>
  </div>
  </li>
<?php
}
?>


</ul>
</div>
<!--photo end-->
<!--page-->
<div style="width:100%; clear:both; float:left; margin:20px 0 20px 0;">
  <table width="280" border="0" align="right" cellpadding="0" cellspacing="0">
    <tr>
      <td width="50" align="center"><a href="<?php echo ($_pageNo != 1) ? '?page=1' : '#'?>" class="black-link">第1頁</a></td>
      <td width="15" align="center"><a href="<?php echo ($_pageNo != 1) ? '?page='.($_pageNo-1) : '#'?>" class="black-link">＜</a></td>
      <td width="80" align="center"><span class="word-red"><?php echo $_pageNo?></span> / <?php echo $_pageTotal?></td>
      <td width="15" align="center"><a href="<?php echo ($_pageTotal == 0 || $_pageNo != $_pageTotal) ? '?page='.($_pageNo+1) : '#'?>" class="black-link">＞</a></td>
      <td width="50" align="center"><a href="<?php echo ($_pageTotal == 0 || $_pageNo != $_pageTotal) ? '?page='.$_pageTotal : '#'?>" class="black-link">最末頁</a></td>
      <td><label for="select"></label>
        <select name="select" id="select" onChange="location.href='?page='+this.value">
          <option value="">請選擇</option>
          <?php
          for($i = 1; $i <= $_pageTotal; $i++)
          {
            echo '<option';
            #if ($i == $_pageNo) echo ' selected';
            echo '>'. $i .'</option>';
          }
          ?>
        </select></td>
    </tr>
  </table>
</div>
<!--page end-->
</div>
<!--content end-->
</div>
<!--footer-->
<div id="footer">
<div class="word-blue" id="footer-01">
  <div id="footer-copy">Copyright Fresenius Kabi © 2016</div>
  <div id="footer-logo"><img src="images/logo-01.gif" style="margin-right:12px;" /><img src="images/logo-02.gif" /></div>
</div>
</div>
<!--footer end-->
<!--photo-detail-->
<div id="photo-detail">
<div style="width:46px; float:right; margin-top:20px; margin-right:20px;"><img src="images/icon-close.png" onclick="MM_showHideLayers('photo-detail','','hide')" /></div>
<div id="photo-detail-words">

  <?php
  for($i = 0; $i < sizeof($data); $i++)
  {
  ?>
  <div id="a<?php echo $i?>" style="display:none">
    <img src="<?php echo UPLOAD.$data[$i]['pic']?>" width="800" />
    <h3><?php echo $data[$i]['name']?> / <?php echo $data[$i]['type']?></h3>
    <?php echo nl2br($data[$i]['content'])?>
  </div>
  <?php
  }
  ?>

</div>
</div>


<!--photo-detail end-->
</div>
</div>
<!--控制手機版選單-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="js/mmenu.js"></script>
</body>
</html>