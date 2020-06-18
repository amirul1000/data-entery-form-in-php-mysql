<?php
       session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   
	   error_reporting(0);
       error_reporting(E_ALL & ~E_NOTICE);
	   
	   
	    if(empty($_SESSION['users_id'])) 
	   {
	     Header("Location: ../login/");
	   }
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "tblallestablishment";
				$data['Establishment_cd']   = $_REQUEST['Establishment_cd'];
                $data['Division_cd']   = $_REQUEST['Division_cd'];
                $data['Zila_cd']   = $_REQUEST['Zila_cd'];
                /*$data['NUpazila']   = $_REQUEST['NUpazila'];
                $data['Nunion']   = $_REQUEST['Nunion'];
                $data['Nmauza']   = $_REQUEST['Nmauza'];*/
                $data['Nvillage']   = $_REQUEST['Nvillage'];
                $data['Upazila_cd']   = $_REQUEST['NUpazila'];
                $data['union_cd']   = $_REQUEST['Nunion'];
                $data['Mauza_cd']   = $_REQUEST['Nmauza'];
                $data['New_BSIC']   = $_REQUEST['New_BSIC'];
                $data['Name']   = $_REQUEST['Name'];
                $data['Name_bng']   = $_REQUEST['Name_bng'];
                $data['rmo']   = $_REQUEST['rmo'];
                $data['BlockName']   = $_REQUEST['BlockName'];
                $data['RoadName']   = $_REQUEST['RoadName'];
                $data['HouseName']   = $_REQUEST['HouseName'];
                $data['Postcode']   = $_REQUEST['Postcode'];
                $data['ExtraLandMark']   = $_REQUEST['ExtraLandMark'];
                $data['add1']   = $_REQUEST['add1'];
                $data['add2']   = $_REQUEST['add2'];
                $data['add3']   = $_REQUEST['add3'];
                $data['estEmailAdd']   = $_REQUEST['estEmailAdd'];
                $data['Tele']   = $_REQUEST['Tele'];
                $data['Mobile']   = $_REQUEST['Mobile'];
                $data['Total']   = $_REQUEST['Total'];
                $data['Male']   = $_REQUEST['Male'];
                $data['Female']   = $_REQUEST['Female'];
                $data['ownership']   = $_REQUEST['ownership'];
                $data['Inception']   = $_REQUEST['Inception'];
                $data['StartYear']   = $_REQUEST['StartYear'];
				if(empty($_REQUEST['PK_Establishment_cd']))
				{
                    $data['status']   = 'N';
				}
				else
				{
					$data['status']   = 'U';
				}
                $data['Establishmentcategory']   = $_REQUEST['Establishmentcategory'];
                $data['BSIC']   = $_REQUEST['BSIC'];
                $data['Off_Cat']   = $_REQUEST['Off_Cat'];
                $data['BCPC']   = $_REQUEST['BCPC'];
                $data['Pro_Mar']   = $_REQUEST['Pro_Mar'];
                $data['Reg_type1']   = $_REQUEST['Reg_type1'];
                $data['Reg_type2']   = $_REQUEST['Reg_type2'];
                $data['Reg_type3']   = $_REQUEST['Reg_type3'];
                $data['Est_type']   = $_REQUEST['Est_type'];
                $data['Tot_Per']   = $_REQUEST['Tot_Per'];
                $data['Tot_PerMale']   = $_REQUEST['Tot_PerMale'];
                $data['Tot_PerFemale']   = $_REQUEST['Tot_PerFemale'];
                $data['TPPer']   = $_REQUEST['TPPer'];
                $data['TPPer_Male']   = $_REQUEST['TPPer_Male'];
                $data['TPPer_Female']   = $_REQUEST['TPPer_Female'];
                $data['TPTem']   = $_REQUEST['TPTem'];
                $data['TPTem_Male']   = $_REQUEST['TPTem_Male'];
                $data['TPTem_FeMale']   = $_REQUEST['TPTem_FeMale'];
                $data['IColl_Name']   = $_REQUEST['IColl_Name'];
                $data['IColl_Tel']   = $_REQUEST['IColl_Tel'];
                $data['DE_ID']   = $_REQUEST['DE_ID'];
                $data['InfprovderName']   = $_REQUEST['InfprovderName'];
                $data['InforproviderTel']   = $_REQUEST['InforproviderTel'];
                $data['SControl']   = $_REQUEST['SControl'];
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['PK_Establishment_cd']))
				{
					 $status = $db->insert($info);
					 if($status == true)
					 {
					   $msg = "Insertion has been completed successfully";
					 }
				}
				else
				{
					$PK_Establishment_cd            = $_REQUEST['PK_Establishment_cd'];
					$info['where'] = "Establishment_cd=".$PK_Establishment_cd;
					
					$db->update($info);
					
					if($status == true)
					 {
					   $msg = "Update has been completed successfully";
					 }
					
				}
				
				include("tblallestablishment_list.php");						   
				break;    
		case "edit":      
				$PK_Establishment_cd               = $_REQUEST['Establishment_cd'];
				if( !empty($PK_Establishment_cd ))
				{
					$info['table']    = "tblallestablishment";
					$info['fields']   = array("*");   	   
					$info['where']    =  "Establishment_cd=".$PK_Establishment_cd;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$Establishment_cd    = $res[0]['Establishment_cd'];
					$Division_cd    = $res[0]['Division_cd'];
					$Zila_cd    = $res[0]['Zila_cd'];
					$NUpazila    = $res[0]['Upazila_cd'];
					$Nunion    = $res[0]['union_cd'];
					$Nmauza    = $res[0]['Mauza_cd'];
					$Nvillage    = $res[0]['Nvillage'];
					$Upazila_cd    = $res[0]['Upazila_cd'];
					$union_cd    = $res[0]['union_cd'];
					$Mauza_cd    = $res[0]['Mauza_cd'];
					$New_BSIC    = $res[0]['New_BSIC'];
					$Name    = $res[0]['Name'];
					$Name_bng    = $res[0]['Name_bng'];
					$rmo    = $res[0]['rmo'];
					$BlockName    = $res[0]['BlockName'];
					$RoadName    = $res[0]['RoadName'];
					$HouseName    = $res[0]['HouseName'];
					$Postcode    = $res[0]['Postcode'];
					$ExtraLandMark    = $res[0]['ExtraLandMark'];
					$add1    = $res[0]['add1'];
					$add2    = $res[0]['add2'];
					$add3    = $res[0]['add3'];
					$estEmailAdd    = $res[0]['estEmailAdd'];
					$Tele    = $res[0]['Tele'];
					$Mobile    = $res[0]['Mobile'];
					$Total    = $res[0]['Total'];
					$Male    = $res[0]['Male'];
					$Female    = $res[0]['Female'];
					$ownership    = $res[0]['ownership'];
					$Inception    = $res[0]['Inception'];
					$StartYear    = $res[0]['StartYear'];
					$status    = $res[0]['status'];
					$Establishmentcategory    = $res[0]['Establishmentcategory'];
					$BSIC    = $res[0]['BSIC'];
					$Off_Cat    = $res[0]['Off_Cat'];
					$BCPC    = $res[0]['BCPC'];
					$Pro_Mar    = $res[0]['Pro_Mar'];
					$Reg_type1    = $res[0]['Reg_type1'];
					$Reg_type2    = $res[0]['Reg_type2'];
					$Reg_type3    = $res[0]['Reg_type3'];
					$Est_type    = $res[0]['Est_type'];
					$Tot_Per    = $res[0]['Tot_Per'];
					$Tot_PerMale    = $res[0]['Tot_PerMale'];
					$Tot_PerFemale    = $res[0]['Tot_PerFemale'];
					$TPPer    = $res[0]['TPPer'];
					$TPPer_Male    = $res[0]['TPPer_Male'];
					$TPPer_Female    = $res[0]['TPPer_Female'];
					$TPTem    = $res[0]['TPTem'];
					$TPTem_Male    = $res[0]['TPTem_Male'];
					$TPTem_FeMale    = $res[0]['TPTem_FeMale'];
					$IColl_Name    = $res[0]['IColl_Name'];
					$IColl_Tel    = $res[0]['IColl_Tel'];
					$DE_ID    = $res[0]['DE_ID'];
					$InfprovderName    = $res[0]['InfprovderName'];
					$InforproviderTel    = $res[0]['InforproviderTel'];
					$SControl    = $res[0]['SControl'];
					
				 }
						   
				include("tblallestablishment_editor.php");						  
				break;
						   
         case 'delete': 
				$Establishment_cd               = $_REQUEST['Establishment_cd'];
				
				$info['table']    = "tblallestablishment";
				$data['status']   = 'D';
				$info['where']    = "Establishment_cd='$Establishment_cd'";
				$info['data']     =  $data;
				if($Establishment_cd)
				{
					$db->update($info);
				}
				$msg = "Deleted successfully";
				include("tblallestablishment_list.php");						   
				break;
				
				
		 case "Establishment_cd":
		       $info["table"] = "tblallestablishment";
			   $info["fields"] = array("tblallestablishment.*"); 
			   $info["where"]   = "1  ORDER BY Establishment_cd ASC";
			   $arr =  $db->select($info);
		 	   echo json_encode($arr);   	 
			   break;
		 case "Zila_cd":
		       $info["table"] = "zilla";
			   $info["fields"] = array("zilla.*"); 
			   $info["where"]   = "1  ORDER BY zilla_name_comite_eng ASC";
			   $arr =  $db->select($info);
		 	   echo json_encode($arr);   	 
			   break;				   
		 case "NUpazila":
		       if($_REQUEST['upazila_type']=='municipality')
			   {
				   $info["table"] = "municipality";
				   $info["fields"] = array(" municipality.*"); 
				   $info["where"]   = "1  AND zilla_id='".$_REQUEST['zilla_id']."' ORDER BY municipality_name_comite_eng ASC";
				   $arr =  $db->select($info);
				   for($i=0;$i<count($arr);$i++)
				   {
					   $arr[$i]['id_id'] = $arr[$i]['municipality_id'];
					   $arr[$i]['name_value'] = $arr[$i]['municipality_name_comite_eng'];
				   }
			   }
			   else if($_REQUEST['upazila_type']=='upazila')
			   { 
				   $info["table"] = "upazila";
				   $info["fields"] = array("upazila.*"); 
				   $info["where"]   = "1 AND zilla_id='".$_REQUEST['zilla_id']."' ORDER BY upazila_name_comite_eng ASC";
				   $arr =  $db->select($info);
				   for($i=0;$i<count($arr);$i++)
				   {
					   $arr[$i]['id_id'] = $arr[$i]['upazila_id'];
					   $arr[$i]['name_value'] = $arr[$i]['upazila_name_comite_eng'];
				   }
			   }
			   else if($_REQUEST['upazila_type']=='citycorporation')
			   { 
				   $info["table"] = "citycorporation";
				   $info["fields"] = array("citycorporation.*"); 
				   $info["where"]   = "1 AND zilla_id='".$_REQUEST['zilla_id']."' ORDER BY city_name_eng ASC";
				   $arr =  $db->select($info);
				   for($i=0;$i<count($arr);$i++)
				   {
					   $arr[$i]['id_id'] = $arr[$i]['city_id'];
					   $arr[$i]['name_value'] = $arr[$i]['city_name_eng'];
				   }
			   }
		 	   echo json_encode($arr);   	 
			   break;	
		  case "Nunion":
		        $info["table"] = "unions";
				$info["fields"] = array(" unions.*"); 
		       if($_REQUEST['upazila_type']=='municipality')
			   {
				   $info["where"]   = "1  AND zilla_id='".$_REQUEST['zilla_id']."' 
				                          AND municipality_id='".$_REQUEST['municipality_id']."' ORDER BY union_name_comite_eng ASC";
			   }
			   else if($_REQUEST['upazila_type']=='upazila')
			   { 
				
				   $info["where"]   = "1 AND zilla_id='".$_REQUEST['zilla_id']."' 
				                         AND upazila_id='".$_REQUEST['upazila_id']."' ORDER BY union_name_comite_eng ASC";
				   
			   }
			   else if($_REQUEST['upazila_type']=='citycorporation')
			   { 
				   $info["where"]   = "1 AND zilla_id='".$_REQUEST['zilla_id']."' 
				                         AND city_id='".$_REQUEST['city_id']."' ORDER BY union_name_comite_eng ASC";
				 
			   }
			     $arr =  $db->select($info);
		 	   echo json_encode($arr);   	 
			   break;	
		 case "Nmauza":
		        $info["table"] = "mouza";
				$info["fields"] = array(" mouza.*");  
		       if($_REQUEST['upazila_type']=='municipality')
			   {
				  
				   $info["where"]   = "1  AND zilla_id='".$_REQUEST['zilla_id']."' 
										  AND municipality_id='".$_REQUEST['municipality_id']."'  
										  AND nunion_id='".$_REQUEST['nunion_id']."' ORDER BY mouza_name_comite_eng ASC";
				   
			   }
			   else if($_REQUEST['upazila_type']=='upazila')
			   { 
				  
				   $info["where"]   = "1 AND zilla_id='".$_REQUEST['zilla_id']."' 
				                         AND upazila_id='".$_REQUEST['upazila_id']."'  
										 AND nunion_id='".$_REQUEST['nunion_id']."' ORDER BY mouza_name_comite_eng ASC";
				   
			   }
			   else if($_REQUEST['upazila_type']=='citycorporation')
			   { 
				  
				   $info["where"]   = "1 AND zilla_id='".$_REQUEST['zilla_id']."' 
				                         AND city_id='".$_REQUEST['city_id']."'  
										 AND nunion_id='".$_REQUEST['nunion_id']."' ORDER BY mouza_name_comite_eng ASC";
				  
			   }
			   $arr =  $db->select($info);
		 	   echo json_encode($arr);   	 
			   break;		
		case "Nvillage":
		        $info["table"] = "village";
				$info["fields"] = array("village.*"); 
		       if($_REQUEST['upazila_type']=='municipality')
			   {
				   $info["where"]   = "1  AND zilla_id='".$_REQUEST['zilla_id']."' 
				                          AND municipality_id='".$_REQUEST['municipality_id']."'  
										  AND nunion_id='".$_REQUEST['nunion_id']."' 
										  AND nmouza_id='".$_REQUEST['nmouza_id']."' ORDER BY village_name_comite_eng ASC";				  
			   }
			   else if($_REQUEST['upazila_type']=='upazila')
			   {
				   $info["where"]   = "1   AND zilla_id='".$_REQUEST['zilla_id']."' 
										   AND upazila_id='".$_REQUEST['upazila_id']."'  
										   AND nunion_id='".$_REQUEST['nunion_id']."'  
										   AND nmouza_id='".$_REQUEST['nmouza_id']."' ORDER BY village_name_comite_eng ASC";
				 
			   }
			   else if($_REQUEST['upazila_type']=='citycorporation')
			   { 
				   $info["where"]   = "1 AND zilla_id='".$_REQUEST['zilla_id']."' 
				                             AND city_id='".$_REQUEST['city_id']."'  
											 AND nunion_id='".$_REQUEST['nunion_id']."' 
											 AND nmouza_id='".$_REQUEST['nmouza_id']."' ORDER BY village_name_comite_eng ASC";				 
			   }  
			   //$info["debug"]   = true;
			   $arr =  $db->select($info);
		 	   echo json_encode($arr);   	 
			   break;	
		//////////////////////////////////////////////////////////////////////
		 case "BSIC":	   	 	
		       $info["table"] = "bsicclass";
			   $info["fields"] = array("bsicclass.*"); 
			   $info["where"]   = "1  ORDER BY Class ASC";
			   $arr =  $db->select($info);
			   echo json_encode($arr);   	
			  break;
		case "BCPC":
		       $info["table"] = "prod_code_classes";
			   $info["fields"] = array("prod_code_classes.*"); 
			   $info["where"]   = "1  ORDER BY CLASS_CODE ASC";
			   $arr =  $db->select($info);
			   echo json_encode($arr);   	
			  break;
		case "chkduplicate":
			   $info["table"] = "tblallestablishment";
			   $info["fields"] = array("tblallestablishment.*"); 
			   $info["where"]   = "1   AND  Establishment_cd='".$_REQUEST['Establishment_cd']."'";
			   $arr =  $db->select($info);
		       echo json_encode($arr);
		      break; 	  	  	  	   	   	 
         case "list" :    	 
			  if(!empty($_REQUEST['page'])&&$_SESSION["search"]=="yes")
				{
				  $_SESSION["search"]="yes";
				}
				else
				{
				   $_SESSION["search"]="no";
					unset($_SESSION["search"]);
					unset($_SESSION['field_name']);
					unset($_SESSION["field_value"]); 
				}
				include("tblallestablishment_list.php");
				break; 
        case "search_tblallestablishment":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("tblallestablishment_list.php");
				break;  								   
						
	     default :    
		       include("tblallestablishment_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'tblallestablishment'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
