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
				$info['table']    = "user_role";
				$data['user_zilla']   = $_REQUEST['user_zilla'];
                $data['user_upazila']   = $_REQUEST['user_upazila'];
                $data['card_code']   = $_REQUEST['card_code'];
                
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['PK_user_id']))
				{
					 $db->insert($info);
				}
				else
				{
					$PK_user_id            = $_REQUEST['PK_user_id'];
					$info['where'] = "user_id=".$PK_user_id;
					
					$db->update($info);
				}
				
				
				include("user_role_list.php");						   
				break;    
		case "edit":      
				$user_id               = $_REQUEST['user_id'];
				if( !empty($user_id ))
				{
					$info['table']    = "user_role";
					$info['fields']   = array("*");   	   
					$info['where']    =  "user_id=".$user_id;
				   
					$res  =  $db->select($info);
				   
					$user_id        = $res[0]['user_id'];  
					$user_zilla    = $res[0]['user_zilla'];
					$user_upazila    = $res[0]['user_upazila'];
					$card_code    = $res[0]['card_code'];
					
				 }
						   
				include("user_role_editor.php");						  
				break;
						   
         case 'delete': 
				$user_id               = $_REQUEST['user_id'];
				
				$info['table']    = "user_role";
				$info['where']    =  "user_id='$user_id'";
				
				if($user_id)
				{
					$db->delete($info);
				}
				include("user_role_list.php");						   
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
				include("user_role_list.php");
				break; 
        case "search_user_role":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("user_role_list.php");
				break;  								   
						
	     default :    
		       include("user_role_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'user_role'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
