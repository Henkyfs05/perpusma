<!DOCTYPE html>

<?php
    include 'koneksi.php';
    include 'sesi.php';
    
    $id_kelas = '';
    $kelas = '';

    if(isset($_GET['ubah'])){
      $id_kelas = $_GET['ubah'];
      
      $query = "SELECT * FROM tb_kelas WHERE id_kelas = '$id_kelas';";
      $sql = mysqli_query($conn, $query);

      $result = mysqli_fetch_assoc($sql);

      $kelas = $result['kelas'];
      // var_dump($result);

      // die();
    }
?>

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
      <h1>Data Kelas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Master Siswa</li>
          <li class="breadcrumb-item">Data Kelas</li>
          <?php
            if(isset($_GET['ubah'])){
          ?>
          <li class="breadcrumb-item active">Edit Data Kelas</li>
          <?php
            } else {
          ?>
          <li class="breadcrumb-item active">Tambah Kelas</li>
          <?php
            }
          ?>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6-cover">

          <div class="card">
            <div class="card-body">
            <?php
                if(isset($_GET['ubah'])){
              ?>
                <h5 class="card-title">Edit Data Kelas</h5>
              <?php
                } else {
              ?>
                <h5 class="card-title">Tambah Kelas</h5>
              <?php
                }
              ?>

              <!-- Horizontal Form -->
              <form method="POST" action="proses-kelas.php">
              <input type="hidden" value="<?php echo $id_kelas; ?>" name="id_kelas">
                <div class="row mb-3">
                  <label for="kelas" class="col-sm-2 col-form-label"><b> Kelas</b></label>
                  <div class="col-sm-10">
                    <input required type="text" name="kelas" class="form-control" id="kelas" placeholder="Ex : X IPA 1" value="<?php echo $kelas; ?>">
                  </div>
                </div>
                    <div class="col-sm-4">
                        <div class="btn-group">
                         <button type="reset" class="btn btn-info"><i class="bi bi-arrow-repeat"></i>Reset</button>
                      </div>
                         <div class="btn-group">
                         <?php
                            if(isset($_GET['ubah'])){
                          ?>
                            <button type="submit" name="aksi" value="edit" class="btn btn-success"><i class="bi bi-upload"></i> Update</button>
                          <?php
                            } else{
                          ?>
                         <button type="submit" name="aksi" value="add" class="btn btn-success"><i class="bi bi-plus"></i> Tambah</button>
                         <?php
                            }
                          ?>
                        </div>
                    </div>
                    <div class="box-footer">
                        <td>
                          <div align ="Right"> <a  href="data-kelas.php"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i><i class="bi bi-arrow-return-left" aria-hidden="true"></i>Back</a></div>
                        </td>
                        </div>
                        <div class="box-footer">
                          <?php
                            if(isset($_GET['ubah'])){
                          ?>
                            Update Data Kelas, edit form diatas untuk mengubah data kelas.
                          <?php
                            } else{
                          ?>
                            Menambah Data Kelas, isi form diatas untuk menambahkan data kelas.
                          <?php
                            }
                          ?>
                          </div><!-- box-footer -->
              </form><!-- End Horizontal Form -->
              </div>
            </div>
        </div>
        </div>
    </section>
</main>

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