<style>
.courseitems{
	line-height: 30px;
}
</style>
<?php
header("Cache: no-cache");
$user =& JFactory::getUser();
$db =& JFactory::getDBO();
// content URL
$curl = "index.php?option=com_chronoforms5&view=form&Itemid=297";
// Maximum course items
$item_num = 65;

// Finding maximum accessed course item
$verify = mysql_query("SELECT MAX(id) AS maxtest2 FROM `scie_chronoengine_chronoforms_datatable_summercamp_dynamics_menu` WHERE text1 = '$user->id'") or die(mysql_error());
$verify_show = mysql_fetch_array($verify);
$max_query=mysql_query("select text2 FROM `scie_chronoengine_chronoforms_datatable_summercamp_dynamics_menu` where id='".$verify_show['maxtest2']."'");
$max_result= mysql_fetch_array($max_query);
$max = $max_result['text2'];
//echo $max;
echo "<br>";
$crop = explode("dy",$max);
$cropreplace=$crop[0].$crop[1];
$den = intval($cropreplace);
//echo $den;
echo "<br>";
$den = $den +1;


// For all items, setting disabled class flag
$c = 1;
for ($counter = 0; $counter <= $item_num; $counter ++) { 
	if ($c <= $den) {${'dis'.$c} = 0;} else {${'dis'.$c} = 1;}
	$c = $c + 1;
}
?>

<h2>Dynamics</h2>
<h3>Course structure</h3>
<ol class="courseitems">
	<li>Course:&nbsp;
		<a class="btn btn-primary btn-xs" href="<?php echo $curl."&kitem=dy1"?>">Video</a>&nbsp;
	</li>
	<li>Introduction to Fun with FUNdamentals:&nbsp;
		<a class="btn btn-primary btn-xs <?php if ($dis2==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy2"?>">Video</a>&nbsp;
		<ul>
			<li>Corrugated paper:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis3==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy3"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis4==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy4"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis5==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy5"?>">Assessment</a>
			</li>
			<li>Catching a die on your elbow:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis6==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy6"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis7==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy7"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis8==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy8"?>">Assessment</a>
			</li>
			<li>Rapid transit:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis9==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy9"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis10==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy10"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis11==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy11"?>">Assessment</a>
			</li>
			<li>Fun with FUNdamentals - Recap and Going Forward:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis12==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy12"?>">Video</a>
			</li>
			<li>Slow but steady:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis13==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy13"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis14==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy14"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis15==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy15"?>">Assessment</a>
			</li>
			<li>Watching inertia at work:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis16==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy16"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis17==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy17"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis18==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy18"?>">Assessment</a>
			</li>
			<li>Fun with FUNdamentals - Conclusion:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis19==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy19"?>">Video</a>
			</li>
		</ul>
	</li>
	<li>Introduction to Dive Deep into Dynamics:&nbsp;
		<a class="btn btn-primary btn-xs <?php if ($dis20==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy20"?>">Video</a>&nbsp;
		<ul>
			<li>Catch the dice:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis21==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy21"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis22==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy22"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis23==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy23"?>">Assessment</a>
			</li>
			<li>The Rising coin:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis24==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy24"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis25==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy25"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis26==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy26"?>">Assessment</a>
			</li>
			<li>Cantilever bridge:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis27==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy27"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis28==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy28"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis29==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy29"?>">Assessment</a>
			</li>
			<li>Dive Deep into Dynamics - Recap and Going Forward:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis30==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy30"?>">Video</a>
			</li>
			<li>Drawing board:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis31==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy31"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis32==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy32"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis33==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy33"?>">Assessment</a>
			</li>
			<li>Speedy manipulations:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis34==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy34"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis35==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy35"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis36==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy36"?>">Assessment</a>
			</li>
			<li>Dive Deep into Dynamics - Conclusion:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis37==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy37"?>">Video</a>
			</li>
		</ul>
	</li>
	<li>What is STEM?&nbsp;
		<a class="btn btn-primary btn-xs <?php if ($dis38==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy38"?>">Video</a>&nbsp;
		<ul>
			<li>Learning Experience #1: Power of Water&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis39==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy39"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis40==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy40"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis41==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy41"?>">Assessment</a>
			</li>
			<li>Learning Experience #2: Energy of Stretching&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis42==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy42"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis43==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy43"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis44==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy44"?>">Assessment</a>
			</li>
			<li>Learning Experience #3: Balloon Ejector&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis45==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy45"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis46==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy46"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis47==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy47"?>">Assessment</a>
			</li>
			<li>Learning Experience #4: Can energy disappear?&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis48==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy48"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis49==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy49"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis50==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy50"?>">Assessment</a>
			</li>
			<li>Learning Experience #5: Loop track&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis51==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy51"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis52==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy52"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis53==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy53"?>">Assessment</a>
			</li>
			<li>Learning Experience #6: The Invisible Force&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis54==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy54"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis55==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy55"?>">Recipe</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis56==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy56"?>">Assessment</a>
			</li>
		</ul>
	</li>
	<li>STEM Project&nbsp;
		<ul>
			<li>Introduction:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis57==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy57"?>">Video</a>&nbsp;
			</li>
			<li>Roller Coaster:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis58==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy58"?>">Video</a>&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis59==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy59"?>">Recipe</a>&nbsp;
			</li>
			<li>Conclusion:&nbsp;
				<a class="btn btn-primary btn-xs <?php if ($dis60==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy60"?>">Video</a>
			</li>
		</ul>
	</li>
	<li>Course Conclusion&nbsp;
		<a class="btn btn-primary btn-xs <?php if ($dis61==1) {echo "disabled";} else {echo "";}?>" href="<?php echo $curl."&kitem=dy61"?>">Video</a>&nbsp;
	</li>
</ol>