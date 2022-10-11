<?php
    include 'koneksi.php';
    include 'sesi.php';

    $query = "SELECT tb_denda.id_denda, tb_denda.denda, tb_denda.status, tb_siswa.nama_siswa, tb_buku.judul_buku, tb_siswa.nisn, tb_pinjam.tgl_kembali FROM tb_denda INNER JOIN tb_pinjam ON tb_denda.id_pinjam=tb_pinjam.id_pinjam INNER JOIN tb_siswa ON tb_pinjam.id_siswa=tb_siswa.nisn INNER JOIN tb_buku ON tb_buku.id_buku = tb_pinjam.id_buku";
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <?php include './components/header.php' ?>

  <?php include './components/sidebar.php' ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Denda</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Denda</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-cover">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Denda Aktif</h5>

              <!-- Horizontal Form -->

          <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
              <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Judul Buku</center></th>
                  <th><center>NISN</center></th>
                  <th><center>Nama Siswa</center></th>
                  <th><center>Jumlah Hari</center></th>
                  <th><center>Jumlah Denda</center></th>
                  <th><center>Status</center></th>
                  <th><center>Pilihan</center></th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                  while($result = mysqli_fetch_assoc($sql)){

                    $kembali = $result['tgl_kembali'];
                    $sekarang = date('Y-m-d');
                    $earlier = new DateTime($kembali);
                    $later = new DateTime($sekarang);
                    $hari = $earlier->diff($later)->format("%r%a"); 
                    
                ?>
                <tr>
                  <td><center>
                    <?php echo ++$no; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['judul_buku']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['nisn']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $result['nama_siswa']; ?>
                  </center></td>
                  <td><center>
                  <?php echo $hari; ?>
                  </center></td>
                  <td><center>
                  Rp. <?php echo $result['denda']; ?>,00
                  </center></td>
                  <td><center>
                  <?php if($result['status'] == 'A'){echo 'Belum dibayar';}else{ echo "Lunas";}; ?>
                  </center></td>

                  <td><center>
                    <?php if($result['status'] == 'A'){ ?>
                  <a href="proses-denda.php?aksi=done&denda=<?php echo $result['id_denda']; ?>&kembali=<?php echo $result['tgl_kembali']; ?>" type="done" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Bayar"><i class="bi bi-check"></i></a>
                  <a href="proses-denda.php?aksi=refresh&denda=<?php echo $result['id_denda']; ?>&kembali=<?php echo $result['tgl_kembali']; ?>" type="refresh" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Segarkan jumlah denda"><i class="bi bi-arrow-clockwise"></i></a>

                  
                  </center>
                  <?php
                    }
                    ?>
                  
                </td>
                    <?php
                    }
                    ?>

                </tr>
              </tbody>
            </table>
          </div>
          <div class="box-footer mb-3">
            Menampilkan Daftar Denda yang aktif.
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>