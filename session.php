<?php
	//Start sessio
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['customer']) || (trim($_SESSION['customer']) == '')){
		header("location: index.php");
		exit();
	}
        $session_id=$_SESSION['customer'];
        //$session_id=$_SESSION['UserName'];
        
?>