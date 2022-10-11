<!-- Proses Data Kategori -->
<?php
    include 'koneksi.php';
    include 'sesi.php';

    $id_kategori = $_POST['id_kategori'];
    $kategori = $_POST['kategori'];

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            

        $query = "INSERT INTO tb_kategori VALUES(null,  '$kategori')";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: data-kategori.php");
        }else {
            echo $query;
        }

        } else if($_POST['aksi']== "edit"){

           

            $query = "UPDATE tb_kategori SET kategori='$kategori' WHERE id_kategori='$id_kategori';";
            $sql = mysqli_query($conn, $query);

            $sql = mysqli_query($conn, $query);
            header("location: data-kategori.php");
        }
    }

        if(isset($_GET['hapus'])){
            $id_kategori = $_GET['hapus'];
            $query = "DELETE FROM tb_kategori WHERE id_kategori = '$id_kategori';";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: data-kategori.php");
            }else {
                echo $query;
            }
        }

    
?>


