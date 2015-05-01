<style>
.boxgreen{width:6px;border-right:solid 1px #999999;float:left;height:20px;background-color: #8dC63F;}
.boxgrey{width:6px;border-right:solid 1px #999999;float:left;height:20px;background-color: #999999;}
.courseprogress{float:left;font-size:10px;margin-right:5px;line-height:10px;text-align:right;}
.navicontainer{padding:10px;width:530px;float:left;}
</style>
<?php
header("Cache: no-cache");
$user =& JFactory::getUser();
$db =& JFactory::getDBO();
$show = $_GET['kitem'];




// Changed in INSERT query and FIND query. Check $den necessasity.





// CHANGE THE FOLLOWING
// Course name to appear within H2 tags
$coursename = "Dynamics";
// File code
$filecode = "dy";$GLOBALS['gfilecode']=$filecode;
// Maximum course items
$item_num = 61;$GLOBALS['gitem_num']=$item_num;

// Menu URL
$murl = "index.php?option=com_chronoforms5&view=form&Itemid=296";$GLOBALS['gmurl']=$murl;
// Content URL
$curl = "index.php?option=com_chronoforms5&view=form&Itemid=297";$GLOBALS['gcurl']=$curl;
// Content files path
$citempath = "files/summercamp_201504/dynamics/";


// Finding maximum accessed course item
$verify = mysql_query("SELECT MAX(text2) AS maxtest2 FROM `scie_chronoengine_chronoforms_datatable_summercamp_dynamics_menu` WHERE text1 = '$user->id'") or die(mysql_error());
$verify_show = mysql_fetch_array($verify);
$max=$verify_show['maxtest2'];
$cropy=explode($filecode,$max);
$cropyreplace=$cropy[0].$cropy[1];
$maxy=intval($cropyreplace);$GLOBALS['gmaxy']=$maxy;
$crop=explode($filecode,$show);
$cropreplace=$crop[0].$crop[1];
$den=intval($cropreplace);
$next=$den+1;$GLOBALS['gnext']=$next;
$back=$den-1;$GLOBALS['gback']=$back;

// Course progress and navigation for all items except first
function cp() {
echo "<div style=\"height:40px;\"><div class=\"navicontainer\"><div class=\"courseprogress\">Course<br>progress</div>";
for($counter=0;$counter<$GLOBALS['gmaxy'];$counter++){echo "<div class=\"boxgreen\"></div>";}
for($counter=$GLOBALS['gmaxy'];$counter<$GLOBALS['gitem_num'];$counter++){echo "<div class=\"boxgrey\"></div>";}
echo "</div><div style=\"float:right;width:130px;text-align:right;\"><a class=\"btn btn-regular\" href=\"".$GLOBALS['gcurl']."&kitem=dy".$GLOBALS['gback']."\">Back</a>&nbsp;<a class=\"btn btn-success\" href=\"".$GLOBALS['gcurl']."&kitem=".$GLOBALS['gfilecode'].$GLOBALS['gnext']."\">Next</a></div></div>";
}
?>


<?php
// Check if this is the first item being accessed
if ($den == 1)
{
	$find = mysql_query("SELECT * FROM scie_chronoengine_chronoforms_datatable_summercamp_dynamics_menu WHERE text1 = '$user->id' AND text2 = '$filecode' AND text3 = '$show'") or die(mysql_error());
	$find_num = mysql_num_rows($find);
	if ($find_num<1)
	{
		mysql_query("INSERT INTO scie_chronoengine_chronoforms_datatable_summercamp_dynamics_menu (text1,text2,text3) VALUES ('$user->id','$filecode','$show')");
	}

	echo "<h2>".$coursename."</h2>";
	// First content item alone
	if ($show == $filecode."1")
	{ 
		// Course progress and navigation for first item
		echo "<div style=\"height:40px;\"><div class=\"navicontainer\"><div class=\"courseprogress\">Course<br>progress</div>";
		for($counter=0;$counter<$GLOBALS['gmaxy'];$counter++){echo "<div class=\"boxgreen\"></div>";}
		for($counter=$GLOBALS['gmaxy'];$counter<$GLOBALS['gitem_num'];$counter++){echo "<div class=\"boxgrey\"></div>";}
		echo "</div><div style=\"float:right;width:130px;text-align:right;\"><a class=\"btn btn-success\" href=\"".$GLOBALS['gcurl']."&kitem=".$filecode.$GLOBALS['gnext']."\">Next</a></div></div>";
		include $citempath.$filecode.'1.php';
	}
}
else
{
	// URL malpractice verification
	$oneless = $den -1;
	$showprev= $filecode.$oneless;
	$verify = mysql_query("SELECT * FROM scie_chronoengine_chronoforms_datatable_summercamp_dynamics_menu WHERE text1 = '$user->id' AND text2 = '$showprev'") or die(mysql_error());
	$verify_num = mysql_num_rows($verify);
	if ($verify_num<1)
	{
	//echo "Not allowed to view this content. Please view the course in sequence. Access the last enabled item.";
	// header('Location: index.php?option=com_chronoforms5&view=form&Itemid=297');
	echo "<META http-equiv=\"refresh\" content=\"0;URL=".$curl."&kitem=".$max."\">";
	echo "<h2>Not allowed to view this content</h2>";
	echo "<p>Redirecting...</p>";
	}

	// CONTENT SHOW START
	else
	{
		$find = mysql_query("SELECT * FROM scie_chronoengine_chronoforms_datatable_summercamp_dynamics_menu WHERE text1 = '$user->id' AND text2 = '$filecode' AND text3 = '$show'") or die(mysql_error());
		$find_num = mysql_num_rows($find);
		if ($find_num<1)
		{
			mysql_query("INSERT INTO scie_chronoengine_chronoforms_datatable_summercamp_dynamics_menu (text1,text2,text3) VALUES ('$user->id','$filecode','$show')");
		}
		
		echo "<h2>".$coursename."</h2>";
		// Second content item onwards
		for ($count=2; $count <= $item_num; $count++)
		{ 
			if ($show == $filecode.$count) { cp(); include $citempath.$filecode.$count.'.php';}	
		}
	}
}
?>