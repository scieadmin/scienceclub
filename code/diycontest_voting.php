<?php
header("Cache: no-cache");
$user =& JFactory::getUser();
$db =& JFactory::getDBO();

$diyc01 = mysql_query("SELECT DISTINCT user_id FROM scie_chronoengine_chronoforms_datatable_diycontest_voting WHERE choice LIKE 'DIYC01%'") or die(mysql_error());
$diyc01_nrows = mysql_num_rows($diyc01);

$diyc02 = mysql_query("SELECT DISTINCT user_id FROM scie_chronoengine_chronoforms_datatable_diycontest_voting WHERE choice LIKE 'DIYC02%'") or die(mysql_error());
$diyc02_nrows = mysql_num_rows($diyc02);

$diyc03 = mysql_query("SELECT DISTINCT user_id FROM scie_chronoengine_chronoforms_datatable_diycontest_voting WHERE choice LIKE 'DIYC03%'") or die(mysql_error());
$diyc03_nrows = mysql_num_rows($diyc03);

$diyc04 = mysql_query("SELECT DISTINCT user_id FROM scie_chronoengine_chronoforms_datatable_diycontest_voting WHERE choice LIKE 'DIYC04%'") or die(mysql_error());
$diyc04_nrows = mysql_num_rows($diyc04);

$diyc05 = mysql_query("SELECT DISTINCT user_id FROM scie_chronoengine_chronoforms_datatable_diycontest_voting WHERE choice LIKE 'DIYC05%'") or die(mysql_error());
$diyc05_nrows = mysql_num_rows($diyc05);

?>

<div style="background-color:#cccccc;padding:20px;">
<h4>See who's leading</h4>

<table>
	<tr>
		<td><?php echo $diyc01_nrows;?></td>
		<td>DIYC0112 - Sai Chakradhar, Class 7 - Narayana e Techno School</td>
	</tr>
	<tr>
		<td><?php echo $diyc02_nrows;?></td>
		<td>DIYC0212 - Munagalasriram, Class 7A, Narayana e-techno School</td>
	</tr>
	<tr>
		<td><?php echo $diyc03_nrows;?></td>
		<td>DIYC0312 - N.S Namitha, Class 7, Narayana e-techno School</td>
	</tr>
	<tr>
		<td><?php echo $diyc04_nrows;?></td>
		<td>DIYC0412 - Iniyan. S, Class 11, Mahatma Montessori Matriculation Higher Secondary School</td>
	</tr>
	<tr>
		<td><?php echo $diyc05_nrows;?></td>
		<td>DIYC0512 - Saravanayogesh, Class 11, Mahatma Montessori Matriculation Higher Secondary School</td>
	</tr>
</table>

</div>