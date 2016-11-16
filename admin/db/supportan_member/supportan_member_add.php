<?php
/******************************************************************/
// Initialize
/******************************************************************/
include ("../check.php");

$_table = TABLE_PREFIX.'member';

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
	<?php echo $UI->Win('新增 - ' . $tagArray['pageName'])?>
		<table width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<table width="100%" cellspacing="1" bgcolor="#9E9E9E">
						<form name="form" method="post" action="<?php echo $_table?>_adding.php" enctype="multipart/form-data">
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Name']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Name" maxlength="30" size="50">
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Gender']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="radio" name="<?php echo $_table?>Gender" value="男" checked> 男
								<input type="radio" name="<?php echo $_table?>Gender" value="女"> 女
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Tel']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Tel" maxlength="100" size="50">
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Zip']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Zip" maxlength="10" size="10">
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Address']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Address" maxlength="100" size="50">
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Email']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Email" maxlength="100" size="50">
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Type']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<select name="<?php echo $_table?>Type" onchange="f(this.value)">
									<option value="">請選擇</option>
									<option>癌友</option>
									<option>癌友家屬</option>
									<option>醫護人員</option>
								</select>
							</td>
						</tr>
						<tr height="25" id="f1" style="display:none">
							<td width="25%" bgcolor="#DEDEDE">
								癌友：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Cancer1" maxlength="20" size="10"> (填寫甚麼癌)
							</td>
						</tr>
						<tr height="25" id="f2" style="display:none">
							<td width="25%" bgcolor="#DEDEDE">
								癌友家屬：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="text" name="<?php echo $_table?>Cancer2" maxlength="20" size="10"> (填寫甚麼癌)
							</td>
						</tr>
						<tr height="25" id="f3" style="display:none">
							<td width="25%" bgcolor="#DEDEDE">
								醫護人員：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								我是<input type="text" name="<?php echo $_table?>Hospital" maxlength="20" size="10">醫院患者，
								患者為 <input type="text" name="<?php echo $_table?>Cancer3" maxlength="20" size="10">癌
								 (填寫甚麼癌)
							</td>
						</tr>
						
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Content']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<textarea name="<?php echo $_table?>Content" rows="10" cols="50"></textarea>
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Pic']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<input type="file" name="<?php echo $_table?>Pic">
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
