<?php
	include "lib.php";

	$db=getDBConnection();

	if($db==null)
		echo ("DB NULL");
	else{
		if(isset($_POST['username']) && isset($_POST['password'])){
			$id;
			$u=$_POST['username'];
			$p=sha1($_POST['password']);
			$fn=$_POST['firstname'];
			$ln=$_POST['lastname'];
			$e=$_POST['email'];

			register($db, $u, $p, $fn, $ln, $e);
		}
	}

?>