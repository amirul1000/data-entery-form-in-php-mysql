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
				$info['table']    = "citycorporation";
				$data['card_type']   = $_REQUEST['card_type'];
                $data['zilla_id']   = $_REQUEST['zilla_id'];
                $data['city_id']   = $_REQUEST['city_id'];
                $data['city_name_eng']   = $_REQUEST['city_name_eng'];
                $data['city_name_bng']   = $_REQUEST['city_name_bng'];
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
				
				include("citycorporation_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "citycorporation";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$card_type    = $res[0]['card_type'];
					$zilla_id    = $res[0]['zilla_id'];
					$city_id    = $res[0]['city_id'];
					$city_name_eng    = $res[0]['city_name_eng'];
					$city_name_bng    = $res[0]['city_name_bng'];
					$rmo    = $res[0]['rmo'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("citycorporation_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "citycorporation";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("citycorporation_list.php");						   
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
				include("citycorporation_list.php");
				break; 
        case "search_citycorporation":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("citycorporation_list.php");
				break;  								   
						
	     default :    
		       include("citycorporation_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'citycorporation'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
