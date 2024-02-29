<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Transaksi</h1>
  </div>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="mt-4 col">
            </div>
            <form action="<?= site_url('transaksi-penjualan'); ?>" class="row g-3" method="POST">
              <div class="col-md-3">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingName" name="noFaktur" value="<?= $noFaktur; ?>" disabled>
                  <input type="hidden" name="noFaktur" value="<?= $noFaktur; ?>">
                  <label for="floatingName">No. Faktur : </label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingName" name="" value="<?php 
                      date_default_timezone_set('Asia/Jakarta');
                      echo date(" Y-m-d "); ?>" disabled>
                  <input type="hidden" class="form-control" id="floatingName" name="" value="<?php 
                      date_default_timezone_set('Asia/Jakarta');
                      echo date(" Y-m-d "); ?>">
                  <label for="floatingName">Tanggal</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingName" name="waktu" value="<?php 
                      date_default_timezone_set('Asia/Jakarta');
                      echo date(" H:i:s "); ?>"disabled>
                  <input type="hidden" class="form-control" id="floatingName" name="waktu" value="<?php 
                      date_default_timezone_set('Asia/Jakarta');
                      echo date(" H:i:s "); ?>">
                  <label for="floatingName">Waktu</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-floating">
                  <input type="text" class="form-control" value="<?= session()->get('nama_user'); ?>" disabled>
                  <input type="hidden" name="username" value="<?= session()->get('nama_user'); ?>">
                  <label for="floatingName">Kasir</label>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-floating">
                  <label for="floatingName"></label>

                  <select class="js-example-basic-multiple form-select" name="id_produk">
                    <?php if (isset($produkList)) :
                      foreach ($produkList as $row) : ?>
                        <option value="<?= $row->id_produk; ?>"> <?= $row->kode_produk; ?> |
                          <?= $row->nama_produk; ?> |
                          <?= $row->stok; ?> |
                          <?= number_format($row->harga_jual, 0, ',', '.'); ?></option>
                    <?php
                      endforeach;
                    endif; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-floating">
                  <input type="text" class="form-control" name="txtqty">
                  <label for="floatingName">Jumlah Produk</label>
                </div>
              </div>
              <div class="card-footer text-end">
                <button type="submit" class="btn sm btn-success">submit</button>
              </div>


              <!-- tampil tabel -->
              <div class="col-md-12">
                <table class="table table-sm table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($detailPenjualan) && !empty($detailPenjualan)) :
                      $no = 1;
                      foreach ($detailPenjualan as $detail) : ?>

                        <tr>
                          <th>
                            <?= $no++; ?>
                          </th>
                          <th>
                            <?= $detail['nama_produk']; ?>
                          </th>
                          <th>
                            <?= $detail['qty']; ?>
                          </th>
                          <th>
                            <?= number_format($detail['total_harga'], 0, ',', '.'); ?>
                          </th>
                        </tr>
                      <?php endforeach;
                    else : ?>
                      <tr>
                        <td colspan="4">Tidak ada produk</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                  </tbody>
                </table>
              </div>
          </div>
        </div><!-- end tampil tabel -->

        <!-- form penjualan -->
        <div class="card">
          <div class="card-body">
            <h1 class="card-title">Form Pembayaran</h1>
            <div class="row g-3">
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingName" name="total" value="<?= number_format($totalHarga, 0, ',', '.'); ?>">
                  <label for="floatingName">Total : </label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" id="txtbayar" name="bayar">
                  <label for="floatingName">Bayar</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <input type="text" class="form-control" id="kembali" name="kembalian">
                  <label for="floatingName">Kembalian</label>
                </div>
              </div>
              <div class="card-footer text-end">
                <a href="<?= site_url('pembayaran') ?>" class="btn btn-primary">
                  SIMPAN
                </a>

              </div>

            </div>
          </div>
        </div>
      </div> <!--end form penjualan -->

    </div>
    </div>
  </section>
</main><!-- End #main -->

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Ambil elemen-elemen yang diperlukan
    var txtBayar = document.getElementById('txtbayar');
    var kembali = document.getElementById('kembali');
    var totalHarga = <?= $totalHarga ?>; // Ambil total harga dari controller dan diteruskan ke view

    // Tambahkan event listener untuk memantau perubahan pada input bayar
    txtBayar.addEventListener('input', function() {
      // Ambil nilai yang dibayarkan
      var bayar = parseFloat(txtBayar.value);

      // Hitung kembaliannya
      var kembalian = bayar - totalHarga;

      // Tampilkan kembaliannya pada input kembali
      if (kembalian >= 0) {
        kembali.value = kembalian.toFixed(2).replace(/(\.00)+$/, ''); // Menampilkan hingga 2 digit desimal
      } else {
        kembali.value = '0'; // Jika kembalian negatif, tampilkan '0.00'
      }
    });
  });
</script>
<?= $this->endSection(); ?>