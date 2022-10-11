<!-- Proses Data Kategori -->
<?php
    include 'koneksi.php';
    include 'sesi.php';



    $id_pinjam = $_POST['id_pinjam'];
    $NISN = $_POST['nisn'];
    $kode_buku = $_POST['kode_buku'];
    $total_buku = $_POST['total_buku'];

    $query_check_buku = "SELECT * FROM tb_buku WHERE tb_buku.kode_buku = '$kode_buku'";
    $sql_cb = mysqli_query($conn, $query_check_buku);

    if(!$sql_cb){
        if(!$id_pinjam){
            echo '<script>alert("Buku dengan kode buku tersebut tidak ada");document.location="tpeminjaman.php";</script>';
            return;
        }

        echo '<script>alert("Buku dengan kode buku tersebut tidak ada");document.location="tpeminjaman.php?ubah='. $id_pinjam .'";</script>';
            return;
    }
    $query_check_siswa = "SELECT * FROM tb_siswa WHERE tb_siswa.nisn = '$NISN'";
    $sql_cs = mysqli_query($conn, $query_check_siswa);

    if(!$sql_cs){
        if(!$id_pinjam){
            echo '<script>alert("Siswa dengan NISN tersebut tidak ada");document.location="tpeminjaman.php";</script>';
            return;
        }

        echo '<script>alert("Siswa dengan NISN tersebut tidak ada");document.location="tpeminjaman.php?ubah='. $id_pinjam .'";</script>';
            return;
    }

    
    $buku = mysqli_fetch_assoc($sql_cb);
    $id_buku = $buku['id_buku'];

    if(isset($_GET['hapus'])){
        $id_pinjam = $_GET['hapus'];
        $query = "DELETE FROM tb_pinjam WHERE id_pinjam = '$id_pinjam';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: transaksi-peminjaman.php");
        }else {
            echo $query;
        }
        return;
    }

    if(isset($_GET['denda'])){
        $id_pinjam = $_GET['denda'];
        $now = date('Y-m-d');
        $your_date = $_GET['tgl_kembali'];
        $earlier = new DateTime($now);
        $later = new DateTime($your_date);
        $hari = $later->diff($earlier)->format("%r%a"); 

        $new_denda = $hari * 500;
        
        $query = "UPDATE tb_pinjam SET denda='1' WHERE id_pinjam='$id_pinjam';";
        $sql = mysqli_query($conn, $query);


        if($sql){

             $query_denda = "INSERT INTO tb_denda VALUES(null,  '$id_pinjam', '$new_denda', 'A')";
             $sql_denda = mysqli_query($conn, $query_denda);

             if($sql_denda){
                    header("location: transaksi-peminjaman.php");
             }else {
                echo $query;
            }

        }else {
            echo $query;
        }
        return;
    }


    if(isset($_GET['kembalikan'])){
        $id_pinjam = $_GET['kembalikan'];
        $tgl_dikembalikan = date('Y-m-d');
        
        $query = "UPDATE tb_pinjam SET status='1' WHERE id_pinjam='$id_pinjam';";
        $sql = mysqli_query($conn, $query);


        $clone_pinjam = "SELECT id_siswa, id_buku, tgl_pinjam, tgl_kembali, total_buku FROM tb_pinjam WHERE id_pinjam = '$id_pinjam'";
        $sql_clone = mysqli_query($conn, $clone_pinjam);
        $result = mysqli_fetch_assoc($sql_clone);

        if($sql && $result){
            $id_buku = $result['id_buku'];
            $id_siswa = $result['id_siswa'];
            $tgl_pinjam = $result['tgl_pinjam'];
            $tgl_kembali = $result['tgl_kembali'];
            $jumlah_kembali = $result['total_buku'];

             $query_kembali = "INSERT INTO tb_kembali VALUES(null, '$id_buku', '$id_siswa', '$tgl_pinjam', '$tgl_kembali', '$jumlah_kembali', '$tgl_dikembalikan')";
             $sql_kembali = mysqli_query($conn, $query_kembali);

             if($sql_kembali){
                    header("location: transaksi-peminjaman.php");
             }else {
                echo $query;
            }

        }else {
            echo $query;
        }
        return;



    }
    
    if(isset($_POST['aksi'])){
        
        if($_POST['aksi'] == "add"){
        
            
        $query_sisa = "SELECT *, SUM(stok_buku-total_pinjam) AS sisa FROM (SELECT tb_buku.id_buku, tb_buku.kode_buku, tb_buku.stok_buku, SUM(COALESCE(total_buku,0)) AS total_pinjam FROM tb_buku LEFT JOIN (SELECT * FROM tb_pinjam WHERE tb_pinjam.status = 0 OR tb_pinjam.status IS NULL) AS tb_pinjam ON tb_pinjam.id_buku = tb_buku.id_buku WHERE tb_buku.id_buku = '$id_buku') AS tb_sisa";
        $sql_sisa = mysqli_query($conn, $query_sisa);

        if(!$sql_sisa){
            echo $query;
            return;
        }

        
        $result = mysqli_fetch_assoc($sql_sisa);
        $sisa = $result['sisa'];

        if($total_buku > $sisa){
            echo '<script>alert("Total buku yang akan dipinjam melebihi stok buku saat ini");document.location="tpeminjaman.php";</script>';
            return;
        }

        $tgl_pinjam = date('Y-m-d');
        $tgl_kembali = date('Y-m-d',strtotime('+3 day'));

        $query = "INSERT INTO tb_pinjam VALUES(null,  '$tgl_pinjam', '$id_buku', '$NISN', '$tgl_kembali', '$total_buku', '0', '0')";
        $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: transaksi-peminjaman.php");
            }else {
                echo $query;
            }

        } else if($_POST['aksi']== "edit"){

           $tgl_kembali = $_POST['tgl_kembali'];
           
            $query = "UPDATE tb_pinjam SET id_buku='$id_buku', id_siswa='$NISN', tgl_kembali='$tgl_kembali', total_buku='$total_buku' WHERE id_pinjam='$id_pinjam';";
            $sql = mysqli_query($conn, $query);

            header("location: transaksi-peminjaman.php");
        }
    }


    
?>


