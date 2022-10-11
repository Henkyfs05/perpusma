<?PHP
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'elbayan';

    $conn = mysqli_connect($host, $user, $pass, $db);

    if($conn){
        // echo "Koneksi Berhasil";
    }

    mysqli_select_db($conn, $db);


// // membuat koneksi
// $conn = mysqli_connect($host, $user, $pass, $db);
// // mengecek koneksi
// if (!$conn) {
//     die("Koneksi gagal: " . mysqli_connect_error());
// }
// mysqli_close($conn);
?>