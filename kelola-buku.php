<!DOCTYPE html>
<?php
    include 'koneksi.php';
    include 'sesi.php';

    $id_buku = '';
    $kode_buku = '';
    $judul_buku = '';

    $query_kategori = "SELECT * FROM tb_kategori";
    $sql_kategori = mysqli_query($conn, $query_kategori);
    $kategori = '';
    $penerbit = '';
    $pengarang = '';
    $tahun_terbit = '';
    $stok_buku = '';
    $keterangan = '';

    if(isset($_GET['ubah'])){
      $id_buku = $_GET['ubah'];
      
      $query = "SELECT * FROM tb_buku WHERE id_buku = '$id_buku';";
      $sql = mysqli_query($conn, $query);

      $result = mysqli_fetch_assoc($sql);

      $kode_buku = $result['kode_buku'];
      $judul_buku = $result['judul_buku'];
      $kategori = $result['kategori'];
      $penerbit = $result['penerbit'];
      $pengarang = $result['pengarang'];
      $tahun_terbit = $result['tahun_terbit'];
      $stok_buku = $result['stok_buku'];
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
      <h1>Data buku</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Master Buku</li>
          <li class="breadcrumb-item">Data Buku</li>
          <?php
            if(isset($_GET['ubah'])){
          ?>
          <li class="breadcrumb-item active">Edit Data Buku</li>
          <?php
            } else {
          ?>
          <li class="breadcrumb-item active">Tambah Buku</li>
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
                <h5 class="card-title">Edit Data Buku</h5>
              <?php
                } else {
              ?>
              <h5 class="card-title">Tambah Buku</h5>
              <?php
                }
              ?>

              <!-- Horizontal Form -->
              <form method="POST" action="proses-buku.php">
                <input type="hidden" value="<?php echo $id_buku; ?>" name="id_buku">
                <div class="row mb-3">
                    <label for="kode_buku" class="col-sm-2 col-form-label"><b> Kode Buku</b></label>
                    <div class="col-sm-10">
                    <input required type="text" name="kode_buku" class="form-control" id="kode_buku" placeholder="Ex : 978-602-8519-93-9" value="<?php echo $kode_buku; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="judul_buku" class="col-sm-2 col-form-label"><b> Judul Buku</b></label>
                    <div class="col-sm-10">
                    <input required type="text" name="judul_buku" class="form-control" id="judul_buku" placeholder="Ex : Mencari Jati diri" value="<?php echo $judul_buku; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="kategori" class="col-sm-2 col-form-label"><b> Kategori</b></label>
                  <div class="col-sm-10">
                      <select required id="kategori" name="kategori" class="form-select">
                         
                          <?php 
                            while($list_kategori = mysqli_fetch_assoc($sql_kategori)){
                          ?>
                          
                          <option 
                            <?php if($kategori == $list_kategori['id_kategori']){echo "selected";}?> 
                            value=<?php echo $list_kategori['id_kategori']; ?>
                            >
                            <?php echo $list_kategori['kategori']; ?>
                          </option>
                          <?php } ?>
                        </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="penerbit" class="col-sm-2 col-form-label"><b> Penerbit</b></label>
                <div class="col-sm-10">
                <input required type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Ex : Azka Press" value="<?php echo $penerbit; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label for="pengarang" class="col-sm-2 col-form-label"><b> Pengarang</b></label>
              <div class="col-sm-10">
              <input required type="text" name="pengarang" class="form-control" id="pengarang" placeholder="Ex : Tere Liye" value="<?php echo $pengarang; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label for="tahun_terbit" class="col-sm-2 col-form-label"><b> Tahun Terbit</b></label>
            <div class="col-sm-10">
              <input required type="text" name="tahun_terbit" class="form-control" maxlength="4" id="tahun_terbit" placeholder="Ex : 2001" value="<?php echo $tahun_terbit; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label for="stok_buku" class="col-sm-2 col-form-label"><b> Stok</b></label>
            <div class="col-sm-10">
            <input required type="number" name="stok_buku" class="form-control" maxlength="4" id="stok_buku" placeholder="Ex : 10" value="<?php echo $stok_buku; ?>">
          </div>
        </div>
        <div class="row mb-3">
            <label for="keterangan" class="col-sm-2 col-address-label"><b>Keterangan</b> </label>
            <div class="col-sm-10">
              <textarea class="form-control" placeholder="keterangan" id="keterangan" name="keterangan" style="height: 100px;"><?php echo $keterangan; ?></textarea>
            </div>
        </div>
        
        <div class="col-sm-4">
          <div class="btn-group">
            <button type="reset" class="btn btn-info"><i class="bi bi-arrow-repeat" ></i>Reset</button>
          </div>
          <div class="btn-group">
            <?php if(isset($_GET['ubah'])){ ?>
              <button type="submit" name="aksi" value="edit" class="btn btn-success"><i class="bi bi-upload"></i> Update</button>
            <?php } else{ ?>
              <button type="submit" name="aksi" value="add" class="btn btn-success"><i class="bi bi-plus"></i> Tambah</button>
            <?php } ?>
          </div>
        </div>

        <div class="box-footer">
          <td>
            <div align ="Right"> <a  href="data-buku.php"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i><i class="bi bi-arrow-return-left" aria-hidden="true"></i>Back</a></div>
          </td>
        </div>

        <div class="box-footer">
          <?php if(isset($_GET['ubah'])){ ?>
            Update Data Buku, edit form diatas untuk mengubah data buku.
          <?php } else { ?>
            Menambah Data Buku Perpustakaan, isi form diatas untuk menambahkan data Buku Perpustakaan. 
           <?php } ?>
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