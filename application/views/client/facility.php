<!-- Start Case Details Area -->
<section class="case-details-area ptb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="case-content">
            <div class="case-img">
              <img src="<?= base_url('uploads/fasilitas/') . $data->image ?>" alt="Image" />
            </div>
            <span>Detail Fasilitas</span>
            <h3>Kondisi</h3>
            <?= $data->state ?>

            <h3 class="mt-5">Deskripsi</h3>

            <?= $data->description ?>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="case-sidebar">
            <h3><?= $data->name ?></h3>

            <ul>
              <li>
                Jumlah
                <span>: <?= $data->qty ?></span>
              </li>
              <li>
                Tahun Pengadaan
                <span>: <?= $data->year ?></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Case Details Area -->