<?php 

   $host     = "localhost"; 
   $database = "jatan";
   $user     = "root";
   $password = "secret";
   
   $db  = new Db($host,$user,$password,$database);
   
   $GLOBALS['DB'] = $db;

?>
