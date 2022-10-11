<?php
    include 'koneksi.php';
    include 'sesi.php';
    
    $no = 0;
    $query = "SELECT tb_siswa.nisn, tb_siswa.nama_siswa, tb_kelas.kelas, tb_buku.judul_buku, tb_kembali.tgl_pinjam, tb_kembali.tgl_kembali, tb_kembali.tgl_dikembalikan, tb_kembali.jumlah_kembali FROM tb_kembali LEFT JOIN tb_siswa ON tb_kembali.id_siswa = tb_siswa.nisn LEFT JOIN tb_buku ON tb_kembali.id_buku = tb_buku.id_buku LEFT JOIN tb_kelas ON tb_siswa.kelas = tb_kelas.id_kelas";
    $sql = mysqli_query($conn, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Laporan Pengembalian Perpustakaan MA El-Bayan</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <?php include './components/header.php' ?>

  

  <?php include './components/sidebar.php' ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Laporan Pengembalian</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Laporan</li>
          <li class="breadcrumb-item active">Laporan Pengembalian </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-cover">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Pengembalian</h5>

              <!-- Horizontal Form -->

          <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover" id="table-data2">
              <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th><center>NISN</center></th>
                  <th><center>Nama Peminjam</center></th>
                  <th><center>Kelas</center></th>
                  <th><center>Judul Buku</center></th>
                  <th><center>Tanggal Pinjam</center></th>
                  <th><center>Tanggal Kembali</center></th>
                  <th><center>Jumlah Kembali</center></th>
                  <th><center>Tanggal Dikembalikan</center></th>
                  <th><center>Telat</center></th>
                  <th><center>Denda</center></th>
                </tr>
              </thead>
              <tbody>

                <?php
                  while($result = mysqli_fetch_assoc($sql)){

                    $kembali = $result['tgl_kembali'];
                    $dikembalikan = $result['tgl_dikembalikan'];
                    $earlier = new DateTime($dikembalikan);
                    $later = new DateTime($kembali);
                    $hari = $later->diff($earlier)->format("%r%a"); 

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
                  <?php echo $result['kelas']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['judul_buku']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['tgl_pinjam']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['tgl_kembali']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['jumlah_kembali']; ?>
                  </center></td>
                  
                  <td><center>
                  <?php echo $result['tgl_dikembalikan']; ?>
                  </center></td>
                  <td><center>
                  <?php if($hari > 0){echo $hari; } ?>
                  </center></td>
                  <td><center>
                  <?php if($hari > 0){echo $hari * 500; } ?>
                  </center></td>
                  
                  </tr>
                  <?php
                  }
                  ?>
                  
              </tbody>
            </table>
          </div>
          <div class="box-footer mb-3">
            Menampilkan Daftar Pengembalian.
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
        var table = $('#table-data2').DataTable( {
            buttons: [ { "extend": 'copy',"className": 'mt-3' }, { "extend": 'excel', "className": 'mt-3' }, { "extend": 'pdf',"className": 'mt-3' } ]
        } );

        table.buttons().container()
        .appendTo( '#table-data2_wrapper .col-md-6:eq(0)');
    } );

  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>