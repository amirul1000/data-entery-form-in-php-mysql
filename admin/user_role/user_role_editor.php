<?php
 include("../template/header.php");
?>
<script language="javascript" src="user_role.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","user_role"))?></b>
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

								 <form name="frm_user_role" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
                                         <tr>
                                             <td>User id</td>
                                             <td>
                                                <input type="text" name="user_id" id="user_id"  value="<?=$user_id?>" class="form-control-static">
                                             </td>
                                         </tr>
										 <tr>
                                             <td>User Zilla</td>
                                             <td>
                                                <input type="text" name="user_zilla" id="user_zilla"  value="<?=$user_zilla?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>User Upazila</td>
                                             <td>
                                                <input type="text" name="user_upazila" id="user_upazila"  value="<?=$user_upazila?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Card Code</td>
                                             <td>
                                                <input type="text" name="card_code" id="card_code"  value="<?=$card_code?>" class="form-control-static">
                                             </td>
                                         </tr>
										 <tr> 
											 <td align="right"></td>
											 <td>
												<input type="hidden" name="cmd" value="add">
												<input type="hidden" name="PK_user_id" value="<?=$user_id?>">		
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

