<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Kategori Produk</h5>

                        <!-- Floating Labels Form -->
                        <form class="row g-3"action="<?= site_url('update-kategori/').$kategori['id_kategori']; ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text"value="<?= $kategori['nama_kategori']; ?>" name="txtNamaKategori" class="form-control" id="floatingName" placeholder="Your Name">
                                    <label for="floatingName">Nama Kategori Produk</label>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>