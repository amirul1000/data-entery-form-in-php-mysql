<?php
 include("../template/header.php");
?>
<script type="text/javascript" src="../../tinybox2/tinybox.js"></script>
<link rel="stylesheet" type="text/css" href="../../tinybox2/style.css" />
<script type="text/javascript">
	function popUp(url)
	{ 
	  var parentWindow = window;
	  TINY.box.show({iframe:url,closejs:function(){return false;},boxid:'frameless',width:850,height:650,fixed:false,maskid:'bluemask',maskopacity:40});
	} 
</script>
<?php
  if($msg)
  {
	   echo $msg.'<br>';
  }
?>
<a href="index.php?cmd=edit" class="btn green"><i class="fa fa-plus-circle"></i> Add a <?=ucwords(str_replace("_"," ","tblallestablishment"))?></a> <br><br>
 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","tblallestablishment"))?></b>
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
						<td align="center" valign="top">
						  <form name="search_frm" id="search_frm" method="post">
							<div class="portlet-body">
					         <div class="table-responsive">	
				                <table align="right">
									  <TR>
										<TD  nowrap="nowrap">
										  <?php
											  $hash    =  getTableFieldsName("tblallestablishment");
											  //$hash    = array_diff($hash,array("id"));
										  ?>
										  Search Key:
										  <select   name="field_name" id="field_name"  class="form-control-static">
											<option value="">--Select--</option>
											<?php
											foreach($hash as $key=>$value)
											{
										    ?>
											<option value="<?=$key?>" <?php if($_SESSION['field_name']==$key) echo "selected"; ?>><?=str_replace("_"," ",$value)?></option>
											<?php
										    }
										  ?>
										  </select>
										</TD>
										<TD  nowrap="nowrap" align="right"><label for="searchbar"><img src="../../images/icon_searchbox.png" alt="Search"></label>
										   <input type="text"    name="field_value" id="field_value" value="<?=$_SESSION["field_value"]?>" class="form-control-static"></TD>
										<td nowrap="nowrap" align="right">
										  <input type="hidden" name="cmd" id="cmd" value="search_tblallestablishment" >
										  <input type="submit" name="btn_submit" id="btn_submit"  value="Search" class="btn blue-hoki" />
										</td>
									  </TR>
									</table>
							</div>
							</div>
						  </form>
						</td>
				   </tr>
				   <tr>
				   <td> 
				
						<div class="portlet-body">
				      <div class="table-responsive">	
				          <table class="table">
							<tr bgcolor="#ABCAE0">
								  <td>Establishment Cd</td>
                                  <!--<td>Division Cd</td>-->
                                  <td>Zila Cd</td>
                                  <!--<td>NUpazila</td>
                                  <td>Nunion</td>
                                  <td>Nmauza</td>-->
                                  <td>Nvillage</td>
                                  <td>Upazila Cd</td>
                                  <td>Union Cd</td>
                                  <td>Mauza Cd</td>
                                  <td>New BSIC</td>
                                  <!--<td>Name</td>
                                  <td>Name Bng</td>
                                  <td>Rmo</td>
                                  <td>BlockName</td>
                                  <td>RoadName</td>
                                  <td>HouseName</td>
                                  <td>Postcode</td>
                                  <td>ExtraLandMark</td>
                                  <td>Add1</td>
                                  <td>Add2</td>
                                  <td>Add3</td>
                                  <td>EstEmailAdd</td>
                                  <td>Tele</td>
                                  <td>Mobile</td>
                                  <td>Total</td>
                                  <td>Male</td>
                                  <td>Female</td>
                                  <td>Ownership</td>
                                  <td>Inception</td>
                                  <td>StartYear</td>
                                  <td>Establishmentcategory</td>
                                  <td>BSIC</td>
                                  <td>Off Cat</td>
                                  <td>BCPC</td>
                                  <td>Pro Mar</td>
                                  <td>Reg Type1</td>
                                  <td>Reg Type2</td>
                                  <td>Reg Type3</td>
                                  <td>Est Type</td>
                                  <td>Tot Per</td>
                                  <td>Tot PerMale</td>
                                  <td>Tot PerFemale</td>
                                  <td>TPPer</td>
                                  <td>TPPer Male</td>
                                  <td>TPPer Female</td>
                                  <td>TPTem</td>
                                  <td>TPTem Male</td>
                                  <td>TPTem FeMale</td>
                                  <td>IColl Name</td>
                                  <td>IColl Tel</td>
                                  <td>DE ID</td>
                                  <td>InfprovderName</td>
                                  <td>InforproviderTel</td>
                                  <td>SControl</td>-->
                                  <td>Status</td>
								  <td>Action</td>
							</tr>
						 <?php
								
								if($_SESSION["search"]=="yes")
								  {
									$whrstr = " AND ".$_SESSION['field_name']." LIKE '%".$_SESSION["field_value"]."%'";
								  }
								  else
								  {
									$whrstr = "";
								  }
						 
								$rowsPerPage = 10;
								$pageNum = 1;
								if(isset($_REQUEST['page']))
								{
									$pageNum = $_REQUEST['page'];
								}
								$offset = ($pageNum - 1) * $rowsPerPage;  
						 
						 
											  
								$info["table"] = "tblallestablishment";
								$info["fields"] = array("tblallestablishment.*"); 
								$info["where"]   = "1   $whrstr ORDER BY Establishment_cd DESC  LIMIT $offset, $rowsPerPage";
													
								
								$arr =  $db->select($info);
								
								for($i=0;$i<count($arr);$i++)
								{
								
								   $rowColor;
						
									if($i % 2 == 0)
									{
										
										$row="#C8C8C8";
									}
									else
									{
										
										$row="#FFFFFF";
									}
								
						 ?>
							<tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
                                <td><?=$arr[$i]['Establishment_cd']?></td>
                                <!--<td><?=$arr[$i]['Division_cd']?></td>-->
                                <td><?=$arr[$i]['Zila_cd']?></td>
                                <!--<td><?=$arr[$i]['NUpazila']?></td>
                                <td><?=$arr[$i]['Nunion']?></td>
                                <td><?=$arr[$i]['Nmauza']?></td>-->
                                <td><?=$arr[$i]['Nvillage']?></td>
                                <td><?=$arr[$i]['Upazila_cd']?></td>
                                <td><?=$arr[$i]['union_cd']?></td>
                                <td><?=$arr[$i]['Mauza_cd']?></td>
                                <td><?=$arr[$i]['New_BSIC']?></td>
                                <!--<td><?=$arr[$i]['Name']?></td>
                                <td><?=$arr[$i]['Name_bng']?></td>
                                <td><?=$arr[$i]['rmo']?></td>
                                <td><?=$arr[$i]['BlockName']?></td>
                                <td><?=$arr[$i]['RoadName']?></td>
                                <td><?=$arr[$i]['HouseName']?></td>
                                <td><?=$arr[$i]['Postcode']?></td>
                                <td><?=$arr[$i]['ExtraLandMark']?></td>
                                <td><?=$arr[$i]['add1']?></td>
                                <td><?=$arr[$i]['add2']?></td>
                                <td><?=$arr[$i]['add3']?></td>
                                <td><?=$arr[$i]['estEmailAdd']?></td>
                                <td><?=$arr[$i]['Tele']?></td>
                                <td><?=$arr[$i]['Mobile']?></td>
                                <td><?=$arr[$i]['Total']?></td>
                                <td><?=$arr[$i]['Male']?></td>
                                <td><?=$arr[$i]['Female']?></td>
                                <td><?=$arr[$i]['ownership']?></td>
                                <td><?=$arr[$i]['Inception']?></td>
                                <td><?=$arr[$i]['StartYear']?></td>
                                <td><?=$arr[$i]['Establishmentcategory']?></td>
                                <td><?=$arr[$i]['BSIC']?></td>
                                <td><?=$arr[$i]['Off_Cat']?></td>
                                <td><?=$arr[$i]['BCPC']?></td>
                                <td><?=$arr[$i]['Pro_Mar']?></td>
                                <td><?=$arr[$i]['Reg_type1']?></td>
                                <td><?=$arr[$i]['Reg_type2']?></td>
                                <td><?=$arr[$i]['Reg_type3']?></td>
                                <td><?=$arr[$i]['Est_type']?></td>
                                <td><?=$arr[$i]['Tot_Per']?></td>
                                <td><?=$arr[$i]['Tot_PerMale']?></td>
                                <td><?=$arr[$i]['Tot_PerFemale']?></td>
                                <td><?=$arr[$i]['TPPer']?></td>
                                <td><?=$arr[$i]['TPPer_Male']?></td>
                                <td><?=$arr[$i]['TPPer_Female']?></td>
                                <td><?=$arr[$i]['TPTem']?></td>
                                <td><?=$arr[$i]['TPTem_Male']?></td>
                                <td><?=$arr[$i]['TPTem_FeMale']?></td>
                                <td><?=$arr[$i]['IColl_Name']?></td>
                                <td><?=$arr[$i]['IColl_Tel']?></td>
                                <td><?=$arr[$i]['DE_ID']?></td>
                                <td><?=$arr[$i]['InfprovderName']?></td>
                                <td><?=$arr[$i]['InforproviderTel']?></td>
                                <td><?=$arr[$i]['SControl']?></td>-->
                                <td><?=$arr[$i]['status']?></td>
                                <td nowrap >
                                      <a href="index.php?cmd=edit&Establishment_cd=<?=$arr[$i]['Establishment_cd']?>"  class="btn default btn-xs purple"><i class="fa fa-edit"></i>Edit</a>
                                      <a href="index.php?cmd=delete&Establishment_cd=<?=$arr[$i]['Establishment_cd']?>" class="btn btn-sm red filter-cancel"  onClick=" return confirm('Are you sure to delete this item ?');"><i class="fa fa-times"></i>Delete</a> 
                                 </td>
							</tr>
						<?php
								  }
						?>
						
						<tr>
						   <td colspan="10" align="center">
							  <?php              
									  unset($info);
					
									   $info["table"] = "tblallestablishment";
									   $info["fields"] = array("count(*) as total_rows"); 
									   $info["where"]   = "1  $whrstr ORDER BY Establishment_cd DESC";
									  
									   $res  = $db->select($info);  
					
												
										$numrows = $res[0]['total_rows'];
										$maxPage = ceil($numrows/$rowsPerPage);
										$self = 'index.php?cmd=list';
										$nav  = '';
										
										$start    = ceil($pageNum/5)*5-5+1;
										$end      = ceil($pageNum/5)*5;
										
										if($maxPage<$end)
										{
										  $end  = $maxPage;
										}
										
										for($page = $start; $page <= $end; $page++)
										//for($page = 1; $page <= $maxPage; $page++)
										{
											if ($page == $pageNum)
											{
												$nav .= "<li>$page</li>"; 
											}
											else
											{
												$nav .= "<li><a href=\"$self&&page=$page\" class=\"nav\">$page</a></li>";
											} 
										}
										if ($pageNum > 1)
										{
											$page  = $pageNum - 1;
											$prev  = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Prev]</a></li>";
									
										   $first = "<li><a href=\"$self&&page=1\" class=\"nav\">[First Page]</a></li>";
										} 
										else
										{
											$prev  = '<li>&nbsp;</li>'; 
											$first = '<li>&nbsp;</li>'; 
										}
									
										if ($pageNum < $maxPage)
										{
											$page = $pageNum + 1;
											$next = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Next]</a></li>";
									
											$last = "<li><a href=\"$self&&page=$maxPage\" class=\"nav\">[Last Page]</a></li>";
										} 
										else
										{
											$next = '<li>&nbsp;</li>'; 
											$last = '<li>&nbsp;</li>'; 
										}
										
										if($numrows>1)
										{
										  echo '<ul id="navlist">';
										   echo $first . $prev . $nav . $next . $last;
										  echo '</ul>';
										}
									?>     
						   </td>
						</tr>
						</table>
						</div>
					 </div>				
				</td>
				</tr>
				</table>
				</div>
			</div>
		</div>
<?php
include("../template/footer.php");
?>









