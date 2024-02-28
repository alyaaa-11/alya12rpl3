<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Laporan Stok Barang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Laporan</li>
                <li class="breadcrumb-item active">Stok</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-2">
                                <a class="btn btn-danger" aria-current="true" href="<?= site_url('/pdf') ?>">

                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                    <span class="text">Download PDF</span>
                                </a>
                            </div>
                        </div>
                        <!-- Floating Labels Form -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($listLaporan as $row) : ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $row['nama_produk']; ?>
                                        </td>
                                        <td>
                                            <?= $row['harga_beli']; ?>
                                        </td>
                                        <td>
                                            <?= $row['harga_jual']; ?>
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

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>