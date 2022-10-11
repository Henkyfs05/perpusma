
<?php
    include 'koneksi.php';
    include 'sesi.php';
    
    $id_buku = $_POST['id_buku'];
    $kode_buku = $_POST['kode_buku'];
    $judul_buku = $_POST['judul_buku'];
    $kategori  = $_POST['kategori'];
    $penerbit  = $_POST['penerbit'];
    $pengarang  = $_POST['pengarang'];
    $tahun_terbit  = $_POST['tahun_terbit'];
    $stok_buku  = $_POST['stok_buku'];
    $keterangan  = $_POST['keterangan'];

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            

            $query = "INSERT INTO tb_buku VALUES(null, '$kode_buku', '$judul_buku', '$kategori', '$penerbit', '$pengarang', '$tahun_terbit', '$stok_buku', '$keterangan')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: data-buku.php");
            }else {
                echo $query;
            }

        } else if($_POST['aksi']== "edit"){

            $query = "UPDATE tb_buku SET kode_buku='$kode_buku', judul_buku='$judul_buku', kategori='$kategori', penerbit='$penerbit', pengarang='$pengarang', tahun_terbit='$tahun_terbit', stok_buku='$stok_buku', keterangan='$keterangan' WHERE id_buku='$id_buku';";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: data-buku.php");
            }else {
                echo $query;
            }
        }
    }
        if(isset($_GET['hapus'])){
            $id_buku = $_GET['hapus'];
            $query = "DELETE FROM tb_buku WHERE id_buku = '$id_buku';";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: data-buku.php");
            }else {
                echo $query;
            }
        }

    
?>


