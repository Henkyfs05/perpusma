<?php
    include 'koneksi.php';
    include 'sesi.php';

    $query = "SELECT * FROM tb_kategori";
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
 <!-- End Header -->

 <?php include './components/sidebar.php' ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Kategori</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Master Buku</li>
          <li class="breadcrumb-item active">Data Kategori</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-lg-cover">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Kategori Buku</h5>

              <!-- Horizontal Form -->

              <a href="kelola-kategori.php"><button type="button" class="btn btn-primary mb-3"  data-bs-toggle="tooltip" data-bs-placement="top" style="background-color: #47548a;" title="Tambah Kategori">
                <i class="bi bi-plus"></i>Tambah Kategori</button></a>
          <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
              <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th><center> Kategori</center></th>
                  <th><center> Pilihan</center></th>
                </tr>
              </thead>
              <tbody>
              <?php
                  while($result = mysqli_fetch_assoc($sql)){

                ?>
                <tr>
                  <td><center><?php echo ++$no; ?></center></td>
                    <td><center><?php echo $result['kategori']; ?></center></td>
                    <td><center>
                    <a href="kelola-kategori.php?ubah=<?php echo $result['id_kategori']; ?>" type="edit" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
                    <a href="proses-kategori.php?hapus=<?php echo $result['id_kategori']; ?>" type="delete" data-bs-toggle="tooltip" data-bs-placement="top" class="btn btn-danger" title="Hapus" data-bs-target="#exampleModal" onclick="return confirm('Apakah anda yakin ingin menghapus data kategori tersebut?')"><i class="bi bi-trash"></i></a></center>
                  </td>
            </tr>
            <?php
            }
            ?>

              </tbody>
            </table>
          </div>

          <div class="box-footer mb-3">
            <span>Menampilkan Daftar Kategori Buku, untuk menambah kategori klik tombol +, mengedit dan menghapus kategori klik tombol pada kolom pilihan.</span>
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