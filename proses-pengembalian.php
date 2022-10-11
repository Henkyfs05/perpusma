<!-- Proses Data Kategori -->
<?php
    include 'koneksi.php';
    include 'sesi.php';

    $id_kembali = $_POST['id_kembali'];

    if(isset($_GET['hapus'])){
        $id_kembali = $_GET['hapus'];
        $query = "DELETE FROM tb_kembali WHERE id_kembali = '$id_kembali';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: transaksi-pengembalian.php");
        }else {
            echo $query;
        }
        return;
    }
?>


