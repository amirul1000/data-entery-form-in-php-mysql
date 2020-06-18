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
				$info['table']    = "users";
				$data['user_name']   = $_REQUEST['user_name'];
                $data['user_password']   = $_REQUEST['user_password'];
                $data['admin_priviledge']   = $_REQUEST['admin_priviledge'];
                $data['block']   = $_REQUEST['block'];
                
				
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
				
				include("users_list.php");						   
				break;    
		case "edit":      
				$user_id               = $_REQUEST['user_id'];
				if( !empty($user_id ))
				{
					$info['table']    = "users";
					$info['fields']   = array("*");   	   
					$info['where']    =  "user_id=".$user_id;
				   
					$res  =  $db->select($info);
				   
					$user_id        = $res[0]['user_id'];  
					$user_name    = $res[0]['user_name'];
					$user_password    = $res[0]['user_password'];
					$admin_priviledge    = $res[0]['admin_priviledge'];
					$block    = $res[0]['block'];
					
				 }
						   
				include("users_editor.php");						  
				break;
						   
         case 'delete': 
				$user_id               = $_REQUEST['user_id'];
				
				$info['table']    = "users";
				$info['where']    = "user_id='$user_id'";
				
				if($user_id)
				{
					$db->delete($info);
				}
				include("users_list.php");						   
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
				include("users_list.php");
				break; 
        case "search_users":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("users_list.php");
				break;  								   
						
	     default :    
		       include("users_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'users'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
