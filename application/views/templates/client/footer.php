    <footer class="footer-area bg-color pt-100 pb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="single-footer-widget">
							<a href="index.html" class="logo">
								<img src="<?= base_url('') ?>assets/img/uho.png" alt="Image" width="100px">
							</a>

							<p>...</p>

							<!-- <ul class="social-icon">
								<li>
									<a href="https://www.facebook.com/" target="_blank">
										<i class="ri-facebook-fill"></i>
									</a>
								</li>
								<li>
									<a href="https://www.instagram.com/" target="_blank">
										<i class="ri-instagram-line"></i>
									</a>
								</li>
								<li>
									<a href="https://www.linkedin.com/" target="_blank">
										<i class="ri-linkedin-fill"></i>
									</a>
								</li>
								<li>
									<a href="https://twitter.com/" target="_blank">
										<i class="ri-twitter-fill"></i>
									</a>
								</li>
							</ul> -->
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="single-footer-widget">
							<h3>Link Terkait</h3>

							<ul class="import-link">
								<li>
									<a href="<?= base_url('auth/login') ?>">Masuk</a>
								</li>
								<li>
									<a href="<?= base_url('home/index') ?>">Beranda</a>
								</li>
								<li>
									<a href="<?= base_url('home/practices') ?>">Praktikum</a>
								</li>
								<li>
									<a href="<?= base_url('home/extracurriculars') ?>">Kegiatan Belajar Tambahan</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="single-footer-widget">
							<h3>Kontak</h3>

							<ul class="address">
								<li class="location">
									<i class="ri-map-pin-line"></i>
									<?= $contact['address'] ?>
								</li>
								<li>
									<i class="ri-mail-line"></i>
									<a href="#">
                    <span class="__cf_email__" data-cfemail="d2bab7bebebd92b0b9a0bdfcb1bdbf">
                      <?= $contact['email'] ?>
                    </span>
                  </a>
								</li>
								<li class="location">
									<i class="ri-time-line"></i>
                  <div>
                    <p style="margin: 0">Jam Operasional</p>
                    <p><?= $contact['working_hours'] ?></p>
                  </div>
								</li>
								<li class="location">
									<i class="ri-time-line"></i>
                  <div>
                    <p style="margin: 0">Jam Istirahat</p>
                    <p><?= $contact['hours_of_rest'] ?></p>
                  </div>
								</li>
							</ul>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer Area -->

		<!-- Start Copy Right Area -->
		<div class="copy-right-area bg-color">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<p>
							2022
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- End Copy Right Area -->
		
		<div class="go-top">
			<i class="ri-arrow-up-s-fill"></i>
			<i class="ri-arrow-up-s-fill"></i>
		</div>
		
    <script src="<?= base_url('assets/') ?>client/js/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>client/js/bootstrap.bundle.min.js"></script>
		<script src="<?= base_url('assets/') ?>client/js/meanmenu.min.js"></script>
		<script src="<?= base_url('assets/') ?>client/js/owl.carousel.min.js"></script>
		<script src="<?= base_url('assets/') ?>client/js/carousel-thumbs.min.js"></script>
    <script src="<?= base_url('assets/') ?>client/js/wow.min.js"></script>
    <script src="<?= base_url('assets/') ?>client/js/magnific-popup.min.js"></script>
    <script src="<?= base_url('assets/') ?>client/js/appear.min.js"></script>
    <script src="<?= base_url('assets/') ?>client/js/odometer.min.js"></script>
    <script src="<?= base_url('assets/') ?>client/js/progressbar.min.js"></script>
    <script src="<?= base_url('assets/') ?>client/js/jarallax.min.js"></script>
		<script src="<?= base_url('assets/') ?>client/js/form-validator.min.js"></script>
		<script src="<?= base_url('assets/') ?>client/js/contact-form-script.js"></script>
		<script src="<?= base_url('assets/') ?>client/js/ajaxchimp.min.js"></script>
		<script src="<?= base_url('assets/') ?>client/js/custom.js"></script>
  </body>
</html>