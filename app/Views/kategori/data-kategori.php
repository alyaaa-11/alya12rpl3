<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Kategori Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item active">Kategori Produk</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="mt-4 col-3">
                            <a class="btn btn-primary" aria-current="true" href="<?= site_url('tambah-kategori') ?>">

                                <span class="icon text-white-50">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                <span class="text">Tambah</span>
                            </a>
                        </div>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                <?= session()->getFlashdata('pesan'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>

                        <!-- Table with stripped rows -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori Produk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($listKategori as $row) : ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $row['nama_kategori']; ?>
                                        </td>
                                        <td>

                                            <a href="<?= site_url('edit-kategori/' . $row['id_kategori']); ?>" class="ri ri-edit-box-fill btn btn-outline-primary"></a>
                                            <form action="/kategori/<?= $row['id_kategori']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="ri ri-delete-bin-5-fill btn btn-outline-primary" onclick=" return confirm ('Apakah anda yakin?');"id="hapusKategori" data-id="<?= $row['id_kategori']; ?>"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>