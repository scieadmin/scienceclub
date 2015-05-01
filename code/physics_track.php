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
$db =& JFactory::getDBO();
$week = date('W'); // Current week number
$day = date('w'); // Current numeric representation for the day
$tod = date('Y-m-d'); // Current date
$today = strtotime( date('Y-m-d', strtotime($tod)) ); 
$tomorrow = date('Y-m-d H:i:s', strtotime('+ 1 day', $today));
//Fetching track ID from URL using GET
$trackid = $_GET['abcon3diy5usumgbagfdsdlu'];
//If no track ID fetched, set track ID as 4 - id of first track in physics
if ($trackid == '') {$trackid = '4';}
//$trackid = '4'; // Use for override testing
//Fetching track name to show in RHS panel
$p_rhs_track_name = mysql_query("SELECT name FROM scie_k2_categories WHERE id = '$trackid'") or die(mysql_error());
$p_rhs_track_name_show = mysql_fetch_array($p_rhs_track_name);
?>
<h3 style="font-family:'NewCicleFina';margin:0px 0px 10px 0px;padding:0px;"><?php echo $p_rhs_track_name_show['name'];?></h3>
<div class="container">
    <div class="row">

        <!-- LHS content column -->

        <div class="col-sm-9 col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Topics</h3>
                </div>
                <div class="panel-body">
                    <?php
                    //Fetching topics from k2 category within the above track
                    $p_topics = mysql_query("SELECT * FROM scie_k2_categories WHERE parent = '$trackid' AND published = '1'") or die(mysql_error());
                    while($p_topics_show = mysql_fetch_array($p_topics)) {
                    ?>
                    <ul class="thumbnails" id="hover-cap" style="margin:0px;padding:0px;">
                        <!-- add id attr to thumbnail list -->
                        <li style="width:190px;float:left;list-style:none;margin-right:15px;">
                            <?php
                            $catid = $p_topics_show['id'];
                            //Fetch all items for the catid
                            $p_k2items = mysql_query("SELECT * FROM scie_k2_items WHERE catid = '$catid' ORDER BY ordering ASC") or die(mysql_error());
                            $i = 0;
                            // Matching using string of name field from k2 categories table to find its id in menu table
                            $topicname = $p_topics_show['name'];
                            $p_menuitem = mysql_query("SELECT id FROM scie_menu WHERE level = '3' AND published = '1' AND title LIKE '$topicname%'") or die(mysql_error());
                            $p_menuitemid_show = mysql_fetch_array($p_menuitem);
                            $p_menuitemid = $p_menuitemid_show['id'];
                            ?>
                            <div class="thumbnail">
                                <div class="caption">
                                    <h4 style="margin-top:0px;text-align:center;">
                                        <?php echo $p_topics_show['name']; ?>
                                    </h4>
                                    <p>
                                        <?php while($p_k2items_show = mysql_fetch_array($p_k2items)) {
                                        $i = $i + 1;
                                        ?>
                                        <!-- Looping to show Video, Concept and Assessment-->
                                        <?php if ($i == 1) { ?>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $p_k2items_show['id'];?>&Itemid=<?php echo $p_menuitemid;?>" class="btn btn-default btn-xs" style="margin:0px 5px 10px 12px;"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>&nbsp;Video</a>
                                        <?php }
                                        if ($i == 2) { ?>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $p_k2items_show['id'];?>&Itemid=<?php echo $p_menuitemid;?>" class="btn btn-default btn-xs" style="margin:0px 0px 10px 7px;"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;Concept</a>
                                        <?php } 
                                        if ($i == 3) { ?>
                                        <br/>
                                        <a href="index.php?option=com_k2&view=item&layout=item&id=<?php echo $p_k2items_show['id'];?>&Itemid=<?php echo $p_menuitemid;?>" class="btn btn-default btn-xs" style="margin:0px 0px 0px 40px;"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;Assessment</a>
                                        <div style="clear:both;"></div>
                                        <?php }} ?>
                                    </p>
                                    <p>
                                        <a href="#" class="btn btn-inverse" rel="tooltip" title="Preview"></a> <a href="#" rel="tooltip" title="Visit Website" class="btn btn-inverse"></a>
                                    </p>
                                </div>
                                <img style="width:100%;" src="media/k2/categories/<?php echo $p_topics_show['image'];?>">
                            </div>
                        </li>
                    </ul>
                    <?php } ?>
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
                    // Fetching all tracks for physics having parent id as 1 in k2 categories table
                    $p_tracks = mysql_query("SELECT * FROM scie_k2_categories WHERE parent = '1'") or die(mysql_error());
                    while($p_tracks_show = mysql_fetch_array($p_tracks)) { 
                        $id = $p_tracks_show['id'];
                        $track_title = $p_tracks_show['name'];
                        $p_track_menu_id = mysql_query("SELECT id FROM scie_menu WHERE title LIKE '$track_title%'") or die(mysql_error());
                        $p_track_menu_id_show = mysql_fetch_array($p_track_menu_id);
                        // Getting the number count of topics in each track
                        $counta = mysql_query("SELECT * FROM scie_k2_categories WHERE parent = '$id'");
                        $count = mysql_num_rows($counta);
                        // To set active class on LHS tracks menu
                        // If GET fetched track ID and ID in loop match, then set that item as active
                        if ($trackid == $id) {$activeornot = 'active';} else {$activeornot = '';}
                        if ($count != 0) {
                        ?>
                        <!-- article ID 12 is for article Physics track, ItemID 142 is for Physics menu item ID -->
                        <a href="index.php?option=com_content&abcon3diy5usumgbagfdsdlu=<?php echo $id; ?>&view=article&id=12&Itemid=142&Itemid=<?php echo $p_track_menu_id_show[id];?>" class="list-group-item <?php echo $activeornot; ?>"><span class="glyphicon glyphicon-folder-close"></span>&nbsp;&nbsp;&nbsp;<?php echo $p_tracks_show['name'];?><span class="badge"><?php echo $count;?></span></a>
                    <?php }} ?>
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