<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

  <?php if (session()->get('level') == 'admin') : ?>
    <li class="nav-item">
      <a class="nav-link collapsed " href="<?= site_url('dashboard-admin'); ?>">
        <i class="bi bi-speedometer2"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <?php endif; ?>

    <?php if (session()->get('level') == 'kasir') : ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= site_url('dashboard-admin'); ?>">
        <i class="bi bi-speedometer2"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <?php endif; ?>

    <!-- > Master Data -->
    <?php if (session()->get('level') == 'admin') : ?>
    <li class="nav-heading">Master Data</li>
    <?php endif; ?>

    <?php if (session()->get('level') == 'admin') : ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('data-kategori'); ?>">
          <i class="ri-file-list-2-line"></i>
          <span>Kategori Produk</span>
        </a>
      </li>
    <?php endif; ?>

    <?php if (session()->get('level') == 'admin') : ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('data-satuan'); ?>">
        <i class="ri-file-list-2-line"></i>
        <span>Satuan Produk</span>
      </a>
    </li>
    <?php endif; ?>

    <?php if (session()->get('level') == 'admin') : ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('data-produk'); ?>">
        <i class="bi bi-box-seam"></i>
        <span>Produk</span>
      </a>
    </li>
    <?php endif; ?>

    <?php if (session()->get('level') == 'admin') : ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('data-user'); ?>">
          <i class="bi bi-people"></i>
          <span>Pengguna</span>
        </a>
      </li>
    <?php endif; ?>


    <!-- End Master Data  -->

    <?php if (session()->get('level') == 'kasir') : ?>
    <li class="nav-heading">Transaksi</li>
    <?php endif; ?>

    <?php if (session()->get('level') == 'kasir') : ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('transaksi-penjualan'); ?>">
        <i class="bi bi-cart"></i>
        <span>Penjualan</span>
      </a>
    </li>
    <?php endif; ?>

    <?php if (session()->get('level') == 'admin') : ?>
    <li class="nav-heading">Laporan</li>
    <?php endif; ?>

    <?php if (session()->get('level') == 'admin') : ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= site_url('laporan'); ?>">
        <i class="bi bi-shop-window"></i>
        <span>Stok Barang </span>
      </a>
    </li>
    <?php endif; ?>

    <?php if (session()->get('level') == 'admin') : ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= site_url('laporanPenjualan'); ?>">
        <i class="bi bi-clipboard2-data"></i>
        <span>Laporan Penjualan </span>
      </a>
    </li>
    <?php endif; ?>

  </ul>

</aside><!-- End Sidebar-->