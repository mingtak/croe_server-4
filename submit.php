<?php
require('__include.php');

CheckEmpty($_POST[$t.'Name'], '姓名');
CheckEmpty($_POST[$t.'Gender'], '性別');
CheckEmpty($_POST[$t.'Tel'], '電話');
CheckEmpty($_POST[$t.'Zip'], '郵遞區號');
CheckEmpty($_POST[$t.'Address'], '地址');
CheckEmpty($_POST[$t.'Type'], '身分');
CheckEmpty($_POST[$t.'Content'], '心得');

if (!empty($_POST[$t.'Email'])) CheckEmail($_POST[$t.'Email']);
if ($_POST[$t.'Gender'] != '男' && $_POST[$t.'Gender'] != '女') exit;
if (!preg_match('/^[0-9]{3,5}$/', $_POST[$t.'Zip']))
{
	ErrorMsg('郵遞區號不正確，請輸入3~5位數字！');
}
if (!sizeof($_POST['info']))
{
	ErrorMsg('請至少選填一項訊息來源！');
}
if (empty($_FILES[$t.'Pic']['name']) || ($_FILES[$t.'Pic']['type'] != 'image/jpeg' && $_FILES[$t.'Pic']['type'] != 'image/png'))
{
	ErrorMsg('請上傳照片，支援 JPEG 或 PNG 格式！');
}

$DB->Connect();
$DB->Select(DATABASE);

$r = $DB->Num($DB->Query("SELECT {$t}No FROM {$t} WHERE {$t}Tel = '{$_POST[$t.'Tel']}' ; "));
if ($r)
{
	ErrorMsg('抱歉！您已經參加過本次活動了！');
}

$r = $DB->Num($DB->Query("SELECT {$t}No FROM {$t} WHERE {$t}Address = '{$_POST[$t.'Address']}'; "));
if ($r)
{
	ErrorMsg('抱歉！您已經參加過本次活動了！');
}

$tmp = $_FILES[$t.'Pic']['tmp_name'];
$filename = basename($_FILES[$t.'Pic']['name']).'_'.date('U');

if (!move_uploaded_file($tmp, UPLOADPATH . $filename))
{
	ErrorMsg('上傳圖檔時發生錯誤，系統找不到檔案，請避免使用中文檔名！');
}

switch ($_POST[$t.'Type'])
{
	case '癌友':
		$_POST[$t.'Cancer'] = $_POST[$t.'Cancer1'];
	break;

	case '癌友家屬':
		$_POST[$t.'Cancer'] = $_POST[$t.'Cancer1'];
	break;
	
	case '醫護人員':
		$_POST[$t.'Cancer'] = $_POST[$t.'Cancer2'];
	break;
}

$info = implode('、', $_POST['info']);

$f = "{$t}Name, {$t}Gender, {$t}Tel, {$t}Zip, {$t}Address, {$t}Email, {$t}Type, {$t}Cancer, {$t}Hospital, {$t}Info, {$t}InfoOther1, {$t}InfoOther2, {$t}Content, {$t}Pic";
$v = "'{$_POST[$t.'Name']}','{$_POST[$t.'Gender']}','{$_POST[$t.'Tel']}','{$_POST[$t.'Zip']}','{$_POST[$t.'Address']}','{$_POST[$t.'Email']}',";
$v .= "'{$_POST[$t.'Type']}','{$_POST[$t.'Cancer']}','{$_POST[$t.'Hospital']}','{$info}','{$_POST['info1']}','{$_POST['info2']}','{$_POST[$t.'Content']}','{$filename}' ";

$DB->Query("INSERT INTO {$t} ({$f}) VALUES ({$v});");
$DB->Close();

Msg('報名完成！謝謝您的參與！', 'p02.html');
?>