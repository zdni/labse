<!-- Start Team Area -->
<section class="team-area pt-100 pb-70">
    <div class="container">
      <div class="section-title">
        <span>Kegiatan Laboratorium Software Engineering</span>
        <h2>Yuk Lihat Kegiatan Kami!</h2>
      </div>

      <div class="row">
        <?php if( count($datas) > 0 ): ?>
          <?php foreach ($datas as $data) { ?>
            <div class="col-lg-4 col-md-6">
              <div class="single-team-member">
                <img src="<?= base_url('uploads/galeri') . $data->image ?>" alt="Image">
    
                <div class="team-content">
                  <h3><?= $data->name ?></h3>
                  <span>
                    <i class="ri-calendar-line"></i>
                    <?= $data->date ?>
                  </span>
                  <span><?= $data->description ?></span>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php else: ?>
          <p>Belum ada data Galeri Kegiatan</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <!-- End Team Area -->