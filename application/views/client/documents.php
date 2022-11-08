    <section class="pricing-area bg-color pt-100 pb-70">
			<div class="container">
				<div class="section-title">
					<span>Dokumen Laboratorium Software Engineering</span>
				</div>

        <div class="row justify-content-md-center">
          <?php if( count($datas) > 0 ): ?>
            <?php foreach ($datas as $data) { ?>
              <div class="col-lg-3 col-md-6">
                <div class="single-pricing">
                  <div class="pricing-title">
                    <h3><?= $types[$data->type] ?></h3>
                    <h2><?= $data->name ?></h2>
                    <span><?= $data->description ?></span>
                  </div>
    
                  <a class="default-btn" href="<?= base_url('uploads/dokumen') . $data->file ?>" download>
                    Download File
                  </a>
                </div>
              </div>
            <?php } ?>
          <?php else: ?>
            <p>Tidak ada data Dokumen</p>
          <?php endif; ?>

        </div>
				</div>
			</div>

			<div class="shape shape-1">
				<img src="<?= base_url('assets/client/') ?>images/pricing-shape-1.png" alt="Image">
			</div>
			<div class="shape shape-2">
				<img src="<?= base_url('assets/client/') ?>images/pricing-shape-2.png" alt="Image">
			</div>
		</section>
		<!-- End Pricing Area -->