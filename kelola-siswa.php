

<?php
    include 'koneksi.php';
    include 'sesi.php';

    $id_siswa = '';
    $nisn = '';
    $nama_siswa = '';
    $jenis_kelamin = '';

    $query_kelas = "SELECT * FROM tb_kelas";
    $sql_kelas = mysqli_query($conn, $query_kelas);
    $kelas = '';
    $no_hp = '';
    $alamat = '';
    $keterangan = '';

    if(isset($_GET['ubah'])){
      $id_siswa = $_GET['ubah'];
      
      $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
      $sql = mysqli_query($conn, $query);

      $result = mysqli_fetch_assoc($sql);

      $nisn = $result['nisn'];
      $nama_siswa = $result['nama_siswa'];
      $jenis_kelamin = $result['jenis_kelamin'];
      $kelas = $result['kelas'];
      $no_hp = $result['no_hp'];
      $alamat = $result['alamat'];
      $keterangan = $result['keterangan'];
      

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
      <h1>Data Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Master Siswa</li>
          <li class="breadcrumb-item">Data Siswa</li>
          <?php
            if(isset($_GET['ubah'])){
          ?>
          <li class="breadcrumb-item active">Edit Data Siswa</li>
          <?php
            } else {
          ?>
          <li class="breadcrumb-item active">Tambah Siswa</li>
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
                <h5 class="card-title">Edit Data Siswa</h5>
              <?php
                } else {
              ?>
                <h5 class="card-title">Tambah Siswa</h5>
              <?php
                }
              ?>

              <!-- Horizontal Form -->
              <form method="POST" action="proses-siswa.php">
                <input type="hidden" value="<?php echo $id_siswa; ?>" name="id_siswa">
                <div class="row mb-3">
                  <label for="nisn" class="col-sm-2 col-form-label"><b> NISN</b></label>
                  <div class="col-sm-10">
                    <input required type="text" name=nisn class="form-control" id="nisn" placeholder="Ex : 111223" value="<?php echo $nisn; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label"><b> Nama Siswa</b></label>
                    <div class="col-sm-10">
                    <input required type="text" name=nama_siswa class="form-control" id="nama_siswa" placeholder="Ex : Setiaone" value="<?php echo $nama_siswa; ?>">
                  </div>
                </div>
                <fieldset  class="row mb-3">
                  <legend  class="col-form-label col-sm-2 pt-0"><b> Jenis Kelamin</b></legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input <?php if($jenis_kelamin == 'L'){echo "checked";}?> value="L"  required class="form-check-input" type="radio" name="jenis_kelamin" id="jkel" value="<?php echo $jenis_kelamin; ?>">
                      <label class="form-check-label" for="gridRadios1">
                        <b> Laki-laki</b>
                      </label>
                    </div>
                    <div class="form-check">
                      <input  <?php if($jenis_kelamin == 'P'){echo "checked";}?> value="P" required class="form-check-input" type="radio" name="jenis_kelamin" id="jkel" value="<?php echo $jenis_kelamin; ?>">
                      <label class="form-check-label" for="gridRadios2">
                       <b> Perempuan</b>
                      </label>
                    </div>
                  </div>
                </fieldset>
                <div class="row mb-3">
                    <label for="kelas" class="col-sm-2 col-form-label"><b> Kelas</b></label>
                    <div class="col-sm-10">
                        <select required id="kelas" name="kelas" class="form-select">
                        <?php 
                            while($list_kelas = mysqli_fetch_assoc($sql_kelas)){
                          ?>
                          
                          <option 
                            <?php if($kelas == $list_kelas['id_kelas']){echo "selected";}?> 
                            value=<?php echo $list_kelas['id_kelas']; ?>
                            >
                            <?php echo $list_kelas['kelas']; ?>
                          </option>
                          <?php } ?>
                          </select>
                  </div>
                </div>


                
                  <div class="row mb-3">
                    <label for="hp" class="col-sm-2 col-form-label"><b> No.HP</b></label>
                    <div class="col-sm-10">
                      <input required type="text" name="no_hp" class="form-control" id="hp" placeholder="Ex : 08123456789" value="<?php echo $no_hp; ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-address-label"><b>Alamat</b> </label>
                    <div class="col-sm-10">
                        <textarea required class="form-control" placeholder="alamat" id="alamat" name="alamat" style="height: 100px;" ><?php echo $alamat; ?></textarea>
                    </div>
                    </div>
                  <div class="row mb-3">
                    <label for="keterangan" class="col-sm-2 col-address-label"><b> Keterangan</b></label>
                    <div class="col-sm-10">
                        <textarea class="form-control" placeholder="keterangan" id="keterangan" name="keterangan" style="height: 100px;" ><?php echo $keterangan; ?></textarea>
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
                          <button type="submit" name="aksi" value="add" class="btn btn-success"><i class="bi bi-plus"></i>Tambah</button>
                          <?php
                            }
                          ?>
                        </div>
                    </div>
                    <div class="box-footer">
                        <td>
                          <div align ="Right"> <a  href="data-siswa.php"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i><i class="bi bi-arrow-return-left" aria-hidden="true"></i>Back</a></div>
                        </td>
                        </div>
                        <div class="box-footer">
                          <?php
                            if(isset($_GET['ubah'])){
                          ?>
                            Update Data Siswa, edit form diatas untuk mengubah data siswa.
                          <?php
                            } else{
                          ?>
                            Menambah Data Siswa Perpustakaan, isi form diatas untuk menambahkan data Siswa.
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