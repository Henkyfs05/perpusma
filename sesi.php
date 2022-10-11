<?php
	include 'koneksi.php';
	session_start();

    if(!isset($_SESSION['nama_admin'])){
        mysqli_close($conn);
		echo '<script>alert("Anda harus masuk terlebih dahulu!");document.location="login.php";</script>';
        return;
    }
    
	$user_check = $_SESSION['nama_admin'];

	$ses_sql= mysqli_query($conn, "SELECT nama_admin FROM tb_admin WHERE nama_admin='$user_check'");
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session = $row['nama_admin'];

	if(!isset($login_session)){
		mysqli_close($conn);
		echo '<script>alert("Anda harus masuk terlebih dahulu!");document.location="login.php";</script>';
        return;
	}

?>