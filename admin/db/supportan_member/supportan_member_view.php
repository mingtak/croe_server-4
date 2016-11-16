<?php
/******************************************************************/
// Initialize
/******************************************************************/
include ("../check.php");

$_table = TABLE_PREFIX.'member';

CheckEmpty($_GET['controlNo'], "控制代碼");

$DB->Select(DATABASE);
$dbQuery = $DB->Query("SELECT * FROM ".$_table." WHERE ".$_table."No = '". $_GET['controlNo'] ."';");

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

<div align="center"><center>
	<?php echo $UI->StatusBar($location)?>
	<table><tr><td></td></tr></table>
	<?php echo $UI->Win('瀏覽 - ' . $tagArray['pageName'])?>
		<table width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<table width="100%" cellspacing="1" bgcolor="#9E9E9E">
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Name']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<?php echo $dbArray[$_table.'Name']?>
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Gender']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<?php echo $dbArray[$_table.'Gender']?>
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Tel']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<?php echo $dbArray[$_table.'Tel']?>
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Zip']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<?php echo $dbArray[$_table.'Zip']?>
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Address']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<?php echo $dbArray[$_table.'Address']?>
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Email']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<?php echo $dbArray[$_table.'Email']?>
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Type']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<?php echo $dbArray[$_table.'Type']?>
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Cancer']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<?php echo $dbArray[$_table.'Cancer']?>
							</td>
						</tr>
						<?php
						if ($dbArray[$_table.'Type'] == '醫護人員')
						{
						?>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Hospital']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<?php echo $dbArray[$_table.'Hospital']?>
							</td>
						</tr>
						<?php
						}
						?>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Info']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<?php echo $dbArray[$_table.'Info']?>
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Content']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<?php echo nl2br($dbArray[$_table.'Content'])?>
							</td>
						</tr>
						<tr height="25">
							<td width="25%" bgcolor="#DEDEDE">
								<?php echo $_fieldData[$_table.'Pic']?>：
							</td>
							<td width="75%" bgcolor="#FFFFFF">
								<img src="<?php echo UPLOAD . $dbArray[$_table.'Pic']?>">
							</td>
						</tr>
						<tr height="35">
							<td width="100%" bgcolor="#DEDEDE" align="center" colspan="3">
								<input type="button" value="  返  回  上  頁  " onClick="history.back()">
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	<?php echo $UI->Dow()?>
</center></div>

</body>
</html>