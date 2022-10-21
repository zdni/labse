<section class="blog-area pt-100 pb-70">
    <div class="container">
      <div class="section-title">
        <span>Laboratorium Software Engineering mengadakan praktikum</span>
        <h2>Jadwal Praktikum</h2>
      </div>

      <div class="row">
        <?php if( count($datas) > 0 ): ?>
          <?php foreach ($datas as $data) { ?>
            <div class="col-lg-3 col-md-6">
              <div class="single-blog">
                <a href="#">
                  <img src="<?= base_url('uploads/practices/practice.jpg') ?>" alt="Image">
                </a>
                <span>
                  <i class="ri-calendar-line"></i>
                  <?= $data->time ?>
                </span>
                <h3>
                  <?= $data->name ?>
                </h3>
                <p>
                  <?= $data->name ?>
                </p>
              </div>
            </div>
          <?php } ?>
        <?php else: ?>
          <h3>Belum ada Jadwal Praktikum</h3>
        <?php endif; ?>
      </div>
    </div>
  </section>