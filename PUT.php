<?php
	// header harus json
	header("Content-Type:application/json");

	// conf koneksi db
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
	parse_str(file_get_contents('php://input'), $_PUT);
	if($smethod == 'PUT'){
		// tangkap input
		$id_user = $_PUT['id_user'];
		$user_name = $_PUT['user_name'];
		$nama = $_PUT['nama'];
		$no_telp = $_PUT['no_telp'];

		// insert data
		$sql = "UPDATE users SET
					user_name = '$user_name',
					nama = '$nama',
					no_telp = '$no_telp'
				WHERE id_user = '$id_user'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data updated";
		$result['result'] = array(
			"id_user"=>$id_user,
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
