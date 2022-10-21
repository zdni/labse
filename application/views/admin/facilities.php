<div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-md-6 col-12">
              <h1 class="m-0"><?= $page ?></h1>
            </div>
          </div>
        </div>
      </div>
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <form action="<?= base_url('assistant/facilities/ubah_deskripsi') ?>" method="post">
                <div class="card">
                  <div class="card-header">
                    <h5>Deskripsi</h5>
                  </div>
                  <div class="card-body">
                    <textarea name="deskripsi" id="deskripsi" class="summernote_form"><?= $deskripsi ?></textarea>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Ubah Deskripsi</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5>Daftar <?= $page ?></h5>
                  <a class="btn btn-sm btn-primary" href="<?= base_url('assistant/facilities/form?form=tambah') ?>">Tambah <?= $page ?></a>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped table-hover table-data-no-search">
                    <thead>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                      <th>Tahun Pengadaan</th>
                      <th>Keadaan</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach ($datas as $data) {  ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $data->name ?></td>
                          <td><?= $data->qty ?></td>
                          <td><?= $data->year ?></td>
                          <td><?= $data->state ?></td>
                          <td>
                            <img src="<?= base_url('uploads/fasilitas/') . $data->image ?>" alt="" width="60">
                          </td>
                          <td>
                            <a class="btn btn-sm btn-outline-secondary" href="<?= base_url('assistant/facilities/detail/') . $data->id ?>">Detail</a>
                            <a class="btn btn-sm btn-outline-primary" href="<?= base_url('assistant/facilities/form/') . $data->id . '?form=ubah' ?>">Ubah</a>
                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-hapus-facility-<?= $data->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-hapus-facility-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('assistant/facilities/hapus') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus <?= $page ?></h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <p>Yakin ingin menghapus Data <?= $data->name ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-danger">Hapus <?= $page ?></button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>                        
                      <?php $number++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>