<?php
 include("../template/header.php");
?>
<script language="javascript" src="tblallestablishment.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>

<link rel="stylesheet" href="../../css/SpryValidationTextField.css">
<script src="../../js/SpryValidationTextField.js"></script> 


<script type="text/javascript" src="../../js/selectize.js"></script>
<link rel='stylesheet' href='../../css/selectize.css'>
<link rel='stylesheet' href='../../css/selectize.default.css'>
<style type="text/css">
    .selectize-input {
      width: 100% !important;
      height: 62px !important;
    }
</style>
<script language="javascript">

</script>

<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
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
							  <td>  

								 <form name="frm_tblallestablishment" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
                                         <?php
										   if($_REQUEST['Establishment_cd'])
				                           { 
										 ?>
										 <tr>
                                             <td>UID</td>
                                             <td>
                                                <div id="spinner3"></div>
                                                <input type="text" name="Establishment_cd" id="Establishment_cd"  value="<?=$Establishment_cd?>" disabled>
                                                
												<script>
                                                   $(document).ready(function() {
													   
													 
                                                       $('#Establishment_cd')
                                                              .selectize({
                                                                      plugins: ['remove_button'],
                                                                      persist: false,
                                                                      create: true,
                                                                      closeAfterSelect: true,
                                                                      maxItems: null,
                                                                      hideSelected: true,
                                                                      openOnFocus: true,
                                                                      closeAfterSelect: true,
                                                                      maxOptions: 100,
                                                                      selectOnTab: true,
                                                                      valueField: 'id',
                                                                      placeholder: 'Establishment_cd ...',
                                                                      labelField: 'title',
                                                                      searchField: 'title',
																	   onInitialize: function() {
																			this.trigger('change', this.getValue(), true);
																		},
																		onChange: function(value, isOnInitialize) {
																			    if(value=="")
																				{
																					return;
																				}
																				if($("#PK_Establishment_cd").val()!=="")
																				{
																					return;
																				}
																				
																			$.ajax({  
																			  url: 'index.php?cmd=chkduplicate&Establishment_cd='+value,
																			  success: function(data) {
																					  var obj = eval(data);  
																					  
																					  if(obj.length>0)
																					  {
																						  alert("Establishment_cd is Duplicate");
																					  }
																				  }
																				});
																				
																		},	
                                                                      options: [
                                                              
                                                                        ],
																	                                    
                                                                          });
                                
                                                 function load_Establishment_cd()
                                                        {
                                                                var xhr; 
                                                            
                                                                searchbar = $('#Establishment_cd');  
                                                                var $select = searchbar.selectize();
                                                                var control = $select[0].selectize;
                                                                //control.clear(); 
                                                                //control.clearOptions(); 
                                                               
                                
                                                                $("#spinner3").html('<img src="../../images/indicator.gif" alt="Wait" />');               
                                                               
                                                                xhr && xhr.abort();
                                                                    xhr = $.ajax({
                                                                        url: 'index.php?cmd=Establishment_cd',
                                                                        success: function(results) {
                                                                               var data_source = eval(results);                                    
                                                                                for ( var i = 0 ; i < data_source.length ; i++ ) 
                                                                                {   
                                                                                    control.addOption({
                                                                                                    id: data_source[i].Establishment_cd,
                                                                                                    title: data_source[i].Establishment_cd,
                                                                                                    url: ''
                                                                                                });
                                                                                }
                                                                               
                                                                                $("#spinner3").html('');
                                
                                                                        },
                                                                        error: function() {
                                                                             callback();
                                                                        }
                                                                    })
                                                        }
                                
                                                   load_Establishment_cd(); 
                                
                                                   });
                                                  </script>
                                             </td>
                                         </tr>
                                         <?php
											}
										  ?>	
				  
                                         <!--<tr>
                                             <td>Division Cd</td>
                                             <td>
                                                <input type="text" name="Division_cd" id="Division_cd"  value="<?=$Division_cd?>" class="form-control-static">
                                             </td>
                                         </tr>-->
                                      <tr>
                                             <td>জেলা</td>
                                             <td>
                                                <input type="text" name="Zila_cd" id="Zila_cd"  value="<?=$Zila_cd?>">
                                                <script>
                                                   $(document).ready(function() {
                                
                                                       $('#Zila_cd')
                                                              .selectize({
                                                                      plugins: ['remove_button'],
                                                                      persist: false,
                                                                    /*  allowEmptyOption: true,*/
                                                                      create: true,
                                                                      closeAfterSelect: true,
                                                                      maxItems: null,
                                                                      hideSelected: true,
                                                                      openOnFocus: true,
                                                                      closeAfterSelect: true,
                                                                      maxOptions: 64,
                                                                      selectOnTab: true,
                                                                      valueField: 'id',
                                                                      placeholder: 'Zila_cd ...',
                                                                      labelField: 'title',
                                                                      searchField: 'title',
                                                                      options: [
                                                              
                                                                        ]                                   
                                                                          });
                                
                                                 function load_Zila_cd()
                                                        {
                                                                var xhr; 
                                                            
                                                                searchbar = $('#Zila_cd');  
                                                                var $select = searchbar.selectize();
                                                                var control = $select[0].selectize;
                                                                //control.clear(); 
                                                               // control.clearOptions(); 
                                                               
                                
                                                               
                                                                xhr && xhr.abort();
                                                                    xhr = $.ajax({
                                                                        url: 'index.php?cmd=Zila_cd',
                                                                        success: function(results) {
                                                                               var data_source = eval(results);                                    
                                                                                for ( var i = 0 ; i < data_source.length ; i++ ) 
                                                                                {   
                                                                                    control.addOption({
                                                                                                    id: data_source[i].zilla_id,
                                                                                                    title: data_source[i].zilla_id+' '+data_source[i].zilla_name_comite_eng,
                                                                                                    url: ''
                                                                                                });
                                                                                }
                                                                               
                                
                                                                        },
                                                                        error: function() {
                                                                             callback();
                                                                        }
                                                                    })
                                                        }
                                
                                                   load_Zila_cd(); 
                                
                                                   });
                                                  </script>
                                            
                                            
                                             </td>
                                         </tr><tr>
                                             <td>উপজেলা/থানা</td>
                                             <td>
                                                <table cellspacing="3" cellpadding="3">
                                                   <tr>
                                                       <td>পৌরসভা</td>
                                                       <td><input type="radio" name="upazila_type" value="municipality" onClick="set_NUpazila('municipality')">
                                                           &nbsp;&nbsp;&nbsp;
                                                       </td>
                                                       
                                                       <td>উপজেলা/থানা</td>
                                                       <td><input type="radio" name="upazila_type"  value="upazila" onClick="set_NUpazila('upazila')">
                                                           &nbsp;&nbsp;&nbsp;
                                                       </td>
                                                       
                                                       <td>সিটি কর্পোরেশন</td>
                                                       <td><input type="radio" name="upazila_type"  value="citycorporation"  onClick="set_NUpazila('citycorporation')"></td>
                                                   </tr>
                                                </table>
                                                <input type="text" name="NUpazila" id="NUpazila"  value="<?=$NUpazila?>">
                                                <script>
                                                   //$(document).ready(function() {
                                
                                                       $('#NUpazila')
                                                              .selectize({
                                                                      plugins: ['remove_button'],
                                                                      persist: false,
                                                                    /*  allowEmptyOption: true,*/
                                                                      create: true,
                                                                      closeAfterSelect: true,
                                                                      maxItems: null,
                                                                      hideSelected: true,
                                                                      openOnFocus: true,
                                                                      closeAfterSelect: true,
                                                                      maxOptions: 100,
                                                                      selectOnTab: true,
                                                                      valueField: 'id',
                                                                      placeholder: 'NUpazila ...',
                                                                      labelField: 'title',
                                                                      searchField: 'title',
                                                                      options: [
                                                              
                                                                        ]                                   
                                                                          });
                                
                                                 function load_NUpazila(choice)
                                                        {
															  
                                                                var xhr; 
                                                            
                                                                searchbar = $('#NUpazila');  
                                                                var $select = searchbar.selectize();
                                                                var control = $select[0].selectize;
                                                                control.clear(); 
                                                                control.clearOptions(); 
																
																control.on('change', function() {
																		 // var test = selectize.getValue();
																		  set_Nunion(choice);
																	});
																
																
																console.log('NUpazila - index.php?cmd=NUpazila&zilla_id='+$("#Zila_cd").val()+'&upazila_type='+choice);
																
																xhr && xhr.abort();
																xhr = $.ajax({
																	url: 'index.php?cmd=NUpazila&zilla_id='+$("#Zila_cd").val()+'&upazila_type='+choice,
																	success: function(results) {
																		   var data_source = eval(results);                                    
																			for ( var i = 0 ; i < data_source.length ; i++ ) 
																			{   
																				control.addOption({
																								id: data_source[i].id_id,
																								title: data_source[i].id_id+' '+data_source[i].name_value,
																								url: ''
																							});
																			}
																		   
																			//$("#spinner3").html('');
							
																	},
																	error: function() {
																		 callback();
																	}
																})
																	  
																
                                                               // $("#spinner3").html('<img src="../../images/indicator.gif" alt="Wait" />');               
                                                               
                                                        }
                                
                                                 
												   
                                
                                                   //});
												   
												  function set_NUpazila(choice)
												   {
													   load_NUpazila(choice);
												   }
												   
                                                  </script>
                                             </td>
                                         </tr><tr>
                                             <td>ইউনিয়ন/ ওয়ার্ড</td>
                                             <td>
                                                <input type="text" name="Nunion" id="Nunion"  value="<?=$Nunion?>">
                                             
                                                 <script>
                                                   //$(document).ready(function() {
                                
                                                       $('#Nunion')
                                                              .selectize({
                                                                      plugins: ['remove_button'],
                                                                      persist: false,
                                                                    /*  allowEmptyOption: true,*/
                                                                      create: true,
                                                                      closeAfterSelect: true,
                                                                      maxItems: null,
                                                                      hideSelected: true,
                                                                      openOnFocus: true,
                                                                      closeAfterSelect: true,
                                                                      maxOptions: 100,
                                                                      selectOnTab: true,
                                                                      valueField: 'id',
                                                                      placeholder: 'Nunion ...',
                                                                      labelField: 'title',
                                                                      searchField: 'title',
                                                                      options: [
                                                              
                                                                        ]                                   
                                                                          });
                                
                                                 function load_Nunion(choice)
                                                        {
															  
                                                                var xhr; 
                                                            
                                                                searchbar = $('#Nunion');  
                                                                var $select = searchbar.selectize();
                                                                var control = $select[0].selectize;
                                                                control.clear(); 
                                                                control.clearOptions(); 
																
																control.on('change', function() {
																		 // var test = selectize.getValue();
																		  set_Nmauza(choice);
																	});
																
																var url = '';
																if(choice=='municipality')
																{
																 url = 'index.php?cmd=Nunion&zilla_id='+$("#Zila_cd").val()+'&municipality_id='+$("#NUpazila").val()+'&upazila_type='+choice;
																}
																else if(choice=='upazila')
																{
																 url = 'index.php?cmd=Nunion&zilla_id='+$("#Zila_cd").val()+'&upazila_id='+$("#NUpazila").val()+'&upazila_type='+choice;
																}
																else if (choice=='citycorporation')
																{
																 url = 'index.php?cmd=Nunion&zilla_id='+$("#Zila_cd").val()+'&city_id='+$("#NUpazila").val()+'&upazila_type='+choice;
																}
																
																console.log('Union'+url);
																
																xhr && xhr.abort();
																xhr = $.ajax({
																	url: url,
																	success: function(results) {
																		   var data_source = eval(results);                                    
																			for ( var i = 0 ; i < data_source.length ; i++ ) 
																			{   
																				control.addOption({
																								id: data_source[i].nunion_id,
																								title: data_source[i].nunion_id+' '+data_source[i].union_name_comite_eng,
																								url: ''
																							});
																			}
																		   
																			//$("#spinner3").html('');
							
																	},
																	error: function() {
																		 callback();
																	}
																})
																	  
																
                                                               // $("#spinner3").html('<img src="../../images/indicator.gif" alt="Wait" />');               
                                                               
                                                        }
                                
                                                 
												   
                                
                                                   //});
												   
												  function set_Nunion(choice)
												   {
													   load_Nunion(choice);
												   }
												   
                                                  </script>
                                             
                                             
                                             </td>
                                         </tr><tr>
                                             <td>মৌজা</td>
                                             <td>
                                                <input type="text" name="Nmauza" id="Nmauza"  value="<?=$Nmauza?>">
                                                <script>
                                                   //$(document).ready(function() {
                                
                                                       $('#Nmauza')
                                                              .selectize({
                                                                      plugins: ['remove_button'],
                                                                      persist: false,
                                                                    /*  allowEmptyOption: true,*/
                                                                      create: true,
                                                                      closeAfterSelect: true,
                                                                      maxItems: null,
                                                                      hideSelected: true,
                                                                      openOnFocus: true,
                                                                      closeAfterSelect: true,
                                                                      maxOptions: 100,
                                                                      selectOnTab: true,
                                                                      valueField: 'id',
                                                                      placeholder: 'Nmauza ...',
                                                                      labelField: 'title',
                                                                      searchField: 'title',
                                                                      options: [
                                                              
                                                                        ]                                   
                                                                          });
                                
                                                 function load_Nmauza(choice)
                                                        {
															  
                                                                var xhr; 
                                                            
                                                                searchbar = $('#Nmauza');  
                                                                var $select = searchbar.selectize();
                                                                var control = $select[0].selectize;
                                                                control.clear(); 
                                                                control.clearOptions(); 
																control.on('change', function() {
																		 // var test = selectize.getValue();
																		  set_Nvillage(choice);
																	});
																
																var url = '';
																if(choice=='municipality')
																{
																 url = 'index.php?cmd=Nmauza&zilla_id='+$("#Zila_cd").val()+'&municipality_id='+$("#NUpazila").val()+'&nunion_id='+$("#Nunion").val()+'&upazila_type='+choice;
																}
																else if(choice=='upazila')
																{
																 url = 'index.php?cmd=Nmauza&zilla_id='+$("#Zila_cd").val()+'&upazila_id='+$("#NUpazila").val()+'&nunion_id='+$("#Nunion").val()+'&upazila_type='+choice;
																}
																else if (choice=='citycorporation')
																{
																 url = 'index.php?cmd=Nmauza&zilla_id='+$("#Zila_cd").val()+'&city_id='+$("#NUpazila").val()+'&nunion_id='+$("#Nunion").val()+'&upazila_type='+choice;
																}
																
																console.log('Mauza '+url);
																
																xhr && xhr.abort();
																xhr = $.ajax({
																	url: url,
																	success: function(results) {
																		   var data_source = eval(results);                                    
																			for ( var i = 0 ; i < data_source.length ; i++ ) 
																			{   
																				control.addOption({
																								id: data_source[i].nmouza_id,
																								title: data_source[i].nmouza_id+' '+data_source[i].mouza_name_comite_eng,
																								url: ''
																							});
																			}
																		   
																			//$("#spinner3").html('');
							
																	},
																	error: function() {
																		 callback();
																	}
																})
																	  
																
                                                               // $("#spinner3").html('<img src="../../images/indicator.gif" alt="Wait" />');               
                                                               
                                                        }
                                
                                                 
												   
                                
                                                   //});
												   
												  function set_Nmauza(choice)
												   {
													   load_Nmauza(choice);
												   }
												   
                                                  </script>
                                                
                                             </td>
                                         </tr><tr>
                                             <td>গ্রাম/মহল্লা</td>
                                             <td>
                                                <input type="text" name="Nvillage" id="Nvillage"  value="<?=$Nvillage?>">
                                                <script>
                                                   //$(document).ready(function() {
                                
                                                       $('#Nvillage')
                                                              .selectize({
                                                                      plugins: ['remove_button'],
                                                                      persist: false,
                                                                    /*  allowEmptyOption: true,*/
                                                                      create: true,
                                                                      closeAfterSelect: true,
                                                                      maxItems: null,
                                                                      hideSelected: true,
                                                                      openOnFocus: true,
                                                                      closeAfterSelect: true,
                                                                      maxOptions: 100,
                                                                      selectOnTab: true,
                                                                      valueField: 'id',
                                                                      placeholder: 'Nvillage ...',
                                                                      labelField: 'title',
                                                                      searchField: 'title',
                                                                      options: [
                                                              
                                                                        ]                                   
                                                                          });
                                
                                                 function load_Nvillage(choice)
                                                        {
															  
                                                                var xhr; 
                                                            
                                                                searchbar = $('#Nvillage');  
                                                                var $select = searchbar.selectize();
                                                                var control = $select[0].selectize;
                                                                control.clear(); 
                                                                control.clearOptions(); 
																
																var url = '';
																if(choice=='municipality')
																{
																 url = 'index.php?cmd=Nvillage&zilla_id='+$("#Zila_cd").val()+'&municipality_id='+$("#NUpazila").val()+'&nunion_id='+$("#Nunion").val()+'&nmouza_id='+$("#Nmauza").val()+'&upazila_type='+choice;
																}
																else if(choice=='upazila')
																{
																 url = 'index.php?cmd=Nvillage&zilla_id='+$("#Zila_cd").val()+'&upazila_id='+$("#NUpazila").val()+'&nunion_id='+$("#Nunion").val()+'&nmouza_id='+$("#Nmauza").val()+'&upazila_type='+choice;
																}
																else if (choice=='citycorporation')
																{
																 url = 'index.php?cmd=Nvillage&zilla_id='+$("#Zila_cd").val()+'&city_id='+$("#NUpazila").val()+'&nunion_id='+$("#Nunion").val()+'&nmouza_id='+$("#Nmauza").val()+'&upazila_type='+choice;
																}
																
																console.log('village'+url);
																
																xhr && xhr.abort();
																xhr = $.ajax({
																	url: url,
																	success: function(results) {
																		   var data_source = eval(results);                                    
																			for ( var i = 0 ; i < data_source.length ; i++ ) 
																			{   
																				control.addOption({
																								id: data_source[i].nvillage_id,
																								title: data_source[i].nvillage_id+' '+data_source[i].village_name_comite_eng,
																								url: ''
																							});
																			}
																		   
																			//$("#spinner3").html('');
							
																	},
																	error: function() {
																		 callback();
																	}
																})
																	  
																
                                                               // $("#spinner3").html('<img src="../../images/indicator.gif" alt="Wait" />');               
                                                               
                                                        }
                                
                                                 
												   
                                
                                                   //});
												   
												  function set_Nvillage(choice)
												   {
													   load_Nvillage(choice);
												   }
												   
                                                  </script>
                                             </td>
                                         </tr><!--<tr>
                                             <td>Upazila Cd</td>
                                             <td>
                                                <input type="text" name="Upazila_cd" id="Upazila_cd"  value="<?=$Upazila_cd?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Union Cd</td>
                                             <td>
                                                <input type="text" name="union_cd" id="union_cd"  value="<?=$union_cd?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Mauza Cd</td>
                                             <td>
                                                <input type="text" name="Mauza_cd" id="Mauza_cd"  value="<?=$Mauza_cd?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>New BSIC</td>
                                             <td>
                                                <input type="text" name="New_BSIC" id="New_BSIC"  value="<?=$New_BSIC?>" class="form-control-static">
                                             </td>
									     </tr> 		
										-->			
                                         <tr>
                                             <td>আরএমও</td>
                                             <td>
                                                <input type="text" name="rmo" id="rmo"  value="<?=$rmo?>" class="form-control">
                                             </td>
                                         </tr>	
                                         <tr>
                                             <td>ব্লক#/নাম</td>
                                             <td>
                                                <input type="text" name="BlockName" id="BlockName"  value="<?=$BlockName?>" class="form-control">
                                             </td>
                                         </tr><tr>
                                             <td>রোড #/নাম</td>
                                             <td>
                                                <input type="text" name="RoadName" id="RoadName"  value="<?=$RoadName?>" class="form-control">
                                             </td>
                                         </tr><tr>
                                             <td>বাড়ী #/ নাম</td>
                                             <td>
                                                <input type="text" name="HouseName" id="HouseName"  value="<?=$HouseName?>" class="form-control">
                                             </td>
                                         </tr><tr>
                                             <td>পোষ্ট কোড</td>
                                             <td>
                                                <input type="text" name="Postcode" id="Postcode"  value="<?=$Postcode?>" onblur="ValidatePostcode(this.value)"   onKeyUp="isNumberKey5(event)" class="form-control-static" required>
                                                <script language="javascript">
												   function isNumberKey5(evt) {
													   if($("#Postcode").val().length>4)
													   {
														   $("#Postcode").val($("#Postcode").val().substring(0,4)) ;
														    return;
													   }
												     var ex = /^[0-9]+\.?[0-9]*$/;
													 if(ex.test($("#Postcode").val())==false){
													   $("#Postcode").val($("#Postcode").val().substring(0,$("#Postcode").val().length - 1)) ;
													  }
												   }
												   
												   function ValidatePostcode(postcode)
												   {
													     if(postcode.length<4)
														 {
															 alert("Post code should be 4 digits");
															 $("#Postcode").focus();
															 return false;
														 }
												   }
												 </script> 
                                             </td>
                                         </tr>
										 <tr>
                                             <td>অতিরিক্ত  ঠিকানা (ল্যান্ডমার্ক) </td>
                                             <td>
                                                <input type="text" name="ExtraLandMark" id="ExtraLandMark"  value="<?=$ExtraLandMark?>" class="form-control">
                                             </td>
                                         </tr>										 
                                         </tr>
                                             <td colspan="2">
                                              <table width="100%">
                                                  <tr>
                                                      <td>প্রতিষ্ঠানের নাম
                                                    <td>
                                                         <table width="100%">
                                                           <tr>
                                                                 <td>বাংলা:</td>
                                                                 <td>
                                                                    <input type="text" name="Name_bng" id="Name_bng"  value="<?=$Name_bng?>" class="form-control">
                                                                 </td>
                                                             </tr>
                                                             <tr>
                                                                 <td>ইংরেজী:</td>
                                                                 <td>
                                                                    <input type="text" name="Name" id="Name"  value="<?=$Name?>" class="form-control">
                                                                 </td>
                                                             </tr>
                                                             
                                                         </table>
                                                         
                                                      </td>
                                                  </tr>
                                              </table>    
                                              </td>  
                                         </tr>											  
                                         
										 
                                         <!--
                                         <tr>
                                             <td>Add1</td>
                                             <td>
                                                <input type="text" name="add1" id="add1"  value="<?=$add1?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Add2</td>
                                             <td>
                                                <input type="text" name="add2" id="add2"  value="<?=$add2?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Add3</td>
                                             <td>
                                                <input type="text" name="add3" id="add3"  value="<?=$add3?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         -->
										 <tr>
                                             <td>স্থাপন প্রতিষ্ঠার   বছর</td>
                                             <td>
                                                <input type="text" name="Inception" id="Inception"  value="<?=$Inception?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>প্রতিষ্ঠনের ইমেইল</td>
                                             <td>
                                                <input type="text" name="estEmailAdd" id="estEmailAdd"  value="<?=$estEmailAdd?>" onblur="ValidateEmail(this.value)" class="form-control-static">
												<script>
												  function ValidateEmail(mail) 
													{
													 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
													  {
														return (true)
													  }
														alert("You have entered an invalid email address!")
														$("#estEmailAdd").focus();
														return (false)
													}
												</script>
                                             </td>
                                         </tr>
										 <tr>
                                             <td>ব্যবসা শুরুর বছর</td>
                                             <td>
                                                <input type="text" name="StartYear" id="StartYear"  value="<?=$StartYear?>" class="form-control-static">
                                             </td>
                                         </tr>
										 <tr>
                                             <td>মোবাইল নং</td>
                                             <td>
                                                <input type="text" name="Mobile" id="Mobile"  value="<?=$Mobile?>" onblur="ValidateMobile(this.value);" onKeyUp="isNumberKey3(event)" class="form-control-static">
                                                <script language="javascript">
												   function isNumberKey3(evt) {
													   if($("#Mobile").val().length>11)
													   {
														   $("#Mobile").val($("#Mobile").val().substring(0,11)) ;
															return;
													   }
													 var ex = /^[0-9]+\.?[0-9]*$/;
													 if(ex.test($("#Mobile").val())==false){
													   $("#Mobile").val($("#Mobile").val().substring(0,$("#Mobile").val().length - 1)) ;
													  }
												   }
												   
												   
												   function ValidateMobile(mobile)
												   {
													   
													     if(mobile.substr(0,1)!=='0')
														 {
															 alert("Mobile no starts with 0");
															 $("#Mobile").focus();
															 return false;
															 
														 }															 
													   
													     if(mobile.length<11)
														 {
															 alert("Mobile no should be 11 digits");
															 $("#Mobile").focus();
															 return false;
														 }
												   }
												 </script> 
                                             </td>
                                         </tr>
										 <tr>
                                             <td>ফোন অফিস</td>
                                             <td>
                                                <input type="text" name="Tele" id="Tele"  value="<?=$Tele?>"  onKeyUp="isNumberKey4(event)" class="form-control-static">
                                                <script language="javascript">
												   function isNumberKey4(evt) {
													   if($("#Tele").val().length>11)
													   {
														   $("#Tele").val($("#Tele").val().substring(0,11)) ;
															return;
													   }
													 var ex = /^[0-9]+\.?[0-9]*$/;
													 if(ex.test($("#Tele").val())==false){
													   $("#Tele").val($("#Tele").val().substring(0,$("#Tele").val().length - 1)) ;
													  }
												   }
												 </script> 
                                             </td>
                                         </tr>
                                         <!--
                                         <tr>
                                             <td>Total</td>
                                             <td>
                                                <input type="text" name="Total" id="Total"  value="<?=$Total?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Male</td>
                                             <td>
                                                <input type="text" name="Male" id="Male"  value="<?=$Male?>" class="form-control-static">
                                             </td>
                                         </tr><tr>
                                             <td>Female</td>
                                             <td>
                                                <input type="text" name="Female" id="Female"  value="<?=$Female?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         -->
                                         <!--<tr>
                                             <td>Status</td>
                                             <td>
                                                <input type="text" name="status" id="status"  value="<?=$status?>" class="form-control-static">
                                             </td>
                                         </tr>
										 <tr>
                                             <td>Establishmentcategory</td>
                                             <td>
                                                <input type="text" name="Establishmentcategory" id="Establishmentcategory"  value="<?=$Establishmentcategory?>" class="form-control-static">
                                             </td>
                                         </tr>-->
										 <tr>
                                             <td>অফিস  ধরন</td>
                                             <td>
											          1. প্রধান অফিস<br>
												2. শাখা অফিস<br>
												3. একক ইউনিট<br>
											 
                                                <input type="text" name="Off_Cat" id="Off_Cat"  value="<?=$Off_Cat?>" onblur="ValidateOff_Cat(this.value);" class="form-control-static">											
												<script>
												   function ValidateOff_Cat(Off_Cat)
												   {
													   if(Off_Cat.substr(0,1)<'1')
														 {
															 alert("Invalid Office Category");
															 $("#Off_Cat").focus();
															 return false;															 
														 }															 
													   if(Off_Cat.substr(0,1)>'3')
														 {
															 alert("Invalid Office Category");
															 $("#Off_Cat").focus();
															 return false;															 
														 }															 
												   }
												
												</script>
												
                                             </td>
                                         </tr>
										 
										 
										 

										 <tr>
                                             <td>প্রধান অর্থনৈতিক কর্মকান্ড</td>
                                             <td>
                                                <input type="text" name="BSIC" id="BSIC"  value="<?=$BSIC?>">
                                                <script>
                                                   $(document).ready(function() {
                                
                                                       $('#BSIC')
                                                              .selectize({
                                                                      plugins: ['remove_button'],
                                                                      persist: false,
                                                                      create: true,
                                                                      closeAfterSelect: true,
                                                                      maxItems: null,
                                                                      hideSelected: true,
                                                                      openOnFocus: true,
                                                                      closeAfterSelect: true,
                                                                      maxOptions: 100,
                                                                      selectOnTab: true,
                                                                      valueField: 'id',
                                                                      placeholder: 'BSIC ...',
                                                                      labelField: 'title',
                                                                      searchField: 'title',
                                                                      options: [
                                                              
                                                                        ]                                   
                                                                          });
                                
                                                 function load_BSIC()
                                                        {
                                                                var xhr; 
                                                            
                                                                searchbar = $('#BSIC');  
                                                                var $select = searchbar.selectize();
                                                                var control = $select[0].selectize;
                                                                //control.clear(); 
                                                                //control.clearOptions(); 
                                                               
                                
                                                                //$("#spinner3").html('<img src="../../images/indicator.gif" alt="Wait" />');               
                                                               
                                                                xhr && xhr.abort();
                                                                    xhr = $.ajax({
                                                                        url: 'index.php?cmd=BSIC',
                                                                        success: function(results) {
                                                                               var data_source = eval(results);                                    
                                                                                for ( var i = 0 ; i < data_source.length ; i++ ) 
                                                                                {   
                                                                                    control.addOption({
                                                                                                    id: data_source[i].Class,
                                                                                                    title: data_source[i].Class+' '+data_source[i].ClassDescription,
                                                                                                    url: ''
                                                                                                });
                                                                                }
                                                                               
                                                                               // $("#spinner3").html('');
                                
                                                                        },
                                                                        error: function() {
                                                                             callback();
                                                                        }
                                                                    })
                                                        }
                                
                                                   load_BSIC(); 
                                
                                                   });
                                                  </script>
                                             </td>
                                         </tr>                                         
                                         <tr>
                                             <td>উৎপাদিত পণ্য/সেবা</td>
                                             <td>
                                                <input type="text" name="BCPC" id="BCPC"  value="<?=$BCPC?>">
                                                <script>
                                                   $(document).ready(function() {
                                
                                                       $('#BCPC')
                                                              .selectize({
                                                                      plugins: ['remove_button'],
                                                                      persist: false,
                                                                      create: true,
                                                                      closeAfterSelect: true,
                                                                      maxItems: null,
                                                                      hideSelected: true,
                                                                      openOnFocus: true,
                                                                      closeAfterSelect: true,
                                                                      maxOptions: 100,
                                                                      selectOnTab: true,
                                                                      valueField: 'id',
                                                                      placeholder: 'BCPC ...',
                                                                      labelField: 'title',
                                                                      searchField: 'title',
                                                                      options: [
                                                              
                                                                        ]                                   
                                                                          });
                                
                                                 function load_BCPC()
                                                        {
                                                                var xhr; 
                                                            
                                                                searchbar = $('#BCPC');  
                                                                var $select = searchbar.selectize();
                                                                var control = $select[0].selectize;
                                                                //control.clear(); 
                                                                //control.clearOptions(); 
                                                               
                                
                                                                //$("#spinner3").html('<img src="../../images/indicator.gif" alt="Wait" />');               
                                                               
                                                                xhr && xhr.abort();
                                                                    xhr = $.ajax({
                                                                        url: 'index.php?cmd=BCPC',
                                                                        success: function(results) {
                                                                               var data_source = eval(results);                                    
                                                                                for ( var i = 0 ; i < data_source.length ; i++ ) 
                                                                                {   
                                                                                    control.addOption({
                                                                                                    id: data_source[i].CLASS_CODE,
                                                                                                    title: data_source[i].CLASS_CODE+' '+data_source[i].CLASS_DESC_ENG,
                                                                                                    url: ''
                                                                                                });
                                                                                }
                                                                               
                                                                               // $("#spinner3").html('');
                                
                                                                        },
                                                                        error: function() {
                                                                             callback();
                                                                        }
                                                                    })
                                                        }
                                
                                                   load_BCPC(); 
                                
                                                   });
                                                  </script>
                                             </td>
                                         </tr><tr>
                                             <td><p>উৎপাদিত  পণ্যের বাজারজাত ব্যবস্থা</p></td>
                                             <td><p>দেশীয় বাজার  ------------------------- ১<br>
                                                                                                                                          বৈদেশিক  বাজার (রপ্তানী) ------------- ২<br>
                                                                                                                                          দেশী ও বিদেশী উভয় বাজার  --------- ৩</p>
                                               <p>
  <input type="text" name="Pro_Mar" id="Pro_Mar"  value="<?=$Pro_Mar?>" class="form-control-static">
                                             </p></td>
                                         </tr><tr>
                                             <td><p>রেজিষ্ট্রেশনের  ধরন:</p></td>
                                             <td><table border="1" cellspacing="0" cellpadding="0" width="0">
                                               <tr>
                                                 <td width="234" valign="top"><p>জয়েন্ট ষ্টক কোম্পেনী -------- ১</p></td>
                                                 <td width="222" valign="top"><p>সিটি কর্পোরেশন --------    ৭ </p></td>
                                               </tr>
                                               <tr>
                                                 <td width="234" valign="top"><p>বিনিয়োগ বোর্ড --------------- ২ </p></td>
                                                 <td width="222" valign="top"><p>পৌরসভা   -------------      ৮ </p></td>
                                               </tr>
                                               <tr>
                                                 <td width="234" valign="top"><p>বিসিক      ------------------- ৩ </p></td>
                                                 <td width="222" valign="top"><p>ইউনিয়ন পরিষদ --------     ৯ </p></td>
                                               </tr>
                                               <tr>
                                                 <td width="234" valign="top"><p>বেপজা ----------------------- ৪ </p></td>
                                                 <td width="222" valign="top"><p>এনজিও ব্যুরো  ----------    ১০ </p></td>
                                               </tr>
                                               <tr>
                                                 <td width="234" valign="top"><p>কলকারখানা ও প্রতাষ্ঠান পরিদর্শন    অধিদপ্তর -------------------- ৫ </p></td>
                                                 <td width="222" valign="top"><p>রেজিষ্ট্রেশন নাই  ---------      ১১ </p></td>
                                               </tr>
                                               <tr>
                                                 <td width="234" valign="top"><p>সমবায় অধিদপ্তর ------------ ৬ </p></td>
                                                 <td width="222" valign="top"><p>অন্যান্য  ------------         ১২ </p></td>
                                               </tr>
                                             </table>
                                               <br>
                                                <input type="text" name="Reg_type1" id="Reg_type1"  value="<?=$Reg_type1?>" class="form-control-static">
                                                <input type="text" name="Reg_type2" id="Reg_type2"  value="<?=$Reg_type2?>" class="form-control-static">
                                                <input type="text" name="Reg_type3" id="Reg_type3"  value="<?=$Reg_type3?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td><p>প্রাতিষ্ঠানিক  সেক্টর</p></td>
                                             <td><table border="1" cellspacing="0" cellpadding="0" width="0">
                                               <tr>
                                                 <td width="234" valign="top"><p>নন-ফিনেন্সিয়াল কর্পোরেশন --------    ১</p></td>
                                                 <td width="222" valign="top"><p>অলাভজনক প্রতিষ্ঠান ----- ৪ </p></td>
                                               </tr>
                                               <tr>
                                                 <td width="234" valign="top"><p>ফিনেন্সিয়াল কর্পোরেশন -------- ২ </p></td>
                                                 <td width="222" valign="top"><p>প্রাতিষ্ঠানিক খানা --------- ৫ </p></td>
                                               </tr>
                                               <tr>
                                                 <td width="234" valign="top"><p>সরকারী প্রতিষ্ঠান --------------    ৩ </p></td>
                                                 <td width="222" valign="top"><p>&nbsp;</p></td>
                                               </tr>
                                             </table>
                                               <br>
                                                <input type="text" name="Est_type" id="Est_type"  value="<?=$Est_type?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td><p>প্রতিষ্ঠানের  ধরন</p></td>
                                             <td><table border="1" cellspacing="0" cellpadding="0" width="0">
                                               <tr>
                                                 <td width="234" valign="top"><p>একক ব্যক্তি মালিকানা -------- ১</p></td>
                                                 <td width="222" valign="top"><p>প্রাইভেট লি: কো:--------    ৬ </p></td>
                                               </tr>
                                               <tr>
                                                 <td width="234" valign="top"><p>অংশীদারিত্ব মালিকানা (দেশী)------    ২ </p></td>
                                                 <td width="222" valign="top"><p>বিদেশী কোম্পানী (প্রাইভেট)    লি:   ৭ </p></td>
                                               </tr>
                                               <tr>
                                                 <td width="234" valign="top"><p>অংশীদারিত্ব মালিকানা (বিদেশী) ---    ৩ </p></td>
                                                 <td width="222" valign="top"><p>সমবায় সমিতি --------     ৮ </p></td>
                                               </tr>
                                               <tr>
                                                 <td width="234" valign="top"><p>অংশীদারিত্ব মালিকানা (দেশী ও বিদেশী    উভয়) -------------------- ৪ </p></td>
                                                 <td width="222" valign="top"><p>সরকারী  কোম্পানী ----------    ৯ </p></td>
                                               </tr>
                                               <tr>
                                                 <td width="234" valign="top"><p>পাবলিক লি: কো: ---------------- ৫ </p></td>
                                                 <td width="222" valign="top"><p>অন্যান্য (উল্লেখ    করুন)--------   ১০ </p></td>
                                               </tr>
                                             </table>
                                               <br>
                                                <input type="text" name="ownership" id="ownership"  value="<?=$ownership?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         <tr>
                                            <td colspan="2"> 
 	
                                             <table width="100%">
                                             <tr>
                                                <td>মোট জনবল (স্থায়ী)</td>  
                                             
                                                 <td>পুরুষ</td>
                                                 <td>
                                                    <input type="text" name="TPPer_Male" id="TPPer_Male"  value="<?=$TPPer_Male?>" class="form-control-static">
                                                 </td>
                                             
                                                 <td>মহিলা</td>
                                                 <td>
                                                    <input type="text" name="TPPer_Female" id="TPPer_Female"  value="<?=$TPPer_Female?>" class="form-control-static">
                                                 </td>
                                                 <td>মোট</td>
                                                 <td>
                                                    <input type="text" name="TPPer" id="TPPer"  value="<?=$TPPer?>" onblur="validatePermanent(this.value)" class="form-control-static">
													<script>
													  function validatePermanent(value)
													  {
														  if(parseInt($("#TPPer_Male").val()) + parseInt($("#TPPer_Female").val()) !=parseInt($("#TPPer").val()))
														  {
															  alert("Total is not accurate");
															  $("#TPPer_Male").focus();
															  return false;
															  
														  }
													  }
													</script>
                                                 </td>
                                             </tr>
                                            </table>
                                            </td>
                                         </tr>    
                                         <tr>
                                            <td colspan="2"> 
                                             <table width="100%">
                                             <tr>
                                                 <td>মোট জনবল (অস্থায়ী)</td>  
                                                 <td>পুরুষ</td>
                                                 <td>
                                                    <input type="text" name="TPTem_Male" id="TPTem_Male"  value="<?=$TPTem_Male?>" class="form-control-static">
                                                 </td>
                                             
                                                 <td>মহিলা</td>
                                                 <td>
                                                    <input type="text" name="TPTem_FeMale" id="TPTem_FeMale"  value="<?=$TPTem_FeMale?>" class="form-control-static">
                                                 </td>
                                                 <td>মোট</td>
                                                 <td>
                                                    <input type="text" name="TPTem" id="TPTem"  value="<?=$TPTem?>" onBlur="validateTemorary(this.value);" class="form-control-static">
													<script>
													  function validateTemorary(value)
													  {
														  if(parseInt($("#TPTem_Male").val()) + parseInt($("#TPTem_FeMale").val()) !=parseInt($("#TPTem").val()))
														  {
															  alert("Total is not accurate");
															  $("#TPTem_Male").focus();
															  return false;
															  
														  }
													  }
													</script>
                                                 </td>
                                              </tr>
                                             </table>
                                            </td>
                                         </tr> 
                                         <tr>   
                                            <td colspan="2">
                                             <table width="100%">
                                             <tr>
                                                 <td>IColl Name</td>
                                                 <td>
                                                    <input type="text" name="IColl_Name" id="IColl_Name"  value="<?=$IColl_Name?>" class="form-control-static">
                                                 </td>
                                             
                                                 <td>IColl Tel</td>
                                                 <td>
                                                    <input type="text" name="IColl_Tel" id="IColl_Tel"  value="<?=$IColl_Tel?>" class="form-control-static" min="11" max="11" onKeyUp="isNumberKey(event)">
                                                     <script language="javascript">
                                                       function isNumberKey(evt) {
                                                           if($("#IColl_Tel").val().length>11)
                                                           {
                                                               $("#IColl_Tel").val($("#IColl_Tel").val().substring(0,11)) ;
                                                                return;
                                                           }
                                                         var ex = /^[0-9]+\.?[0-9]*$/;
                                                         if(ex.test($("#IColl_Tel").val())==false){
                                                           $("#IColl_Tel").val($("#IColl_Tel").val().substring(0,$("#IColl_Tel").val().length - 1)) ;
                                                          }
                                                       }
                                                     </script> 
                                                 </td>
                                             </tr>
                                             </table>
                                           </td>   
                                         </tr>    
                                         <tr>
                                             <td>DE ID</td>
                                             <td>
                                                <input type="text" name="DE_ID" id="DE_ID"  value="<?=$DE_ID?>" class="form-control-static">
                                             </td>
                                         </tr>
                                         <tr>   
                                            <td colspan="2">
                                             <table width="100%">
                                             <tr>
                                             <td>InfprovderName</td>
                                             <td>
                                                <input type="text" name="InfprovderName" id="InfprovderName"  value="<?=$InfprovderName?>" class="form-control-static">
                                             </td>
                                             <td>InforproviderTel</td>
                                             <td>
                                                <input type="text" name="InforproviderTel" id="InforproviderTel"  value="<?=$InforproviderTel?>" class="form-control-static"  min="11" max="11" onKeyUp="isNumberKey2(event)">
                                                <script language="javascript">
												   function isNumberKey2(evt) {
													   if($("#InforproviderTel").val().length>11)
													   {
														   $("#InforproviderTel").val($("#InforproviderTel").val().substring(0,11)) ;
														    return;
													   }
												     var ex = /^[0-9]+\.?[0-9]*$/;
													 if(ex.test($("#InforproviderTel").val())==false){
													   $("#InforproviderTel").val($("#InforproviderTel").val().substring(0,$("#InforproviderTel").val().length - 1)) ;
													  }
												   }
												 </script> 
                                              </td>
                                             </tr>
                                             </table>
                                           </td>   
                                         </tr>    
                                         <tr>
                                             <td>SControl</td>
                                             <td>
                                                <input type="text" name="SControl" id="SControl"  value="<?=$SControl?>" class="form-control-static">
                                             </td>
                                         </tr>
										 <tr> 
											 <td align="right"></td>
											 <td>
												<input type="hidden" name="cmd" value="add">
												<input type="hidden" name="PK_Establishment_cd" id="PK_Establishment_cd" value="<?=$Establishment_cd?>">			
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
	/*$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '../../images/calendar.gif',
	});*/
	$('body').on('keydown', 'input, select, textarea', function(e) {
    var self = $(this)
      , form = self.parents('form:eq(0)')
      , focusable
      , next
      ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});
</script>  			
<?php
 //include("../template/footer.php");
?>

