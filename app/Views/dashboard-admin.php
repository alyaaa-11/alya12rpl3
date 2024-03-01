<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Selamat Datang...</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">

      <!-- card pendapatan hari ini -->
      <div class="col-lg-12">
        <div class="row">
          <div class="col-xxl-5 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Pendapatan <span>| Hari</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-2">
                    <h6>Rp.<?php echo number_format($pendapatan_harian, 0, ',', '.'); ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end card pendapatan hari ini-->

          

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">
              <div class="card-body pb-0">
                <h5 class="card-title">Data Stok Kosong </h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Kode Produk</th>
                      <th scope="col">Nama Produk</th>
                      <th scope="col">Stok</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($dataStok as $row) : ?>
                      <tr>
                        <td>
                          <?= $no++ ?>
                        </td>
                        <td>
                          <?= $row['kode_produk']; ?>
                        </td>
                        <td>
                          <?= $row['nama_produk']; ?>
                        </td>
                        <td>
                          <?= $row['stok']; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Top Selling -->




        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<?= $this->endSection(); ?>