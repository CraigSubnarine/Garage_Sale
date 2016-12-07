<?php



function getDBConnection(){
	try{ // Uses try and catch to handle any unforeseen errors
		$db = new mysqli("localhost","root","","garage_sale");
		if ($db == null && $db->connect_errno > 0)return null;
		return $db;
	}catch(Exception $e){ } // We currently do nothing in the catch, but later we can log
	return null;
}

function saveItem($name, $uid, $price, $type, $description, $quantity){
	$sql = "INSERT INTO `items`(`itemname`, `userid`, `type`, `description`, `price`, `quantity`)
					VALUES ('$name', $uid, '$type', '$description', $price, $quantity)";
	$db = getDBConnection();
	$id = -1;
	if ($db != null){
		$res = $db->query($sql);
		if ($res && $db->insert_id > 0){
			$id = $db->insert_id;
		}
		$db->close();
	}
	return $id;
}
// echo saveItem("Pants", 1, 5, "clothing", "new levis", 10);
// echo saveItem("T-shirt", 1, 4, "clothing", "old levis", 10);
// echo saveItem("Slipper", 2, 2, "footwear", "american eagle", 0);

function saveUser($name, $password, $email, $contactno){
	$password = sha1($password);
	$sql = "INSERT INTO `users`(`username`, `password`, `email`, `contactno`) VALUES ('$name', '$password', '$email', $contactno)";
	$db = getDBConnection();
	$id = -1;
	if ($db != null){
		$res = $db->query($sql);
		if ($res && $db->insert_id > 0){
			$id = $db->insert_id;
		}
		$db->close();
	}
	return $id;
}

// echo saveUser("John", "hello1234", "john@gmail.com", 5555555);
// echo saveUser("Jane", "1234hello", "jane@gmail.com", 4444444);

function getUser($id){
	$db = getDBConnection();
	$rec=null;
	if ($db != null){
		$sql = "SELECT * FROM `users` WHERE userid = '$id'";
		$res = $db->query($sql);
		if($res)
			$rec=$res->fetch_assoc();
		$db->close();
	}
	return $rec;
}

//var_dump(getUser(1));

function getAllAvalibleItems(){
	$db = getDBConnection();
	$items = [];
	if ($db != null){
		$sql = "SELECT * FROM `items` WHERE 0 < quantity";
		$res = $db->query($sql);
		while($res && $row = $res->fetch_assoc()){
			$items[] = $row;
		}
		$db->close();
	}
	return $items;
}
// var_dump(getAllAvalibleItems());

function getTypeOfItem($type){
	$db = getDBConnection();
	$items = [];
	if ($db != null){
		$sql = "SELECT * FROM `items` WHERE '$type' = type AND 0 < quantity";
		$res = $db->query($sql);
		while($res && $row = $res->fetch_assoc()){
			$items[] = $row;
		}
		$db->close();
	}
	return $items;
}

//var_dump(getTypeOfItem('clothing'));

function getAllUserItems($uid){
	$db = getDBConnection();
	$items = [];
	if ($db != null){
		$sql = "SELECT * FROM `items` WHERE $uid = userid;";
		$res = $db->query($sql);
		while($res && $row = $res->fetch_assoc()){
			$items[] = $row;
		}
		$db->close();
	}
	return $items;
}

//var_dump(getAllUserItems(1));

function getAvalibleUserItems($uid){
	$db = getDBConnection();
	$items = [];
	if ($db != null){
		$sql = "SELECT * FROM `items` WHERE 0 < quantity AND $uid = userid;";
		$res = $db->query($sql);
		while($res && $row = $res->fetch_assoc()){
			$items[] = $row;
		}
		$db->close();
	}
	return $items;
}

// var_dump(getAvalibleUserItems(1));


function getUnavalibleUserItems($uid){
	$db = getDBConnection();
	$items = [];
	if ($db != null){
		$sql = "SELECT * FROM `items` WHERE 0 = quantity AND $uid = userid;";
		$res = $db->query($sql);
		while($res && $row = $res->fetch_assoc()){
			$items[] = $row;
		}
		$db->close();
	}
	return $items;
}

// var_dump(getUnavalibleUserItems(2));

function getItem($iid){
	$db = getDBConnection();
	$rec = null;
	if ($db != null){
		$sql = "SELECT * FROM `items` WHERE $iid = itemid;";
		$res = $db->query($sql);
		if ($res){
			$rec = $res->fetch_assoc();
		}
		$db->close();
	}
	return $rec;
}

// var_dump(getItem(1));

function updateItem($iid, $price, $description, $quantity){
	$db = getDBConnection();
	$rec = null;
	if ($db != null){
		$sql = "UPDATE `items`
						SET `description`= '$description', `price`= $price,`quantity`= $quantity
						WHERE $iid = itemid;";
		$res = $db->query($sql);
		if ($res){
			$rec = $res->fetch_assoc();
		}
		$db->close();
	}
	return $rec;
}

// echo updateItem(1, 10, "new and very stylish", 9);

function updateUser($uid, $name, $password, $contact){
	$password = sha1($password);
	$rec = null;
	$db = getDBConnection();
	if ($db != null){
		$sql = "UPDATE `users` SET `username`= '$name', `password`= '$password', `contactno`= $contact WHERE $uid = userid;";
		$res = $db->query($sql);
		if ($res){
			$rec = $res->fetch_assoc();
		}
		$db->close();
	}
	return $rec;
}

// echo updateUser(1, "Mike", "1234", 9999999);

function login($name, $password){
	$log=false;
	$password = sha1($password);
	$db = getDBConnection();

	if ($db != null){
		$sql = "SELECT `userid`, `username` FROM `users` WHERE '$name' = username AND '$password' = password;";
		$res = $db->query($sql);

		if ($res && $row=$res->fetch_assoc()){
			$_SESSION['username']=$name;
			$_SESSION['id']=$row['userid'];

			return true;
		}

	}
	$db->close();
	return $log;
}
//var_dump(login("Mike","1234"));

function logout(){
		$_SESSION['username']="";
		$_SESSION['id']=-1;
		return true;
}


function makeInterest($uid, $iid){
	$db = getDBConnection();
	$interested = false;
	$sql = "SELECT * FROM `interests` WHERE $uid = userid AND $iid = itemid;";
	if ($db != null){
		$res = $db->query($sql);
		if ($res && $row = $res->fetch_assoc()){
			$interested = true;
		}else{
			$res=getItem($iid);
			if($res!=null){
				$sql = "INSERT INTO `interests` (`userid`, `itemid`) VALUES ($uid, $iid);";
				$res2 = $db->query($sql);
				if ($res2){
					$interested = true;
				}
			}
			else
				$interested=false;
		}
		$db->close();
	}
	return $interested;
}

// var_dump(makeInterest(1,1));
// var_dump(makeInterest(1,2));
// var_dump(makeInterest(1,3));

function deleteInterest($uid, $iid){
	$db = getDBConnection();
	if ($db != null){
		$sql = "DELETE FROM `interests` WHERE $uid = userid AND $iid = itemid;";
		$res = $db->query($sql);
		$db->close();
	}
	return;
}

// deleteInterest(1,1);

function userInterest($uid){
	$db = getDBConnection();
	$interested = [];
	$sql = "SELECT * FROM `items` a , `interests` b WHERE a.itemid = b.itemid AND b.userid = $uid";
	if ($db != null){
		$res = $db->query($sql);
		while ($res && $row = $res->fetch_assoc()){
				$interested[] = $row;
		}
		$db->close();
	}
	return $interested;
}
// var_dump(userInterest(2));

function addInterest($iid){
	$db =getDBConnection();
	$sql = "UPDATE `items` SET interestno = interestno + 1 WHERE itemid = $iid;";
	if ($db != null){
		$res = $db->query($sql);
		}
		$db->close();
	return ;
}

// var_dump(addInterest(1));

function subtractInterest($iid){
	$db =getDBConnection();
	$sql = "UPDATE `items` SET interestno = interestno - 1 WHERE itemid = $iid;";
	if ($db != null){
		$res = $db->query($sql);
		}
		$db->close();

	return;
}

// var_dump(subtractInterest(1));
