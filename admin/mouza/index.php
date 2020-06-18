<?php
       session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   
	    if(empty($_SESSION['users_id'])) 
	   {
	     Header("Location: ../login/");
	   }
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "mouza";
				$data['card_type']   = $_REQUEST['card_type'];
                $data['zilla_id']   = $_REQUEST['zilla_id'];
                $data['city_id']   = $_REQUEST['city_id'];
                $data['upazila_id']   = $_REQUEST['upazila_id'];
                $data['municipality_id']   = $_REQUEST['municipality_id'];
                $data['nunion_id']   = $_REQUEST['nunion_id'];
                $data['union_id']   = $_REQUEST['union_id'];
                $data['nmouza_id']   = $_REQUEST['nmouza_id'];
                $data['mouza_id']   = $_REQUEST['mouza_id'];
                $data['mouza_name_comite_eng']   = $_REQUEST['mouza_name_comite_eng'];
                $data['mouza_name_comite_bng']   = $_REQUEST['mouza_name_comite_bng'];
                $data['jl_no']   = $_REQUEST['jl_no'];
                $data['rmo']   = $_REQUEST['rmo'];
                $data['status']   = $_REQUEST['status'];
                
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					 $db->insert($info);
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$db->update($info);
				}
				
				include("mouza_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "mouza";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$card_type    = $res[0]['card_type'];
					$zilla_id    = $res[0]['zilla_id'];
					$city_id    = $res[0]['city_id'];
					$upazila_id    = $res[0]['upazila_id'];
					$municipality_id    = $res[0]['municipality_id'];
					$nunion_id    = $res[0]['nunion_id'];
					$union_id    = $res[0]['union_id'];
					$nmouza_id    = $res[0]['nmouza_id'];
					$mouza_id    = $res[0]['mouza_id'];
					$mouza_name_comite_eng    = $res[0]['mouza_name_comite_eng'];
					$mouza_name_comite_bng    = $res[0]['mouza_name_comite_bng'];
					$jl_no    = $res[0]['jl_no'];
					$rmo    = $res[0]['rmo'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("mouza_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "mouza";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("mouza_list.php");						   
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
				include("mouza_list.php");
				break; 
        case "search_mouza":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("mouza_list.php");
				break;  								   
						
	     default :    
		       include("mouza_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'mouza'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
