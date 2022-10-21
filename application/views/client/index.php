

  <!-- Start Banner Area -->
  <section class="banner-area">
    <div class="d-table">
      <div class="d-table-cell">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="banner-content">
                <h1>Laboratorium Software Engineering</h1>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="banner-img">
                <img src="<?= base_url('assets/client/') ?>images/banner/object.png" alt="Image" style="width: 80% !important;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="shape shape-1">
      <img src="<?= base_url('assets/client/') ?>images/banner/shape-1.png" alt="Image">
    </div>

    <div class="shape shape-2">
      <img src="<?= base_url('assets/client/') ?>images/banner/shape-2.png" alt="Image">
    </div>
  </section>
  <!-- End Banner Area -->

  <!-- Start Testimonials Area -->
  <section class="testimonials-area bg-color pt-100 pb-70">
    <div class="container">
      <div class="section-title">
        <span>Tentang Laboratorium Software Engineering</span>
        <h2>Yuk Berkenalan dengan kami!</h2>
      </div>

      <div class="testimonials-slider-bg">
        <div>
          <?= $about ?>
        </div>
        <div class="shape shape-1">
          <img src="<?= base_url('assets/client/') ?>images/testimonials/shape-1.png" alt="Image">
        </div>
        <div class="shape shape-2">
          <img src="<?= base_url('assets/client/') ?>images/testimonials/shape-2.png" alt="Image">
        </div>
      </div>
    </div>
  </section>
  <!-- End Testimonials Area -->

  <!-- Start Check Your Website Area -->
  <section class="check-your-websit pb-70">
    <div class="container mt-5">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <div class="website-img">
            <img src="<?= base_url('uploads/users/') . $head_of_lab->user_image ?>" alt="Image">
          </div>
        </div>

        <div class="col-lg-5">
          <div class="website-content">
            <h2>Kepala Laboratorium <span>Software Engineering</span></h2>
            <p><?= $head_of_lab->user_name ?></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, neque cumque repellendus quo eius
              sint! Facilis nisi officiis est repellat atque non ratione saepe quaerat dolores, maiores quos beatae
              eaque.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Check Your Website Area -->

  <!-- Start Team Area -->
  <section class="team-area pt-100 pb-70">
    <div class="container">
      <div class="section-title">
        <span>Asisten Laboratorium Software Engineering</span>
        <h2>Yuk Kenalan dengan kami!</h2>
      </div>

      <div class="row">
        <?php if( count($assistants) > 0 ): ?>
          <?php foreach ($assistants as $assistant) { ?>
            <div class="col-lg-4 col-md-6">
              <div class="single-team-member">
                <img src="<?= base_url('uploads/users/') . $assistant->user_image ?>" alt="Image">
    
                <div class="team-content">
                  <h3><?= $assistant->user_name ?></h3>
                  <span><?= $assistant->email ?></span>
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

  <!-- Start Marketing Area -->
  <section class="marketing-area bg-color pt-100 pb-70">
    <div class="container">
      <div class="section-title">
        <span>di Laboratorium Software Engineering ada jadwal lain</span>
        <h2>Jadwal Kegiatan Belajar Tambahan</h2>
      </div>

      <div class="row">
        <?php if( count($extracurriculars) > 0 ): ?>
          <?php foreach ($extracurriculars as $extracurricular) { ?>
            <div class="col-lg-3 col-sm-6">
              <div class="single-marketing-box" style="text-align: left !important;">
                <h3 style="text-align: center;"><?= $extracurricular->name ?></h3>
                <span>
                  <i class="ri-calendar-line"></i>
                  <?= $extracurricular->date ?>
                </span>
                <p class="mt-2"><?= $extracurricular->description ?></p>
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

  <!-- Start Blog Area -->
  <section class="blog-area pt-100 pb-70">
    <div class="container">
      <div class="section-title">
        <span>Laboratorium Software Engineering mengadakan praktikum</span>
        <h2>Jadwal Praktikum</h2>
      </div>

      <div class="row justify-content-md-center">
        <?php if( count($practices) > 0 ): ?>
          <?php foreach ($practices as $practice) { ?>
            <div class="col-lg-4 col-md-6">
              <div class="single-blog">
                <a href="#">
                  <img src="<?= base_url('uploads/practices/practice.jpg') ?>" alt="Image">
                </a>
                <span>
                  <i class="ri-calendar-line"></i>
                  <?= $practice->time ?>
                </span>
                <h3>
                  <?= $practice->name ?>
                </h3>
                <p>
                  <?= $practice->name ?>
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
  <!-- End Blog Area -->