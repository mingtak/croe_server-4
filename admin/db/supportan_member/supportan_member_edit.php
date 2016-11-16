<?php
/******************************************************************/
// Initialize
/******************************************************************/
include ("../check.php");

$_table = TABLE_PREFIX.'member';

CheckEmpty($_GET['controlNo'], "控制代碼");

$DB->Select(DATABASE);
$dbQuery = $DB->Query("SELECT * FROM ". $_table ." WHERE ". $_table ."No = '". $_GET['controlNo'] ."';");

if (!$DB->Num($dbQuery))
{
	ErrorMsg("抱歉！控制代碼錯誤！");
}
else
{
	$dbArray = $DB->Arrays($dbQuery);
}

include_once (PAGES . "back_top.php");
?>

<body bgcolor="#FFFFFF" text="#000000" topmargin="0" leftmargin="0">
<script language="JavaScript" src="<?php echo JSCRIPT?>scw.js"></script>
<script>
function f(v)
{
	document.getElementById('f1').style.display = 'none';
	document.getElementById('f2').style.display = 'none';
	document.getElementById('f3').style.display = 'none';
	if (v == '癌友')
	{
		document.getElementById('f1').style.display = '';
	}
	else if(v == '癌友家屬')
	{
		document.getElementById('f2').style.display = '';
	}
	else if(v == '醫護人員')
	{
		document.getElementById('f3').style.display = '';
	}
}
</script>

<div align="center"><center>
	<?php echo $UI->StatusBar($location)?>
	<table><tr><td></td></tr></table>
	<?php echo $UI->Win('修改 - ' . $tagArray['pageName'])?>
		<table width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<table width="100%" cellspacing="1" bgcolor="#9E9E9E">
						<form name="form" method="post" action="<?php echo $_table?>_editing.php" enctype="multipart/form-data">
						<input type="hidden" name="controlNo" value="<?php echo $_GET['controlNo']?>">						
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Name']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Name" maxlength="30" size="50" value="<?php echo $dbArray[$_table.'Name']?>">
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Gender']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="radio" name="<?php echo $_table?>Gender" value="男"<?php echo ($dbArray[$_table.'Gender'] == '男') ? ' checked' : ''?>> 男
								<input type="radio" name="<?php echo $_table?>Gender" value="女"<?php echo ($dbArray[$_table.'Gender'] == '女') ? ' checked' : ''?>> 女
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Tel']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Tel" maxlength="100" size="50" value="<?php echo $dbArray[$_table.'Tel']?>">
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Zip']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Zip" maxlength="10" size="10" value="<?php echo $dbArray[$_table.'Zip']?>">
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Address']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Address" maxlength="100" size="50" value="<?php echo $dbArray[$_table.'Address']?>">
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Email']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Email" maxlength="100" size="50" value="<?php echo $dbArray[$_table.'Email']?>">
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Type']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<select name="<?php echo $_table?>Type" onchange="f(this.value)">
									<option value="">請選擇</option>
									<option<?php echo ($dbArray[$_table.'Type'] == '癌友') ? ' selected' : ''?>>癌友</option>
									<option<?php echo ($dbArray[$_table.'Type'] == '癌友家屬') ? ' selected' : ''?>>癌友家屬</option>
									<option<?php echo ($dbArray[$_table.'Type'] == '醫護人員') ? ' selected' : ''?>>醫護人員</option>
								</select>
							</td>
						</tr>
						<tr height="25" id="f1"<?php echo ($dbArray[$_table.'Type'] == '癌友') ? '' : ' style="display:none"'?>>
							<td width="25%" bgcolor="#DEDEDE">
								癌友：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Cancer1" maxlength="20" size="10" value="<?php echo $dbArray[$_table.'Cancer']?>"> (填寫甚麼癌)
							</td>
						</tr>
						<tr height="25" id="f2"<?php echo ($dbArray[$_table.'Type'] == '癌友家屬') ? '' : ' style="display:none"'?>>
							<td width="25%" bgcolor="#DEDEDE">
								癌友家屬：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Cancer2" maxlength="20" size="10" value="<?php echo $dbArray[$_table.'Cancer']?>"> (填寫甚麼癌)
							</td>
						</tr>
						<tr height="25" id="f3"<?php echo ($dbArray[$_table.'Type'] == '醫護人員') ? '' : ' style="display:none"'?>>
							<td width="25%" bgcolor="#DEDEDE">
								醫護人員：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								我是<input type="text" name="<?php echo $_table?>Hospital" maxlength="20" size="10" value="<?php echo $dbArray[$_table.'Hospital']?>">醫院患者，
								患者為 <input type="text" name="<?php echo $_table?>Cancer3" maxlength="20" size="10" value="<?php echo $dbArray[$_table.'Cancer']?>">癌
								 (填寫甚麼癌)
							</td>
						</tr>
						
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Content']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<textarea name="<?php echo $_table?>Content" rows="10" cols="50"><?php echo $dbArray[$_table.'Content']?></textarea>
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Pic']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="file" name="<?php echo $_table?>Pic"> (不修改請保留空白)
							</td>
						</tr>
						<tr height="35">
							<td width="100%" bgcolor="#DEDEDE" align="center" colspan="3">
								<input type="submit" value="  確  定  送  出  ">
							</td>
						</tr>
						</form>
					</table>
				</td>
			</tr>
		</table>
	<?php echo $UI->Dow()?>
</center></div>

</body>
</html>