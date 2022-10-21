<!-- Start Testimonials Area -->
<section class="testimonials-area bg-color pt-100 pb-70">
    <div class="container">
      <div class="section-title">
        <span>Laboratorium Software Engineering</span>
        <h2>Daftar Fasilitas</h2>
      </div>

      <div class="testimonials-slider-bg">
        <div>
          <?= $deskripsi ?>
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

  <!-- Start Services Area -->
  <section class="services-area bg-color pt-100 pb-70">
			<div class="container">

				<div class="row">
          <?php if( count($datas) > 0 ): ?>
          <?php foreach ($datas as $data) { ?>
            <div class="col-lg-4 col-md-6">
              <div class="single-services"  style="text-align: left !important;">
                <img src="<?= base_url('uploads/fasilitas/') . $data->image ?>" alt="Image">
                <h3 style="text-align: center">
                  <a href="<?= base_url('home/facility/') . $data->id ?>"><?= $data->name ?></a>
                </h3>
                <span>
                  <i class="ri-calendar-line"></i>
                  Tahun Pengadaan: <?= $data->year ?>
                </span>
                <p><?= $data->description ?></p>
  
                <a href="<?= base_url('home/facility/') . $data->id ?>" class="default-btn">
                  Detail
                </a>
              </div>
            </div>
          <?php } ?>
          <?php else: ?>
            <p>Belum ada data Fasilitas</p>
          <?php endif; ?>

				</div>
			</div>

			<div class="shape shape-1">
				<img src="<?= base_url('assets/client/') ?>images/services/shape-1.png" alt="Image">
			</div>
			<div class="shape shape-2">
				<img src="<?= base_url('assets/client/') ?>images/services/shape-2.png" alt="Image">
			</div>
		</section>
		<!-- End Services Area -->