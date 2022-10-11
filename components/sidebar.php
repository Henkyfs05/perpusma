<?php 

echo '<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#mastersiswa-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-people"></i><span>Master Siswa</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="mastersiswa-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="data-siswa.php">
          <i class="bi bi-circle"></i><span>Data Siswa</span>
        </a>
      </li>
      <li>
        <a href="data-kelas.php">
          <i class="bi bi-circle"></i><span>Data Kelas</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#masterbuku-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-bookmark"></i><span>Master Buku</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="masterbuku-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="data-buku.php">
          <i class="bi bi-circle"></i><span>Data Buku</span>
        </a>
      </li>
      <li>
        <a href="data-kategori.php">
          <i class="bi bi-circle"></i><span>Data Kategori</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#transaksi-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-clipboard-data"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="transaksi-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="transaksi-peminjaman.php">
          <i class="bi bi-circle"></i><span>Peminjaman</span>
        </a>
      </li>
      <li>
        <a href="transaksi-pengembalian.php">
          <i class="bi bi-circle"></i><span>Pengembalian</span>
        </a>
      </li>
    </ul>
  </li><!-- End Charts Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-clipboard-check"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="laporan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="laporan-buku.php">
          <i class="bi bi-circle"></i><span>Buku Laporan</span>
        </a>
      </li>
      <li>
        <a href="laporan-pengembalian.php">
          <i class="bi bi-circle"></i><span>Pengembalian</span>
        </a>
      </li>
    </ul>
  </li>
  
  <!-- End Icons Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="data-denda.php">
      <i class="bi bi-cash-coin"></i>
      <span>Denda</span>
    </a>
  </li>


</ul>

</aside>';
?>