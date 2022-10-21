    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $page ?></h1>
              <a href="<?= base_url('assistant/facilities') ?>" class="btn btn-sm btn-secondary">Kembali</a>
            </div>
          </div>
        </div>
      </div>
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-5 col-12">
              <div class="card card-primary">
                <div class="card-body">
                  <strong><i class="fas fa-user mr-1"></i> Nama</strong>
                  <p class="text-muted"><?= ( $data && isset($data->name) ) ?  $data->name : '' ?></p>
                  <span class="badge badge-info"><?= ( $data && isset($data->nik) ) ?  $data->nik : '' ?></span>
                  <hr>
                  <strong><i class="fas fa-th mr-1"></i> Jumlah</strong>
                  <p class="text-muted"><?= ( $data && isset($data->qty) ) ?  $data->qty : '' ?></p>
                  <hr>
                  <strong><i class="fas fa-flag mr-1"></i> Keadaan</strong>
                  <p class="text-muted"><?= ( $data && isset($data->state) ) ?  ucwords($data->state) : '' ?></p>
                  <hr>
                  <strong><i class="fas fa-flag mr-1"></i> Tahun Pengadaan</strong>
                  <p class="text-muted"><?= ( $data && isset($data->year) ) ?  ucwords($data->year) : '' ?></p>
                  <hr>
                  <strong><i class="fas fa-tag mr-1"></i> Keterangan</strong>
                  <p class="text-muted"><?= ( $data && isset($data->description) ) ?  ucwords($data->description) : '' ?></p>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-12">
              <div class="card">
                <div class="card-body">
                  <img src="<?= base_url('uploads/fasilitas/') . $data->image ?>" alt="" width="60%">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>