<?php
/**********************************************************************************************/
// 引入模組檔
/**********************************************************************************************/
include ("../check.php");

$_table = TABLE_LOGIN;

/**********************************************************************************************/
// 檢查空白欄位
/**********************************************************************************************/
CheckEmpty($_POST['controlNo'], "控制代碼");
CheckEmpty($_POST[$_table.'ID'], "管理帳號");

/**********************************************************************************************/
// 處理特別欄位
/**********************************************************************************************/
$loginAccess = "";
for ($i = 0; $i < count($_POST[$_table.'Access']); $i++) {
	$loginAccess .= $_POST[$_table.'Access'][$i] . ",";
}
$loginAccess = substr($loginAccess, 0, -1);

/**********************************************************************************************/
// 存入資料庫 or 更新資料庫
/**********************************************************************************************/
$DB->Select(DATABASE);
$DB->Query("UPDATE ". $_table ." SET ". $_table ."ID = '". $_POST[$_table.'ID'] ."', ". $_table ."PW = '". $_POST[$_table.'PW'] ."', ". $_table ."Email = '". $_POST[$_table.'Email'] ."', ". $_table ."Access = '". $loginAccess ."' WHERE ". $_table ."No = '".$_POST['controlNo']."';");
$DB->Log("修改資料 - " . $_table, $_COOKIE['loginID']);

/**********************************************************************************************/
// 輸出成功訊息
/**********************************************************************************************/
if ($_POST['controlNo'] == $_COOKIE['loginNo']) {
	echo "<html><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"><body onLoad=\"alert('修改完成，您修改了自己的資料，需要重新登入本系統！'); top.location.href='../../logout.php';\"></body></html>\n";
}
else {
	Msg("修改完成！", $_table."_list.php");
}
?>