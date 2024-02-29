<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <div class="container">

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Pengguna</h5>
              <?php if (session()->getFlashdata('errors')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-exclamation-octagon me-1"></i>
                  <?php foreach (session('errors') as $error) : ?>
                    <?= $error; ?>
                  <?php endforeach; ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif ?>F

                <form action="<?= site_url('registrasi'); ?>" method="POST" class="row g-3 needs-validation" novalidate>
                  <div class="col-12">
                    <label for="yourName" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="yourName" required>
                  </div>

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                  </div>

                  <div class="col-12">
                    <label for="inputState" class="form-label">Level</label>
                    <select id="inputState" name="level" class="form-select" required>
                      <option selected></option>
                      <option value="Admin">Admin</option>
                      <option value="Kasir">Kasir</option>
                    </select>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                  </div>
                </form>

            </div>
          </div>

        </div>
      </div>
  </div>

  </section>

  </div>
</main><!-- End #main -->

<?= $this->endSection(); ?>