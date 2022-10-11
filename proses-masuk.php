<?php 

    include 'koneksi.php';
	
	$username = filter_input(INPUT_POST, 'username', FILTER_DEFAULT);
    $pass = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
    $password = md5($pass);

	$query = "SELECT * FROM tb_admin WHERE nama_admin = '$username' AND password = '$password'";
	$go = mysqli_query($conn, $query);
	$er = mysqli_fetch_array($go);
	$el = mysqli_num_rows($go);

	if($el != 0){
			session_start();
			$_SESSION['nama_admin'] = $er['nama_admin'];
			header("location:index.php");
	}else {
			mysqli_close($conn);
			header("location:login.php");
	}

?>