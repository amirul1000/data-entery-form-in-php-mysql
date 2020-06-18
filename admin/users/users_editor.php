<?php
 include("../template/header.php");
?>
<script language="javascript" src="users.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","users"))?></b>
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

								 <form name="frm_users" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
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
                                             <td>User Name</td>
                                             <td>
                                                <input type="text" name="user_name" id="user_name"  value="<?=$user_name?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>User Password</td>
                                             <td>
                                                <input type="text" name="user_password" id="user_password"  value="<?=$user_password?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Admin Priviledge</td>
                                             <td>
                                                <input type="text" name="admin_priviledge" id="admin_priviledge"  value="<?=$admin_priviledge?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Block</td>
                                             <td>
                                                <input type="text" name="block" id="block"  value="<?=$block?>" class="form-control-static">
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

