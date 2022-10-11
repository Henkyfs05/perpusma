<?php
    include 'koneksi.php';
    include 'sesi.php';
    $query = "SELECT * FROM tb_pinjam LEFT JOIN tb_siswa ON tb_pinjam.id_siswa=tb_siswa.nisn LEFT JOIN tb_buku ON tb_pinjam.id_buku = tb_buku.id_buku";
    $sql = mysqli_query($conn, $query);
    $no = 0;

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - MA EL-BAYAN MAJENANG</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo1.webp" width="32px" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Datatable -->
  <link href="assets/vendor/datatables/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/buttons.bootstrap5.min.css" rel="stylesheet">

  <script src="assets/vendor/datatables/jquery-3.5.1.js"></script>
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap5.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.buttons.min.js"></script>
  <script src="assets/vendor/datatables/buttons.bootstrap5.min.js"></script>
  <script src="assets/vendor/datatables/jszip.min.js"></script>
  <script src="assets/vendor/datatables/pdfmake.min.js"></script>
  <script src="assets/vendor/datatables/vfs_fonts.js"></script>
  <script src="assets/vendor/datatables/buttons.html5.min.js"></script>
  <script src="assets/vendor/datatables/buttons.print.min.js"></script>

  <!-- End Datatable -->


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <?php include './components/header.php' ?>
  <?php include './components/sidebar.php' ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Peminjaman</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Transaksi</li>
          <li class="breadcrumb-item active">Data Peminjaman</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-cover">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Peminjaman Buku</h5>

              <!-- Horizontal Form -->

              <a href="tpeminjaman.php"><button type="button" class="btn btn-primary mb-3"  data-bs-toggle="tooltip" data-bs-placement="top" style="background-color: #47548a;" title="Tambah Peminjaman">
              <i class="bi bi-plus"></i>Tambah Peminjaman</button></a>

          <div class="table-responsive">
            <table id="data-table-peminjaman" class="table align-middle table-bordered table-hover">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Nama Buku</center></th>
                  <th><center>Tanggal Pinjam</center></th>
                  <th><center>NISN</center></th>
                  <th><center>Nama Siswa</center></th>
                  <th><center>Tanggal Kembali</center></th>
                  <th><center>Total Buku</center></th>
                  <th><center>Status</center></th>
                  <th><center>Pilihan</center></th>
                </tr>
              </thead>
              <tbody>
              <?php
                  while($result = mysqli_fetch_assoc($sql)){

                ?>
                <tr>
                <td><center>
                  <?php echo ++$no; ?>.
                  </center></td>
                  <td><center><?= $result['judul_buku'];?></center></td>
                  <td><center><?= $result['tgl_pinjam'];?></center></td>
                  <td><center><?= $result['nisn'];?></center></td>
                  <td><center><?= $result['nama_siswa'];?></center></td>
                  <td><center><?= $result['tgl_kembali'];?></center></td>
                  <td><center><?= $result['total_buku'];?></center></td>
                  <td><center><?php if($result['status'] == 1){ echo 'Kembali';}else{ echo 'Belum';}?></center></td>
                  <td><center>
                  <a href="tpeminjaman.php?ubah=<?php echo $result['id_pinjam']; ?>" type="edit" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
                  
                  <a href="proses-peminjaman.php?hapus=<?php echo $result['id_pinjam']; ?>" type="delete" data-bs-toggle="tooltip" data-bs-placement="top" class="btn btn-danger" title="Hapus" data-bs-target="#exampleModal" onclick="return confirm('Apakah anda yakin ingin menghapus data buku tersebut??')"><i class="bi bi-trash"></i></a>

                  <?php 
                    
                    if($result['status'] == 0){
                    ?>
                  <a href="proses-peminjaman.php?kembalikan=<?php echo $result['id_pinjam']; ?>" type="done" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembalikan"><i class="bi bi-check"></i></a>
                  <?php } ?>
                  <?php 
                    $kembali = $result['tgl_kembali'];
                    $sekarang = date('Y-m-d');
                    
                    if($sekarang > $kembali && $result['denda'] == false){
                    ?>
                    <a href="proses-peminjaman.php?denda=<?php echo $result['id_pinjam']; ?>&tgl_kembali=<?php echo $result['tgl_kembali']; ?>" type="denda" data-bs-toggle="tooltip" data-bs-placement="top" class="btn btn-info" title="Aktifkan Denda" data-bs-target="#exampleModal" onclick="return confirm('Apakah anda yakin ingin mengaktifkan denda?')"><i class="bi bi-cash"></i></a></center>
                  <?php } ?>
                    

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Anda akan menghapus Data Siswa ini
                            <p><b>Peringatan</b> Setelah data dihapus, data tidak dapat dikembalikan!</p>
                            <p></p>
                            <p></p>
                            <p>Ingin melanjutkan menghapus?</p>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="button" class="btn btn-danger">Hapus</button>
                          </div>
                        </div>
                      </div>
                    </div>
                     </span>
                  </td>
                </tr>
                <?php
                    }
                    ?>
              </tbody>
            </table>
          </div>
          <div class="box-footer mb-3">
            Menampilkan daftar Peminjaman, untuk mengedit dan menghapus data peminjaman klik tombol pada kolom pilihan.
          </div><!-- box-footer -->
        </div>
            </div>
          </div>


        <div class="col-lg-6">

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include './components/footer.php' ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script>
    $(document).ready(function() {
        var table = $('#data-table-peminjaman').DataTable();
    } );

  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>