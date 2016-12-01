<?php
	function getDBConnection(){
	try{ // Uses try and catch to handle any unforeseen errors
		$db = new mysqli("localhost","root","","opensell");
		if ($db == null && $db->connect_errno > 0)return null;
		return $db;
	}catch(Exception $e){
		echo $db->connect_errno;
	} // We currently do nothing in the catch, but later we can log
	return null;
	}

	function login($db, $username, $pword){
		$sql="SELECT * FROM `user` WHERE `username`=$username AND `password`=$pword";
		$res=$db->query($sql);//run select query
		if($res!=null){
			$_SESSION['username']=$username;
			$_SESSION['id']=$res['id'];
			return true;
		}
		$_SESSION['id']=-1;
		return false;
	}

	function logout(){
		$_SESSION['username']="";
		$_SESSION['id']=0;
		return true;
	}

	function register($db, $u, $p, $fn, $ln, $e){
		$sql="INSERT INTO `user` (`firstname`, `lastname`, `email`, `username`, `password`) VALUES('$fn', '$ln', '$e', '$u', '$p');";
		$res=$db->query($sql);
		$id=$db->insert_id;
		if($id>0)
			return $id;
		else
			return -1;
	}

	function addItem($db, $userId, $name, $type, $quant, $price, $desc){
		$sql="INSERT INTO `item` (`userid`, `name`, `type`, `price`, `quantity`, `description`) VALUES('$userid', '$name', '$type', '$price', '$quant', '$desc');";
		
		if ($db != null){
			
			$res = $db->query($sql);
			if ($res && $db->insert_id > 0){
				$id = $db->insert_id;
			}
			//$db->close();
		}
		return $id;
	}

	function hideItem($db, $id){
		$sql="UPDATE `items` SET `hide`=1 WHERE `id`='$id';";
		$res = $db->query($sql);
		
	}

	function interested($db, $itemid, $uid){
		$num
		$sql="INSERT INTO `interest` (`userid`, `itemid`) VALUES('$uid', 'itemid')";
	}

	function update(){

	}

	function allOfAType(){

	}
?>
