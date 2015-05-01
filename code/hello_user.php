<?php
header("Cache: no-cache");
$user =& JFactory::getUser();
$db =& JFactory::getDBO();

$naka = mysql_query("SELECT * FROM scie_users WHERE id = $user->id") or die(mysql_error());
$det = mysql_fetch_array($naka);
//echo date("Y-m-d H:i:s");
?>
<div>Hello <a style="color:#fff;font-weight:bold;" href="index.php?option=com_comprofiler&Itemid=168"><?php echo $det['name'];?></a>!</div>