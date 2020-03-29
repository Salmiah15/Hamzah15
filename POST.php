<?php
	header("Content-Type:application/json");
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "whatsapp";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

	// tangkap method request
	$smethod = $_SERVER['REQUEST_METHOD'];

	// inisialisasi variable hasil
	$result = array();

	// kondisi metode
	if($smethod == 'POST'){
		// tangkap input
		// $id_user = $_POST['id_user'];
		$user_name = $_POST['user_name'];
		$nama = $_POST['nama'];
		$no_telp = $_POST['no_telp'];

		// insert data
		$sql = "INSERT INTO users (
					
					user_name,
					nama,
					no_telp)
				VALUES (
					
					'$user_name',
					'$nama',
					'$no_telp'
				)";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data inserted";
		$result['result'] = array(
			// "id_user"=>$id_user,
			"user_name"=>$user_name,
			"nama"=>$nama,
			"no_telp"=>$no_telp
		);

	}else{
		$result['status']['code'] = 400;
	}

	// parse ke format json
	echo json_encode($result);
?>