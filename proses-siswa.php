<!-- Proses Data Siswa -->
<?php
    include 'koneksi.php';
    include 'sesi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            
        $nisn = $_POST['nisn'];
        $nama_siswa = filter_input(INPUT_POST,'nama_siswa', FILTER_SANITIZE_STRING);
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $kelas  = $_POST['kelas'];
        $no_hp  = $_POST['no_hp'];
        $alamat  = $_POST['alamat'];
        $keterangan  = $_POST['keterangan'];

        $query = "INSERT INTO tb_siswa VALUES(null, '$nisn', '$nama_siswa', '$jenis_kelamin', '$kelas', '$no_hp', '$alamat', '$keterangan')";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: data-siswa.php");
            //echo "Data Berhasil Ditambahkan <a href='data-siswa.php'>[Data Siswa]</a>";
        }else {
            echo $query;
        }

        //echo $nisn." | ".$nama_siswa." | ".$jenis_kelamin." | ".$kelas." | ".$no_hp." | ".$alamat;

            //echo "<br>Tambah Siswa <a href='data-siswa.php'> [Data Siswa]</a>";
        } else if($_POST['aksi']== "edit"){
            // echo "Edit Data Siswa <a href='data-siswa.php'> [Data Siswa]</a>";
            // var_dump($_POST);

            $id_siswa = $_POST['id_siswa'];
            $nisn = $_POST['nisn'];
            $nama_siswa = filter_input(INPUT_POST,'nama_siswa',FILTER_SANITIZE_STRING);
            $jenis_kelamin  = $_POST['jenis_kelamin'];
            $kelas  = $_POST['kelas'];
            $no_hp  = $_POST['no_hp'];
            $alamat  = $_POST['alamat'];
            $keterangan  = $_POST['keterangan'];

            $query = "UPDATE tb_siswa SET nisn='$nisn', nama_siswa='$nama_siswa', jenis_kelamin='$jenis_kelamin', kelas='$kelas', no_hp='$no_hp', alamat='$alamat', keterangan='$keterangan' WHERE id_siswa='$id_siswa'; ";
            $sql = mysqli_query($conn, $query);
            header("location: data-siswa.php");
        }
    }

        if(isset($_GET['hapus'])){
            $id_siswa = $_GET['hapus'];
            $query = "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa';";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: data-siswa.php");
                //echo "Data Berhasil Ditambahkan <a href='data-siswa.php'>[Data Siswa]</a>";
            }else {
                echo $query;
            }
            //echo "Hapus Data Siswa <a href='data-siswa.php'> [Data Siswa]</a>";
        }

    
?>


