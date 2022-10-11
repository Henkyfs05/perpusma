<?php
    include 'koneksi.php';
    include 'sesi.php';
    $query = "SELECT id_kembali, tb_siswa.nisn, tb_siswa.nama_siswa, tb_buku.kode_buku, tb_buku.judul_buku, tb_kembali.tgl_dikembalikan, tb_kembali.jumlah_kembali FROM tb_kembali INNER JOIN tb_siswa ON tb_kembali.id_siswa = tb_siswa.nisn INNER JOIN tb_buku ON tb_kembali.id_buku = tb_buku.id_buku";
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
      <h1>Data Pengembalian</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Transaksi</li>
          <li class="breadcrumb-item active">Data Pengembalian</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-cover">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Pengembalian Buku</h5>

              <!-- Horizontal Form -->

              <div class="table-responsive">
            <table id="data-table-buku" class="table align-middle table-bordered table-hover">
              <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th><center>NISN</center></th>
                  <th><center>Nama Peminjam</center></th>
                  <th><center>Judul Buku</center></th>
                  <th><center>Kode Buku</center></th>
                  <th><center>Jumlah Kembali</center></th>
                  <th><center>Tanggal Dikembalikan</center></th>
                  <th><center>Pilihan</center></th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                  while($result = mysqli_fetch_assoc($sql)){

                ?>
                <tr>
                  <td><center>
                    <?php echo ++$no; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['nisn']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['nama_siswa']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['judul_buku']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['kode_buku']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['jumlah_kembali']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['tgl_dikembalikan']; ?>
                  </center></td>
                  

                  <td><center>
                  <a href="proses-pengembalian.php?hapus=<?php echo $result['id_kembali']; ?>" type="delete" data-bs-toggle="tooltip" data-bs-placement="top" class="btn btn-danger" title="Hapus" data-bs-target="#exampleModal" onclick="return confirm('Apakah anda yakin ingin menghapus data buku tersebut??')"><i class="bi bi-trash"></i></a>
                  </center>
                  
                  
                </td>
                    <?php
                    }
                    ?>

                </tr>
              </tbody>
            </table>
          </div>
          <div class="box-footer mb-3">
          Menampilkan Daftar Pengembalian, untuk mengedit dan menghapus data pengembalian klik tombol pada kolom pilihan.
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
        var table = $('#data-table-pengembalian').DataTable();
    } );

  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>