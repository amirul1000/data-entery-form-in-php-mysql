<?php
	session_start();
	ob_start();
	include("../../common/lib.php");
	include("../../lib/class.db.php");
	include("../../common/config.php");
	
	$cmd = $_REQUEST['cmd'];
	
	switch($cmd)
	{
	
		case "login":
			$info["table"]     = "users";
			$info["fields"]   = array("*");
			$info["where"]    = " 1=1 AND user_name  LIKE BINARY '".clean($db,$_REQUEST["user_name"])."' AND user_password  LIKE BINARY '".clean($db,$_REQUEST["user_password"])."'";			
			$res  = $db->select($info);
			if(count($res)>0)
			{
				$_SESSION["users_id"]   = $res[0]["user_id"];
				$_SESSION["user_name"]      = $res[0]["user_name"];
				$_SESSION["admin_priviledge"] = $res[0]["admin_priviledge"];
				$_SESSION["block"]  = $res[0]["block"];
				
				Header("Location: ../home/index.php");
			}
			else
			{
				$message="Login fail,Please verify your userid or password";
				include("login_editor.php");
			}
			break;
		case "logout":
			session_destroy();
			include("login_editor.php");
			break;
		default :
			include("login_editor.php");
	}
	/*
	  check user plan exits
	*/
	function clean($db,$str) {
				$str = @trim($str);
				if(get_magic_quotes_gpc()) {
					$str = stripslashes($str);
				}
				$str = stripslashes($str);
				$str = str_replace("'","",$str);
				$str = str_replace('"',"",$str);
				//$str = str_replace("-","",$str);
				$str = str_replace(";","",$str);
				$str = str_replace("or 1","",$str);
				$str = str_replace("drop","",$str);
				
				return mysqli_real_escape_string($db->linkid,$str);
		}		
?>