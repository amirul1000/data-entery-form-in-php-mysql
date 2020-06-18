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
				$info['table']    = "bsicclass";
				$data['Cetegory']   = $_REQUEST['Cetegory'];
                $data['Divisions']   = $_REQUEST['Divisions'];
                $data['Group']   = $_REQUEST['Group'];
                $data['Class']   = $_REQUEST['Class'];
                $data['ClassDescription']   = $_REQUEST['ClassDescription'];
                $data['ByForce']   = $_REQUEST['ByForce'];
                $data['LessThan20']   = $_REQUEST['LessThan20'];
                $data['GreaterThan19']   = $_REQUEST['GreaterThan19'];
                
				
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
				
				include("bsicclass_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "bsicclass";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$Cetegory    = $res[0]['Cetegory'];
					$Divisions    = $res[0]['Divisions'];
					$Group    = $res[0]['Group'];
					$Class    = $res[0]['Class'];
					$ClassDescription    = $res[0]['ClassDescription'];
					$ByForce    = $res[0]['ByForce'];
					$LessThan20    = $res[0]['LessThan20'];
					$GreaterThan19    = $res[0]['GreaterThan19'];
					
				 }
						   
				include("bsicclass_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "bsicclass";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("bsicclass_list.php");						   
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
				include("bsicclass_list.php");
				break; 
        case "search_bsicclass":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("bsicclass_list.php");
				break;  								   
						
	     default :    
		       include("bsicclass_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'bsicclass'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
