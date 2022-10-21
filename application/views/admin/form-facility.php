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
            <div class="col-12">
              <div class="card">
                <form action="<?= base_url('assistant/facilities/') . $form ?>" method="post" enctype="multipart/form-data">
                  <div class="card-header">
                    <h5><?= $page ?></h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <input type="hidden" class="form-control" name="id" id="id" value="<?= ( $data && isset($data->id) ) ?  $data->id : '' ?>" required>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="">Nama</label>
                          <input type="text" class="form-control" name="name" id="name" value="<?= ( $data && isset($data->name) ) ?  $data->name : '' ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="">Jumlah</label>
                          <input type="number" class="form-control" name="qty" id="qty" value="<?= ( $data && isset($data->qty) ) ?  $data->qty : '' ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="">Kondisi</label>
                          <textarea name="state" id="state" class="form-control"><?= ( $data && isset($data->state) ) ?  $data->state : '' ?></textarea>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="">Tahun Pengadaan</label>
                          <input type="number" class="form-control" name="year" id="year" value="<?= ( $data && isset($data->year) ) ?  $data->year : '' ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="">Deskripsi</label>
                          <textarea name="description" id="description" class="form-control"><?= ( $data && isset($data->description) ) ?  $data->description : '' ?></textarea>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="">Gambar</label>
                          <input type="file" class="form-control" name="image" id="image" <?= ($form == 'tambah') ? 'required' : '' ?>>
                          <?php if( $data && isset( $data->image ) && $data->image ): ?>
                            <img src="<?= base_url('uploads/fasilitas/') . $data->image ?>" alt="" width="260" class="mt-2">
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><?= ucwords($form) ?> Fasilitas</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>