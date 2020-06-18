<?php
 include("../template/header.php");
?>
<script language="javascript" src="municipality.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","municipality"))?></b>
          </div>
          <div class="tools">
              <a href="javascript:;" class="reload"></a>
              <a href="javascript:;" class="remove"></a>
          </div>
      </div>
	   <div class="portlet-body">
		         <div class="table-responsive">	
	                <table class="table">
							 <tr>
							  <td>  

								 <form name="frm_municipality" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
						 <td>Card Type</td>
						 <td>
						    <input type="text" name="card_type" id="card_type"  value="<?=$card_type?>" class="form-control-static">
						 </td>
				     </tr><tr>
							 <td>Zilla</td>
							 <td><?php
	$info['table']    = "zilla";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$reszilla  =  $db->select($info);
?>
<select  name="zilla_id" id="zilla_id"   class="form-control-static">
	<option value="">--Select--</option>
	<?php
	   foreach($reszilla as $key=>$each)
	   { 
	?>
	  <option value="<?=$reszilla[$key]['id']?>" <?php if($reszilla[$key]['id']==$zilla_id){ echo "selected"; }?>><?=$reszilla[$key]['card_type']?></option>
	<?php
	 }
	?> 
</select></td>
					  </tr><tr>
							 <td>Municipality</td>
							 <td><?php
	$info['table']    = "municipality";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$resmunicipality  =  $db->select($info);
?>
<select  name="municipality_id" id="municipality_id"   class="form-control-static">
	<option value="">--Select--</option>
	<?php
	   foreach($resmunicipality as $key=>$each)
	   { 
	?>
	  <option value="<?=$resmunicipality[$key]['id']?>" <?php if($resmunicipality[$key]['id']==$municipality_id){ echo "selected"; }?>><?=$resmunicipality[$key]['card_type']?></option>
	<?php
	 }
	?> 
</select></td>
					  </tr><tr>
						 <td>Municipality Name Comite Eng</td>
						 <td>
						    <input type="text" name="municipality_name_comite_eng" id="municipality_name_comite_eng"  value="<?=$municipality_name_comite_eng?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Municipality Name Comite Bng</td>
						 <td>
						    <input type="text" name="municipality_name_comite_bng" id="municipality_name_comite_bng"  value="<?=$municipality_name_comite_bng?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Rmo</td>
						 <td>
						    <input type="text" name="rmo" id="rmo"  value="<?=$rmo?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Status</td>
						 <td>
						    <input type="text" name="status" id="status"  value="<?=$status?>" class="form-control-static">
						 </td>
				     </tr>
										 <tr> 
											 <td align="right"></td>
											 <td>
												<input type="hidden" name="cmd" value="add">
												<input type="hidden" name="id" value="<?=$Id?>">			
												<input type="submit" name="btn_submit" id="btn_submit" value="submit" class="btn red">
											 </td>     
										 </tr>
										</table>
										</div>
										</div>
								</form>
							  </td>
							 </tr>
							</table>
			      </div>
			</div>
  </div>
  <script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '../../images/calendar.gif',
	});
</script>  			
<?php
 include("../template/footer.php");
?>

