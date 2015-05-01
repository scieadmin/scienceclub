<?php
header("Cache: no-cache");
$user =& JFactory::getUser();
$userId = $user->get( 'id' );

$db =& JFactory::getDBO();
$articleid=$_GET['id'];
$cat_id=$_GET['catid'];
$links_query=mysql_query("SELECT * FROM scie_k2_items WHERE catid = '$cat_id' ORDER BY ordering ASC");
?>
<h3 style="font-family:'NewCicleFina';margin:0px 0px 10px 0px;padding:0px;">Related Links</h3>

             
                <div>
				<?php  while($links_query_show = mysql_fetch_array($links_query)) { 
				$topic_name_query_side=mysql_query("SELECT skc.name from scie_k2_items ski INNER JOIN scie_k2_categories skc 
				ON ski.catid=skc.id WHERE ski.id='".$articleid."'");

				$topic_name_side=mysql_fetch_array($topic_name_query_side);
				$p_menuitem_side = mysql_query("SELECT id FROM scie_menu WHERE level = '3' AND published = '1' AND title LIKE '".$topic_name_side['name']."%'");
				$p_menuitemid_show_side = mysql_fetch_array($p_menuitem_side);
				$p_menuitemid_side = $p_menuitemid_show_side['id']; 
                                $p_title=explode(':',$links_query_show['title']);
				?>
				 <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $links_query_show['id'];?>&Itemid=<?php echo $p_menuitemid_side;?>&catid=<?php echo $links_query_show['catid'];?>">
				 <?php echo $p_title[1].'</br>'; ?>
                 </a>
                   <?php 
				}
                   ?>
                </div>
          
		
