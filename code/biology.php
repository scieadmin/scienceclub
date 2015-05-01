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
$week = date('W'); // Current week number
$day = date('w'); // Current numeric representation for the day
$tod = date('Y-m-d'); // Current date
$today = strtotime( date('Y-m-d', strtotime($tod)) ); 
$tomorrow = date('Y-m-d H:i:s', strtotime('+ 1 day', $today));
//Fetching track ID from URL using GET
$trackid = $_GET['abcon3diy5usumgbagfdsdlu'];
//If no track ID fetched, set track ID as 4 - id of first track in biology
if ($trackid == '') {$trackid = '12';}
//$trackid = '12'; // Use for override testing
//Fetching track name to show in RHS panel
$p_rhs_track_name = mysql_query("SELECT name FROM scie_k2_categories WHERE id = '$trackid'") or die(mysql_error());
$p_rhs_track_name_show = mysql_fetch_array($p_rhs_track_name);

/*----------------- BIOLOGY NEW TOPICS ----------------*/
$bio_query=mysql_query("SELECT id
FROM  `scie_k2_categories` where parent=3");

$b_sub=array();
while($bio_subcategories=mysql_fetch_array($bio_query))
{
array_push($b_sub, $bio_subcategories['id']);
}
$bio_subStr = implode('","', $b_sub);
$bio_subStr_fnl='"'.$bio_subStr.'"';

$bio_scatids = mysql_query("SELECT * FROM scie_k2_categories WHERE parent in ($bio_subStr_fnl) AND published = '1' order by id DESC LIMIT 6") or die(mysql_error());

/*-------------- BIOLOGY NEW TOPICS END ------------------*/
?>
<h3 style="font-family:'NewCicleFina';margin:0px 0px 10px 0px;padding:0px;">biology</h3>
<div class="container">
    <div class="row">
        
        <!-- LHS content column -->

        <div class="col-sm-9 col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Latest Topics</h3>
                </div>
                <div class="panel-body">
                <?php
while($catnames_biology=mysql_fetch_array($bio_scatids))
{
//array_push($p_subids, $catnames_physics['id']);
?>
   <ul class="thumbnails" id="hover-cap" style="margin:0px;padding:0px;">
                        <!-- add id attr to thumbnail list -->
                        <li style="width:190px;float:left;list-style:none;margin-right:15px;">
                            <?php
                            $biocatid = $catnames_biology['id'];
                            //Fetch all items for the catid
							
                            $b_k2items = mysql_query("SELECT * FROM scie_k2_items WHERE catid = '$biocatid' ORDER BY ordering ASC") or die(mysql_error());
                            $i = 0;
                            // Matching using string of name field from k2 categories table to find its id in menu table
                            $btopicname = $catnames_biology['name'];
							
                            $b_menuitem = mysql_query("SELECT id FROM scie_menu WHERE level = '3' AND published = '1' AND title LIKE '$btopicname%'") or die(mysql_error());
                            $b_menuitemid_show = mysql_fetch_array($b_menuitem);
                            $b_menuitemid = $b_menuitemid_show['id'];
                            ?>
                            <div class="thumbnail">
                                <div class="caption">
								     
                                    <h4 style="margin-top:0px;text-align:center;">
                                        <?php echo $catnames_biology['name']; ?>
                                    </h4>
				  <?php   if (in_array('2', $groups) && !in_array('10',$groups))  {  ?>
									
									 		    <p>
                                        <?php while($b_k2items_show = mysql_fetch_array($b_k2items)) {
                                        $i = $i + 1;
										if($b_k2items_show['access']==2)  {
                                        ?>
                                        <!-- Looping to show Video, Concept and Assessment-->
										
                                        <?php if ($i == 1) { ?>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $b_k2items_show['id'];?>&Itemid=<?php echo $b_menuitemid;?>&catid=<?php echo $b_k2items_show['catid'];?>" class="btn btn-default btn-xs" style="margin:0px 5px 10px 12px;"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>&nbsp;Video</a>
                                        <?php }
                                        if ($i == 2) { ?>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $b_k2items_show['id'];?>&Itemid=<?php echo $b_menuitemid;?>&catid=<?php echo $b_k2items_show['catid'];?>" class="btn btn-default btn-xs" style="margin:0px 0px 10px 7px;"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;Concept</a>
                                        <?php } 
                                        if ($i == 3) { ?>
                                        <br/>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $b_k2items_show['id'];?>&Itemid=<?php echo $b_menuitemid;?>&catid=<?php echo $b_k2items_show['catid'];?>" class="btn btn-default btn-xs" style="margin:0px 0px 0px 40px;"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;Assessment</a>
                                        <div style="clear:both;"></div>
                                        <?php } } else {  ?>
											  <div style="margin: 10px 35px;" class="btn btn-lg btn-warning"><a href="index.php?option=com_comprofiler&task=pluginclass&plugin=cbpaidsubscriptions&do=displayplans&plans=1" style="text-decoration:none;color:#fff">Upgrade</a></div>  
									  <?php	 break; }
										 
										} ?>
                                    </p> 
                                   <?php }  else { ?>
                                    <p>
                                        <?php while($b_k2items_show = mysql_fetch_array($b_k2items)) {
                                        $i = $i + 1;
                                        ?>
                                        <!-- Looping to show Video, Concept and Assessment-->
                                        <?php if ($i == 1) { ?>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $b_k2items_show['id'];?>&Itemid=<?php echo $b_menuitemid;?>&catid=<?php echo $b_k2items_show['catid'];?>" class="btn btn-default btn-xs" style="margin:0px 5px 10px 12px;"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>&nbsp;Video</a>
                                        <?php }
                                        if ($i == 2) { ?>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $b_k2items_show['id'];?>&Itemid=<?php echo $b_menuitemid;?>&catid=<?php echo $b_k2items_show['catid'];?>" class="btn btn-default btn-xs" style="margin:0px 0px 10px 7px;"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;Concept</a>
                                        <?php } 
                                        if ($i == 3) { ?>
                                        <br/>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $b_k2items_show['id'];?>&Itemid=<?php echo $b_menuitemid;?>&catid=<?php echo $b_k2items_show['catid'];?>" class="btn btn-default btn-xs" style="margin:0px 0px 0px 40px;"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;Assessment</a>
                                        <div style="clear:both;"></div>
                                        <?php }} ?>
                                    </p>
								   <?php } ?>
                                    <p>
                                        <a href="#" class="btn btn-inverse" rel="tooltip" title="Preview"></a> <a href="#" rel="tooltip" title="Visit Website" class="btn btn-inverse"></a>
                                    </p>
                                </div>
                                <img style="width:100%;" src="media/k2/categories/<?php echo $catnames_biology['image'];?>">
                            </div>
                        </li>

<?php
}
?>

                </div>
            </div>
        </div>

        <!-- RHS content column -->
        
        <div class="col-sm-3 col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tracks</h3>
                </div>
                <div class="list-group">
                    <?php
                    // Fetching all tracks for biology having parent id as 3 in k2 categories table
                    $p_tracks = mysql_query("SELECT * FROM scie_k2_categories WHERE parent = '3'") or die(mysql_error());
                    while($p_tracks_show = mysql_fetch_array($p_tracks)) { 
                        $id = $p_tracks_show['id'];
                        $track_title = $p_tracks_show['name'];
                        $p_track_menu_id = mysql_query("SELECT id FROM scie_menu WHERE title LIKE '$track_title%'") or die(mysql_error());
                        $p_track_menu_id_show = mysql_fetch_array($p_track_menu_id);
                        // Getting the number count of topics in each track
                        $counta = mysql_query("SELECT * FROM scie_k2_categories WHERE parent = '$id'");
                        $count = mysql_num_rows($counta);
                        if ($count != 0) {
                        ?>
                        <!-- article ID 8 is for article biology track, ItemID 144 is for biology menu item ID -->
                        <a href="index.php?option=com_content&abcon3diy5usumgbagfdsdlu=<?php echo $id; ?>&view=article&id=14&Itemid=144&Itemid=<?php echo $p_track_menu_id_show[id];?>" class="list-group-item"><span class="glyphicon glyphicon-folder-close"></span>&nbsp;&nbsp;&nbsp;<?php echo $p_tracks_show['name'];?><span class="badge"><?php echo $count;?></span></a>
                    <?php }} ?>
                </div>
            </div>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" style="right:0px;" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span style="margin:5px 10px 0px 0px;font-size:27px;float:left;" class="glyphicon glyphicon-info-sign"></span> <strong>Important safety measures</strong><br/>
                <ul style="margin-left:7px;">
                    <li>Think safety first. Wear safety goggles and lab coat.</li>
                    <li>Know what you're working with. Store and handle hazardous materials safely.</li>
                    <li>If you don't know, ask an adult.</li>
                </ul>
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