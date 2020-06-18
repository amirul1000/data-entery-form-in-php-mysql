<?php
 include("../template/header.php");
?>
<script language="javascript" src="bsicclass.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","bsicclass"))?></b>
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

								 <form name="frm_bsicclass" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
						 <td>Cetegory</td>
						 <td>
						    <input type="text" name="Cetegory" id="Cetegory"  value="<?=$Cetegory?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Divisions</td>
						 <td>
						    <input type="text" name="Divisions" id="Divisions"  value="<?=$Divisions?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Group</td>
						 <td>
						    <input type="text" name="Group" id="Group"  value="<?=$Group?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Class</td>
						 <td>
						    <input type="text" name="Class" id="Class"  value="<?=$Class?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>ClassDescription</td>
						 <td>
						    <input type="text" name="ClassDescription" id="ClassDescription"  value="<?=$ClassDescription?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>ByForce</td>
						 <td>
						    <input type="text" name="ByForce" id="ByForce"  value="<?=$ByForce?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>LessThan20</td>
						 <td>
						    <input type="text" name="LessThan20" id="LessThan20"  value="<?=$LessThan20?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>GreaterThan19</td>
						 <td>
						    <input type="text" name="GreaterThan19" id="GreaterThan19"  value="<?=$GreaterThan19?>" class="form-control-static">
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

