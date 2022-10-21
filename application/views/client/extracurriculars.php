<!-- Start Marketing Area -->
<section class="marketing-area bg-color pt-100 pb-70">
    <div class="container">
      <div class="section-title">
        <span>di Laboratorium Software Engineering ada jadwal lain</span>
        <h2>Jadwal Kegiatan Belajar Tambahan</h2>
      </div>

      <div class="row">
        <?php if( count($datas) > 0 ): ?>
          <?php foreach ($datas as $data) { ?>
            <div class="col-lg-3 col-sm-6">
              <div class="single-marketing-box" style="text-align: left !important;">
                <h3 style="text-align: center;"><?= $data->name ?></h3>
                <span>
                  <i class="ri-calendar-line"></i>
                  <?= $data->date ?>
                </span>
                <p class="mt-2"><?= $data->description ?></p>
              </div>
            </div>
          <?php } ?>
        <?php else: ?>
          <h3>Belum ada Jadwal Kegiatan Belajar Tambahan</h3>
        <?php endif; ?>
      </div>
    </div>

    <div class="shape shape-1">
      <img src="<?= base_url('assets/client/') ?>images/marketing/shape-1.png" alt="Image">
    </div>
    <div class="shape shape-2">
      <img src="<?= base_url('assets/client/') ?>images/marketing/shape-2.png" alt="Image">
    </div>
  </section>
  <!-- End Marketing Area -->