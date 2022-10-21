    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $page ?></h1>
            </div>
          </div>
        </div>
      </div>
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-lg-4 col-md-4 col-sm-12">
              <div class="info-box shadow-sm">
                <span class="info-box-icon bg-secondary"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Asisten</span>
                  <span class="info-box-number"><?= $users ?></span>
                </div>
              </div>
            </div>
            <div class="col-lg-lg-4 col-md-4 col-sm-12">
              <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success"><i class="fas fa-book"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Fasilitas</span>
                  <span class="info-box-number"><?= $fasilitas ?></span>
                </div>
              </div>
            </div>
            <div class="col-lg-lg-4 col-md-4 col-sm-12">
              <div class="info-box shadow-sm">
                <span class="info-box-icon bg-info"><i class="fas fa-th"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Praktikum</span>
                  <span class="info-box-number"><?= $praktikum ?></span>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header text-center">
                  <h3>Profil</h3>
                </div>
              </div>
            </div>
            <div class="col-12">
              <form action="<?= base_url('admin/dashboard/update_about_labse') ?>" method="post">
                <div class="card">
                  <div class="card-header">
                    <h4>Tentang LAB SE</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <textarea name="about" id="about" class="summernote_form"><?= $about ?></textarea>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                  </div>
                </div>.
              </form>
            </div>
            <div class="col-6">
              <form action="<?= base_url('admin/dashboard/update_adm_op') ?>" method="post">
                <div class="card">
                  <div class="card-header">
                    <h4>Administrasi & Operasional</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Jam Operasional</label>
                      <input type="text" class="form-control" name="working_hours" id="working_hours" value="<?= $working_hours ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Jam Istirahat</label>
                      <input type="text" class="form-control" name="hours_of_rest" id="hours_of_rest" value="<?= $hours_of_rest ?>">
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-6">
              <form action="<?= base_url('admin/dashboard/update_contact') ?>" method="post">
                <div class="card">
                  <div class="card-header">
                    <h4>Kontak</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" name="email" id="email" class="form-control" value="<?= $email ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Alamat</label>
                      <textarea name="address" id="address" class="form-control"><?= $address ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Peta</label>
                      <input type="text" name="map" id="map" class="form-control" value="<?= $map ?>">
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>