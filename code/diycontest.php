<style>
.help-block{font-size:12px;}
.tableleft{text-align:right;font-weight:bold;width:171px;}
</style>

<?php
$d = date(d);
// Last date for contest submission
if ($d > 40) {echo "Submission of videos closed for the current contest.";}
else
// Date when the next contest is announced
if ($d < 0) {echo "Submission form for the next contest will be enabled from the 5th onwards.";}
else
{
header("Cache: no-cache");
$user =& JFactory::getUser();
$db =& JFactory::getDBO();
// If user has already submitted, show the stored data
$naka = mysql_query("SELECT * FROM scie_chronoengine_chronoforms_datatable_diycontest WHERE user_id = $user->id") or die(mysql_error());
$submit_nrows = mysql_num_rows($naka);	
if ($submit_nrows > 0) {
$det = mysql_fetch_array($naka);
?>

<p style="padding:15px;background-color:#8dc63f;"><img src="images/dashboard/event/contest/thumbsup.png" style="float:left;padding:10px;">Thank you for your participation. Your entry has been successfully saved. Please come back to visit the <a href="semi-finalists" style="color:#fff;font-weight:bold;">Semi finalists</a> page on the 13th of March. You could be one of them, or <a href="voting" style="color:#fff;font-weight:bold;">cast your vote</a> for your fellow contestants. We wish you good luck!</p>

<h3 style="background-color:#cccccc;padding:5px;">Student details</h3>
<table>
	<tr>
		<td class="tableleft">Name</td>
		<td><?php echo $det['text1'];?></td>
	</tr>
	<tr>
		<td class="tableleft">Class</td>
		<td><?php echo $det['text2'];?></td>
	</tr>
	<tr>
		<td class="tableleft">Phone#</td>
		<td><?php echo $det['text3'];?></td>
	</tr>
	<tr>
		<td class="tableleft">Email ID</td>
		<td><?php echo $det['text4'];?></td>
	</tr>
	<tr>
		<td class="tableleft">Address</td>
		<td><?php echo $det['textarea5'];?></td>
	</tr>
</table>

<h3 style="background-color:#cccccc;padding:5px;">Teacher details</h3>
<table>
	<tr>
		<td class="tableleft">Name</td>
		<td><?php echo $det['text7'];?></td>
	</tr>
	<tr>
		<td class="tableleft">Phone#</td>
		<td><?php echo $det['text8'];?></td>
	</tr>
	<tr>
		<td class="tableleft">Email ID</td>
		<td><?php echo $det['text9'];?></td>
	</tr>
</table>

<h3 style="background-color:#cccccc;padding:5px;">School details</h3>
<table>
	<tr>
		<td class="tableleft">Name</td>
		<td><?php echo $det['text10'];?></td>
	</tr>
	<tr>
		<td class="tableleft">Phone</td>
		<td><?php echo $det['text11'];?></td>
	</tr>
	<tr>
		<td class="tableleft">Email ID</td>
		<td><?php echo $det['text12'];?></td>
	</tr>
	<tr>
		<td class="tableleft">Website</td>
		<td><?php echo $det['text13'];?></td>
	</tr>
	<tr>
		<td class="tableleft">Address</td>
		<td><?php echo $det['textarea14'];?></td>
	</tr>
</table>

<h3 style="background-color:#cccccc;padding:5px;">Contest details</h3>

<table>
	<tr>
		<td class="tableleft">Contest video URL</td>
		<td><a href="<?php echo $det['text15'];?>" target="_blank"><?php echo $det['text15'];?></a></td>
	</tr>
</table>



<?php } else 
// Contest submission form
{ ?>

<div style="margin: 15px 0px; padding: 15px; background-color: #99ccff;">We hope you've read the <a style="color: #2484c6; font-weight: bold;" href="guidelines">contest guidelines</a>. Thank you and we wish you good luck!</div>

<p>Please fill all form fields with correct information - as how you want it to appear everywhere in ScienceClub web. Form fields marked with a <span style="color:#ff0000;font-weight:bold;">*</span> are mandatory.</p>

<hr/>

<!-- Choosing contest -->



<h3 style="background-color:#cccccc;padding:5px;">Student details</h3>
<div class="gcore-form-row" id="form-row-2">
	<label for="text1" class="control-label">Name</label>
	<div class="gcore-input gcore-display-table" id="fin-text1">
		<input name="text1" id="text1" value="" placeholder="" maxlength="" size="" class="validate['required'] form-control A" title="" style="" data-inputmask="" data-load-state="" data-tooltip="" type="text"><span class="help-block">Enter your full name</span>
	</div>
</div>
<div class="gcore-form-row" id="form-row-4">
	<label for="text2" class="control-label">Class</label>
	<div class="gcore-input gcore-display-table" id="fin-text2">
		<input name="text2" id="text2" value="" placeholder="" maxlength="" size="" class="validate['required'] form-control A" title="" style="" data-inputmask="" data-load-state="" data-tooltip="" type="text"><span class="help-block">Class/ standard/ grade with section name if applicable. Example: 7B</span>
	</div>
</div>
<div class="gcore-form-row" id="form-row-6">
	<label for="text3" class="control-label">Phone#</label>
	<div class="gcore-input gcore-display-table" id="fin-text3">
		<input name="text3" id="text3" value="" placeholder="" maxlength="" size="" class="validate['required','number'] form-control A" title="" style="" data-inputmask="" data-load-state="" data-tooltip="" type="text"><span class="help-block">Parent's contact number is accepted</span>
	</div>
</div>
<div class="gcore-form-row" id="form-row-8">
	<label for="text4" class="control-label">Email ID</label>
	<div class="gcore-input gcore-display-table" id="fin-text4">
		<input name="text4" id="text4" value="" placeholder="" maxlength="" size="" class="validate['required','email'] form-control A" title="" style="" data-inputmask="" data-load-state="" data-tooltip="" type="text"><span class="help-block">Parent's email ID is accepted</span>
	</div>
</div>
<div class="gcore-form-row" id="form-row-9">
	<label for="textarea5" class="control-label">Address</label>
	<div class="gcore-input gcore-display-table" id="fin-textarea5">
		<textarea name="textarea5" id="textarea5" placeholder="" rows="3" cols="40" class="validate['required'] form-control A" title="" style="" data-wysiwyg="0" data-load-state="" data-tooltip="">
</textarea><span class="help-block">Please provide your complete home address with landmarks specifications if any. </span>
	</div>
</div>


<h3 style="background-color:#cccccc;padding:5px;">Teacher details</h3>
<div class="gcore-form-row" id="form-row-11">
	<label for="text7" class="control-label">Name</label>
	<div class="gcore-input gcore-display-table" id="fin-text7">
		<input name="text7" id="text7" value="" placeholder="" maxlength="" size="" class="validate['required'] form-control A" title="" style="" data-inputmask="" data-load-state="" data-tooltip="" type="text"><span class="help-block">Please enter only one science teacher's name</span>
	</div>
</div>
<div class="gcore-form-row" id="form-row-13">
	<label for="text8" class="control-label">Phone#</label>
	<div class="gcore-input gcore-display-table" id="fin-text8">
		<input name="text8" id="text8" value="" placeholder="" maxlength="" size="" class="validate['number'] form-control A" title="" style="" data-inputmask="" data-load-state="" data-tooltip="" type="text">
	</div>
</div>
<div class="gcore-form-row" id="form-row-15">
	<label for="text9" class="control-label">Email ID</label>
	<div class="gcore-input gcore-display-table" id="fin-text9">
		<input name="text9" id="text9" value="" placeholder="" maxlength="" size="" class="validate['email'] form-control A" title="" style="" data-inputmask="" data-load-state="" data-tooltip="" type="text">
	</div>
</div>



<h3 style="background-color:#cccccc;padding:5px;">School details</h3>
<div class="gcore-form-row" id="form-row-17">
	<label for="text10" class="control-label">Name</label>
	<div class="gcore-input gcore-display-table" id="fin-text10">
		<input name="text10" id="text10" value="" placeholder="" maxlength="" size="" class="validate['required'] form-control A" title="" style="" data-inputmask="" data-load-state="" data-tooltip="" type="text"><span class="help-block">Please provide exactly as how you want the school name to appear on participation certificates</span>
	</div>
</div>
<div class="gcore-form-row" id="form-row-19">
	<label for="text11" class="control-label">Phone#</label>
	<div class="gcore-input gcore-display-table" id="fin-text11">
		<input name="text11" id="text11" value="" placeholder="" maxlength="" size="" class="validate['required','number'] form-control A" title="" style="" data-inputmask="" data-load-state="" data-tooltip="" type="text">
	</div>
</div>
<div class="gcore-form-row" id="form-row-21">
	<label for="text12" class="control-label">Email ID</label>
	<div class="gcore-input gcore-display-table" id="fin-text12">
		<input name="text12" id="text12" value="" placeholder="" maxlength="" size="" class="validate['required','email'] form-control A" title="" style="" data-inputmask="" data-load-state="" data-tooltip="" type="text">
	</div>
</div>
<div class="gcore-form-row" id="form-row-23">
	<label for="text13" class="control-label">Website</label>
	<div class="gcore-input gcore-display-table" id="fin-text13">
		<input name="text13" id="text13" value="" placeholder="" maxlength="" size="" class="validate['url'] form-control A" title="" style="" data-inputmask="" data-load-state="" data-tooltip="" type="text">
	</div>
</div>
<div class="gcore-form-row" id="form-row-24">
	<label for="textarea14" class="control-label">Address</label>
	<div class="gcore-input gcore-display-table" id="fin-textarea14">
		<textarea name="textarea14" id="textarea14" placeholder="" rows="3" cols="40" class="validate['required'] form-control A" title="" style="" data-wysiwyg="0" data-load-state="" data-tooltip="">
</textarea><span class="help-block">Please provide your school's complete address with landmarks specifications if any</span>
	</div>
</div>

<h3 style="background-color:#cccccc;padding:5px;">Contest details</h3>
<div class="gcore-form-row" id="form-row-26">
	<label for="text15" class="control-label">Contest video URL</label>
	<div class="gcore-input gcore-display-table" id="fin-text15">
		<input name="text15" id="text15" value="" placeholder="" maxlength="" size="" class="validate['required','url'] form-control A" title="" style="" data-inputmask="" data-load-state="" data-tooltip="" type="text"><span class="help-block">Reminder: Please test the URL if it is publicly accessible. All contest entries are the property of QED and the videos can be used for safe promotional purposes.</span>
	</div>
</div>
<div class="gcore-form-row" id="form-row-27">
	<label for="checkbox17" class="control-label gcore-label-checkbox">I certify that the information above is true, accurate and complete.</label>
	<div class="gcore-input gcore-display-table" id="fin-checkbox17">
		<input name="checkbox17" id="checkbox17" value="1" class="validate['required'] A" title="" style="" data-load-state="" data-tooltip="" type="checkbox"><span class="help-block">Check this once you've verified your form details</span>
	</div>
</div>
<div class="gcore-form-row" id="form-row-28">
	<div class="gcore-input gcore-display-table" id="fin-button16">
		<input name="button16" id="button16" type="submit" value="Submit" class="form-control A" style="" data-load-state="">
	</div>
</div>

<?php }} ?>