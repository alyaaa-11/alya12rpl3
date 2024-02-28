<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Produk</h5>

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?= site_url('update-produk/') . $produk['id_produk']; ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" value="<?= $produk['kode_produk']; ?>" disabled>
                                    <input type="hidden" id="txtkodeproduk" name="txtkodeproduk" value="<?= $produk['kode_produk']; ?> ">
                                    <label for="kodeProduk">Kode Produk</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" value="<?= $produk['nama_produk']; ?>">
                                    <input type="hidden" id="txtnamaproduk" name="txtnamaproduk" value="<?= $produk['nama_produk']; ?>">

                                    <label for="namaProduk">Nama Produk</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" id="txthargabeli" class="form-control uang" name="txthargabeli" value="<?= $produk['harga_beli']; ?>">

                                    <label for="hargaBeli">Harga Beli</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" id="txthargajual" class="form-control uang" name="txthargajual" value="<?= $produk['harga_jual']; ?>">
                                    <label for="hargaJual">Harga Jual</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="txtsatuan" name="txtsatuan" aria-label="State">
                                        <?php foreach ($satuan as $value) : ?>
                                            <option value="<?= $value['id_satuan']; ?>"
                                            <?= ($produk['id_satuan'] == $value['id_satuan']) ? 'selected' : '' ?>>
                                            <?= $value['nama_satuan']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for=" txtsatuan">Satuan Produk</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="txtkategori" name="txtkategori" aria-label="State">
                                    <?php foreach ($kategori as $value) : ?>
                                            <option value="<?= $value['id_kategori']; ?>"
                                            <?= ($produk['id_kategori'] == $value['id_kategori']) ? 'selected' : '' ?>>
                                            <?= $value['nama_kategori']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="txtkategori">Kategori Produk</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control barang" name="txtstok" value="<?= $produk['stok']; ?>">
                                    <label for="stok">Stok</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div><!-- End floating Labels Form -->

            </div>
        </div>

        </div>
        </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>