<?php
/**********************************************************************************************/
// 引入模組檔
/**********************************************************************************************/
include ("../check.php");

$_table = TABLE_PREFIX.'member';

/**********************************************************************************************/
// 取出欄位標題
/**********************************************************************************************/
$fieldInfo = $DB->Query("SHOW FULL COLUMNS FROM " . $_table);
while ($row = mysqli_fetch_assoc($fieldInfo))
{
	$_fieldData[$row['Field']] = $row['Comment'];
}

/**********************************************************************************************/
// 檢查空白欄位
/**********************************************************************************************/
#CheckEmpty($_POST[$_table.'Title'], $_fieldData[$_table.'Title']);

/**********************************************************************************************/
// 處理特別欄位
/**********************************************************************************************/
if ($_FILES[$_table.'Pic']['name'])
{
	$tmp = $_FILES[$_table.'Pic']['tmp_name'];
	$filename = basename($_FILES[$_table.'Pic']['name']).'_'.date('U');

	if (!move_uploaded_file($tmp, UPLOADPATH . $filename))
	{
		ErrorMsg('上傳圖檔時發生錯誤，系統找不到檔案，請避免使用中文檔名！');
	}
	
	$_POST[$_table.'Pic'] = $filename;
}

switch ($_POST[$_table.'Type'])
{
	case '癌友':
		$_POST[$_table.'Cancer'] = $_POST[$_table.'Cancer1'];
	break;

	case '癌友家屬':
		$_POST[$_table.'Cancer'] = $_POST[$_table.'Cancer2'];
	break;
	
	case '醫護人員':
		$_POST[$_table.'Cancer'] = $_POST[$_table.'Cancer3'];
	break;
}

/**********************************************************************************************/
// 刪除多餘欄位
/**********************************************************************************************/
unset($_POST[$_table.'Cancer1'], $_POST[$_table.'Cancer2'], $_POST[$_table.'Cancer3']);

/**********************************************************************************************/
// 組合 INSERT 指令
/**********************************************************************************************/
$insertField = '';
$insertValue = '';

foreach ($_POST as $_field => $_value)
{
	$insertField .= $_field . ', ';
	$insertValue .= "'". $_value ."', ";
}

$insertField = substr($insertField, 0, -2);
$insertValue = substr($insertValue, 0, -2);

/**********************************************************************************************/
// 存入資料庫 or 更新資料庫
/**********************************************************************************************/
$DB->Query("INSERT INTO ". $_table ." (". $insertField .")VALUES(". $insertValue .");");
$DB->Log("新增資料 - " . $_table, $_COOKIE['loginID']);

/**********************************************************************************************/
// 輸出成功訊息
/**********************************************************************************************/
Msg("新增完成！", $_table . "_list.php");
?>