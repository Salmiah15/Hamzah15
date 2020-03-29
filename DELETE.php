<?php
	header("Content-Type:application/json");

	$servername = "localhost";
	    $username = "root";
	    $password = "";
	    $dbname = "whatsapp";

    $conn = new mysqli($servername, $username, $password, $dbname);

	$smethod = $_SERVER['REQUEST_METHOD'];
	$result=array();
	if($smethod == 'DELETE'){
		parse_str(file_get_contents("php://input"),$_DELETE);
    	$id_user = $_DELETE['id_user'];

		$sql = "DELETE FROM users WHERE id_user = '$id_user'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data DELETED";

	}else{
		$result['status']['code'] = 400;
	}


	echo json_encode($result);
?>