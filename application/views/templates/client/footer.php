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
            <div id="map" style="width: 100%; height: 100%; color:black;"></div>
            <a class="btn btn-sm btn-outline-success mt-3" href="https://www.google.com/maps/@<?= $contact['map'] ?>,19z" target="blank">Buka di Map</a>
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

    <span id="lat"><?= $contact['lat'] ?></span>
    <span id="lng"><?= $contact['lng'] ?></span>
		
		<div class="go-top">
			<i class="ri-arrow-up-s-fill"></i>
			<i class="ri-arrow-up-s-fill"></i>
		</div>
		
    <!-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>  -->
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
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
    <script>
      const lat = parseFloat(document.querySelector('#lat').innerHTML);
      const lng = parseFloat(document.querySelector('#lng').innerHTML);
      let map = L.map('map', {
        center: [lat, lng],
        zoom: 18,
        zoomControl: false,
        layers:[]
      }); 
      console.log( map )
      L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
          opacity: 1.0, 
          // maxZoom: 19,
          attribution: 'WebGIS Trainning by Roni Haryadi'
          // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
      }).addTo(map);
    </script>
  </body>
</html>