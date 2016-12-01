<?php
	include "lib.php";

	$db=getDBConnection();

	if($db!=null){
		if(isset($_POST['username']) && isset($_POST['password']))
			login($db, $_POST['username'], $_POST['password']);
	}
?>