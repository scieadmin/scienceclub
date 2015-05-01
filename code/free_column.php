<?php
header("Cache: no-cache");
$user =& JFactory::getUser();
$db =& JFactory::getDBO();

$week = date('W'); // Current week number
$day = date('w'); // Current numeric representation for the day
$tod = date('Y-m-d'); // Current date

// -------- Overrides -----------
//$week = '52'; // Current week number
//$day = '4'; // Current numeric representation for the day
//$tod = '2014-12-25'; // Current date

$today = strtotime( date('Y-m-d', strtotime($tod)) );
$tomorrow = date('Y-m-d H:i:s', strtotime('+ 1 day', $today));

// week_start = publish up date has to be less than week's first day
// week_end = publish down date has to be greater than week's last day

// if day = 0 Sunday
if ($day == 0) {
$week_start = date('Y-m-d H:i:s', strtotime('this week last monday'.'- 1 day', $today));
$week_end = date('Y-m-d H:i:s', strtotime('this week this sunday'.'+ 1 day', $today));
}

// if day = 1 Monday
else if ($day == 1) {
$week_start = date('Y-m-d H:i:s', strtotime('this week this monday'.'- 1 day', $today));
$week_end = date('Y-m-d H:i:s', strtotime('this week next sunday'.'+ 1 day', $today));
}

// if day = 2, 3, 4, 5, 6
else {
$week_start = date('Y-m-d H:i:s', strtotime('this week last monday'.'- 1 day', $today));
$week_end = date('Y-m-d H:i:s', strtotime('this week next sunday'.'+ 1 day', $today));



}

/* 

// -------- Debugging -----------

echo '<br>'.'Weekstart: '.$week_start;
echo '<br><br>'.'Week #: '.$week;
echo '<br>'.'Today: '.$tod;
echo '<br>'.'Today timestamp: '.$today;
echo '<br>'.'Tomorrow: '.$tomorrow;
echo '<br>'.'Day #: '.$day;
echo '<br><br>'.'Weekend: '.$week_end;
echo '<br><br>';

*/
?>

<h3 class="module module-title" style="font-family:'NewCicleFina';font-size:40px;padding:15px 0px 0px 0px;">Week #<?php echo $week;?></h3>
<div style="font-family:'NewCicleFina';font-size:18px;text-align:center;"><?php echo date('jS F Y');?></div>
<?php
// catid 18 is K2 category ID for Interesting Days
$fcid = mysql_query("SELECT * FROM scie_k2_items WHERE catid = '18' AND created > '$week_start' AND created < '$week_end'") or die(mysql_error());
$fcid_num = mysql_num_rows($fcid);
if ($fcid_num>0){
?>
<h3 class="module module-title" style="font-family:'NewCicleFina';margin:30px 0px 10px 0px;display:block;border-bottom:solid 1px #cccccc;">Interesting Days</h3>
<ul class="calcontainer">
<?php while($fcid_show = mysql_fetch_array($fcid)) { 
	// Converting date into appropriate class name for showing calendar icon
	$fcid_calclass = date_create($fcid_show['created']);
	$fcid_prndate = date_format($fcid_calclass, 'Md');

	?>
	<!-- Fetching the K2 item ID and Itemid=132 for Dummy menu's menu item ID -->
	<a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $fcid_show['id'];?>&Itemid=132">
	<li class="calday">
		<div class="calicon <?php echo $fcid_prndate;?>"></div>
		<div class="calcontent"><?php echo $fcid_show['title'];?></div>
		<div style="clear:both;"></div>
	</li></a>
<?php } ?>
</ul>
<?php } ?>


<?php
// catid 16 is K2 category ID for Science Corner
$fcsc = mysql_query("SELECT * FROM scie_k2_items WHERE catid = '16' AND created > '$week_start' AND created < '$tomorrow' ORDER BY created ASC LIMIT 5") or die(mysql_error());
$fcsc_num = mysql_num_rows($fcsc);
if ($fcsc_num>0){
?>
<h3 class="module module-title" style="font-family:'NewCicleFina';margin:30px 0px 10px 0px;display:block;border-bottom:solid 1px #cccccc;">Science Corner</h3>
<ul class="calcontainer">
<?php while($fcsc_show = mysql_fetch_array($fcsc)) { 
	// Converting date into appropriate class name for showing calendar icon
	$fcsc_calclass = date_create($fcsc_show['created']);
	$fcsc_prndate = date_format($fcsc_calclass, 'Md');

	?>
	<!-- Fetching the K2 item ID and Itemid=140 for Dummy menu's menu item ID -->
	<a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $fcsc_show['id'];?>&Itemid=140">
	<li class="calday">
		<div class="calicon <?php echo $fcsc_prndate;?>"></div>
		<div class="calcontent"><?php echo $fcsc_show['title'];?></div>
		<div style="clear:both;"></div>
	</li>
	</a>
<?php } ?>
</ul>
<?php } ?>


<?php
// catid 16 is K2 category ID for Science Puzzle
if (($day > 3) OR ($day < 1))
{
	$fcsp = mysql_query("SELECT * FROM scie_k2_items WHERE catid = '17' AND created > '$week_start' AND created < '$week_end' ORDER BY created ASC") or die(mysql_error());
}
else
{
	$fcsp = mysql_query("SELECT * FROM scie_k2_items WHERE catid = '17' AND created > '$week_start' AND created < '$week_end' ORDER BY created ASC LIMIT 1") or die(mysql_error());
}
$fcsp_num = mysql_num_rows($fcsp);
if ($fcsp_num>0){
?>
<h3 class="module module-title" style="font-family:'NewCicleFina';margin:30px 0px 10px 0px;display:block;border-bottom:solid 1px #cccccc;">Science Puzzle</h3>
<ul class="calcontainer">
<?php while($fcsp_show = mysql_fetch_array($fcsp)) { 
	// Converting date into appropriate class name for showing calendar icon
	$fcsp_calclass = date_create($fcsp_show['created']);
	$fcsp_prndate = date_format($fcsp_calclass, 'Md');

	?>
	<!-- Fetching the K2 item ID and Itemid=141 for Dummy menu's menu item ID -->
	<a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $fcsp_show['id'];?>&Itemid=141">
	<li class="calday">
		<div class="calicon <?php echo $fcsp_prndate;?>"></div>
		<div class="calcontent"><?php echo $fcsp_show['title'];?></div>
		<div style="clear:both;"></div>
	</li>
	</a>
<?php } ?>
</ul>
<?php } ?>