//Proses Data Kategori 
<?php
    include 'koneksi.php';
    include 'sesi.php';

    if(isset($_GET['aksi'])){
        if($_GET['aksi'] == "refresh"){
            
            $id_denda = $_GET['denda'];
            $now = date('Y-m-d');
            $your_date = $_GET['kembali'];

            $earlier = new DateTime($now);
            $later = new DateTime($your_date);
            $hari = $later->diff($earlier)->format("%r%a"); 

            $denda = $hari * 500;

            $query_denda = "UPDATE tb_denda SET denda = '$denda' WHERE id_denda = '$id_denda'";
            $sql_denda = mysqli_query($conn, $query_denda);

            if($sql_denda){
                   header("location: data-denda.php");
            }else {
               echo $query;
           }
        }

        if($_GET['aksi'] == "done"){
            
            $id_denda = $_GET['denda'];
            $query_denda = "UPDATE tb_denda SET status = 'N' WHERE id_denda = '$id_denda'";
            $sql_denda = mysqli_query($conn, $query_denda);

            if($sql_denda){
                   header("location: data-denda.php");
            }else {
               echo $query;
           }
        }
    }

    
?>


