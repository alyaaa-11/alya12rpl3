<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard admin</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Jumlah Produk Card -->
          <div class="col-xxl-5 col-md-6">
            <div class="card info-card jumlahproduk-card">
              <div class="card-body">
                <h5 class="card-title">Pendapatan</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-2">
                    <h6>Rp.<?php echo number_format($pendapatan_harian, 0, ',', '.'); ?></h6>
                    <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Jumlah Produk Card -->

          


</main><!-- End #main -->

<?= $this->endSection(); ?>