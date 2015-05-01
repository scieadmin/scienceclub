<script src="media/cms/js/topicthumbhover_jquery.js"></script>
<script src="media/cms/js/topicthumbhover_bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("[rel='tooltip']").tooltip();    
    $('#hover-cap .thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    );    
});        
</script>
<?php
header("Cache: no-cache");
$user =& JFactory::getUser();
$userId = $user->get( 'id' );
jimport( 'joomla.access.access' );
$groups = JAccess::getGroupsByUser($userId, false);
$db =& JFactory::getDBO();
$content_statistics = mysql_query("SELECT ski.title,sce.reference_id FROM scie_content_statistics sce INNER JOIN scie_k2_items ski ON sce.reference_id=ski.id WHERE  sce.user_id='$userId' AND sce.component='com_k2' ORDER BY sce.date_event DESC LIMIT 10");
/*----- Latest topics ----------*/
$sub_query=mysql_query("SELECT id
FROM  `scie_k2_categories` where (parent=1) or (parent=2) or (parent=3)");
$sub=array();
while($subcategories=mysql_fetch_array($sub_query))
{
array_push($sub, $subcategories['id']);
}

$subjects_subStr= implode('","', $sub);
$subjects_subStr_fnl='"'.$subjects_subStr.'"';
$scatids = mysql_query("SELECT * FROM scie_k2_categories WHERE parent in ($subjects_subStr_fnl) AND published = '1' order by id DESC LIMIT 6") or die(mysql_error());

/*---------- END ------*/
?>
<!--<h3 style="font-family:'NewCicleFina';margin:0px 0px 10px 0px;padding:0px;">Recent Topics</h3>-->
<div class="container">
    <div class="row">

        <!-- LHS content column -->

        <div class="col-sm-9 col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-folder-open">      </span>&nbsp;&nbsp;My recent activity</h3>
                </div>
                <div class="panel-body">

<ul>
<?php 

while($show_result = mysql_fetch_array($content_statistics)) { 

$article_id=$show_result['reference_id'];
$topic_name_query=mysql_query("SELECT skc.name,ski.catid from scie_k2_items ski INNER JOIN scie_k2_categories skc 
ON ski.catid=skc.id WHERE ski.id='".$article_id."'");
$topic_name=mysql_fetch_array($topic_name_query);
$p_menuitem = mysql_query("SELECT id FROM scie_menu WHERE level = '3' AND published = '1' AND title LIKE '".$topic_name['name']."%'");
$p_menuitemid_show = mysql_fetch_array($p_menuitem);
$p_menuitemid = $p_menuitemid_show['id']; 


?>
  
<li> 
<a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $show_result['reference_id'];?>&Itemid=<?php echo $p_menuitemid;?>&catid=<?php echo $topic_name['catid'];?>"><?php echo $show_result['title']; ?>
</a>
<?php // echo $show_result['title']; ?>
 </li>

<?php  }


 ?>
</ul>



           </div>
       </div>
  </div>
  
  
    <div class="col-sm-9 col-md-9" style="width:102%;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-folder-open">      </span>&nbsp;&nbsp;Latest Topics</h3>
                </div>
                <div class="panel-body">
               <?php

while($catnames=mysql_fetch_array($scatids))
{
//array_push($p_subids, $catnames_physics['id']);
?>
   <ul class="thumbnails" id="hover-cap" style="margin:0px;padding:0px;">
                        <!-- add id attr to thumbnail list -->
                        <li style="width:190px;float:left;list-style:none;margin-right:15px;">
                            <?php
                            $scatid = $catnames['id'];
                            //Fetch all items for the catid
							
                            $r_k2items = mysql_query("SELECT * FROM scie_k2_items WHERE catid = '$scatid' ORDER BY ordering ASC") or die(mysql_error());
                            $i = 0;
                            // Matching using string of name field from k2 categories table to find its id in menu table
                            $rtopicname = $catnames['name'];
							
                            $r_menuitem = mysql_query("SELECT id FROM scie_menu WHERE level = '3' AND published = '1' AND title LIKE '$rtopicname%'") or die(mysql_error());
                            $r_menuitemid_show = mysql_fetch_array($r_menuitem);
                            $r_menuitemid = $r_menuitemid_show['id'];
                            ?>
                            <div class="thumbnail">
                                <div class="caption">
								     
                                    <h4 style="margin-top:0px;text-align:center;">
                                        <?php echo $catnames['name']; ?>
                                    </h4>
				  <?php   if (in_array('2', $groups) && !in_array('10',$groups))  {  ?>
									
									 		    <p>
                                        <?php while($r_k2items_show = mysql_fetch_array($r_k2items)) {
                                        $i = $i + 1;
										if($r_k2items_show['access']==2)  {
                                        ?>
                                        <!-- Looping to show Video, Concept and Assessment-->
										
                                        <?php if ($i == 1) { ?>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $r_k2items_show['id'];?>&Itemid=<?php echo $r_menuitemid;?>&catid=<?php echo $r_k2items_show['catid'];?>" class="btn btn-default btn-xs" style="margin:0px 5px 10px 12px;"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>&nbsp;Video</a>
                                        <?php }
                                        if ($i == 2) { ?>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $r_k2items_show['id'];?>&Itemid=<?php echo $r_menuitemid;?>&catid=<?php echo $r_k2items_show['catid'];?>" class="btn btn-default btn-xs" style="margin:0px 0px 10px 7px;"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;Concept</a>
                                        <?php } 
                                        if ($i == 3) { ?>
                                        <br/>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $r_k2items_show['id'];?>&Itemid=<?php echo $r_menuitemid;?>&catid=<?php echo $r_k2items_show['catid'];?>" class="btn btn-default btn-xs" style="margin:0px 0px 0px 40px;"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;Assessment</a>
                                        <div style="clear:both;"></div>
                                        <?php } } else {  ?>
											  <div style="margin: 10px 35px;" class="btn btn-lg btn-warning"><a href="index.php?option=com_comprofiler&task=pluginclass&plugin=cbpaidsubscriptions&do=displayplans&plans=1" style="text-decoration:none;color:#fff">Upgrade</a></div>  
									  <?php	 break; }
										 
										} ?>
                                    </p> 
                                   <?php }  else { ?>
                                    <p>
                                        <?php while($r_k2items_show = mysql_fetch_array($r_k2items)) {
                                        $i = $i + 1;
                                        ?>
                                        <!-- Looping to show Video, Concept and Assessment-->
                                        <?php if ($i == 1) { ?>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $r_k2items_show['id'];?>&Itemid=<?php echo $r_menuitemid;?>&catid=<?php echo $r_k2items_show['catid'];?>" class="btn btn-default btn-xs" style="margin:0px 5px 10px 12px;"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>&nbsp;Video</a>
                                        <?php }
                                        if ($i == 2) { ?>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $r_k2items_show['id'];?>&Itemid=<?php echo $r_menuitemid;?>&catid=<?php echo $r_k2items_show['catid'];?>" class="btn btn-default btn-xs" style="margin:0px 0px 10px 7px;"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;Concept</a>
                                        <?php } 
                                        if ($i == 3) { ?>
                                        <br/>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $r_k2items_show['id'];?>&Itemid=<?php echo $r_menuitemid;?>&catid=<?php echo $r_k2items_show['catid'];?>" class="btn btn-default btn-xs" style="margin:0px 0px 0px 40px;"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;Assessment</a>
                                        <div style="clear:both;"></div>
                                        <?php }} ?>
                                    </p>
								   <?php } ?>
                                    <p>
                                        <a href="#" class="btn btn-inverse" rel="tooltip" title="Preview"></a> <a href="#" rel="tooltip" title="Visit Website" class="btn btn-inverse"></a>
                                    </p>
                                </div>
                                <img style="width:100%;" src="media/k2/categories/<?php echo $catnames['image'];?>">
                            </div>
                        </li>
						</ul>
                   
<?php
} 
?>
        </div>
       </div>
  </div>
  
  
  
  
  
   </div>
</div>

<style>
#hover-cap .thumbnail {
    position:relative;
    overflow:hidden;
    height:145px;
}
.caption {
    display: none;
    position: absolute;
    top: 0;
    left: 0;
    background: rgba(0,0,0,0.6);
    width: 100%;
    height: 100%;
    color:#fff !important;
}
</style>