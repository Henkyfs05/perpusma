<?php
    include 'koneksi.php';
    include 'sesi.php';
    
    $query = "SELECT * FROM tb_buku INNER JOIN tb_kategori ON tb_buku.kategori=tb_kategori.id_kategori";
    $sql = mysqli_query($conn, $query);
    $no = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Laporan Buku Perpustakaan MA El-Bayan</title>
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
  <!-- End Header -->

  <?php include './components/sidebar.php' ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Laporan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Master Buku</li>
          <li class="breadcrumb-item active">Data Laporan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-cover">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Laporan</h5>
              <div class="box-tools pull-right"></div>

              <!-- Horizontal Form -->

          <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover" id="table-data">
              <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th><center>Kode Buku</center></th>
                  <th><center>Judul Buku</center></th>
                  <th><center>Kategori</center></th>
                  <th><center>Penerbit</center></th>
                  <th><center>Pengarang</center></th>
                  <th><center>Tahun Terbit</center></th>
                  <th><center>Stok</center></th>
                  <th><center>Keterangan</center></th>
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
                  <td><center>
                  <?php echo $result['kode_buku']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['judul_buku']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['kategori']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['penerbit']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['pengarang']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['tahun_terbit']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['stok_buku']; ?>
                  </center></td>
                  
                  <td><center>
                  <?php echo $result['keterangan']; ?>
                  </center></td>
                  
                  </tr>
                  <?php
                  }
                  ?>
                  
                </tbody>
            </table>
          </div>
          <div class="box-footer mb-3">
            Menampilkan Daftar Buku Perpustakaan,
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
        var table = $('#table-data').DataTable( {
            buttons: [ 'copy', 'excel', 'pdf' ]
        } );

        table.buttons().container()
        .appendTo( '#table-data_wrapper .col-md-6:eq(0)' );
    } );

  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>