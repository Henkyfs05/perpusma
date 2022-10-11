<!-- Proses Data kelas -->
<?php
    include 'koneksi.php';
    include 'sesi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            
        $kelas = $_POST['kelas'];

        $query = "INSERT INTO tb_kelas VALUES(null, '$kelas')";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: data-kelas.php");
            //echo "Data Berhasil Ditambahkan <a href='data-kelas.php'>[Data Kelas]</a>";
        }else {
            echo $query;
        }

        //echo $kelas;

            //echo "<br>Tambah Kelas <a href='data-kelas.php'> [Data Kelas]</a>";
        } else if($_POST['aksi']== "edit"){
            // echo "Edit Data Kelas <a href='data-kelas.php'> [Data Kelas]</a>";
            // var_dump($_POST);

            $id_kelas = $_POST['id_kelas'];
            $kelas = $_POST['kelas'];

            $query = "UPDATE tb_kelas SET kelas='$kelas' WHERE id_kelas='$id_kelas'; ";
            $sql = mysqli_query($conn, $query);
            header("location: data-kelas.php");
        }
    }

        if(isset($_GET['hapus'])){
            $id_kelas = $_GET['hapus'];
            $query = "DELETE FROM tb_kelas WHERE id_kelas = '$id_kelas';";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: data-kelas.php");
                //echo "Data Berhasil Ditambahkan <a href='data-kelas.php'>[Data Kelas]</a>";
            }else {
                echo $query;
            }
            //echo "Hapus Data Kelas <a href='data-kelas.php'> [Data Kelas]</a>";
        }

    
?>

