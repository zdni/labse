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
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5>Daftar <?= $page ?></h5>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-tambah-galeri">Tambah <?= $page ?></button>
                  <div class="modal fade" id="modal-tambah-galeri">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('assistant/galleries/tambah') ?>" method="post" enctype="multipart/form-data">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah <?= $page ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Nama</label>
                              <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group">
                              <label for="">Tanggal</label>
                              <input type="text" class="form-control" name="date" id="date">
                            </div>
                            <div class="form-group">
                              <label for="">File</label>
                              <input type="file" class="form-control" name="image" id="image">
                            </div>
                            <div class="form-group">
                              <label for="">Deskripsi</label>
                              <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah <?= $page ?></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped table-hover table-data">
                    <thead>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Galeri</th>
                      <th>Tanggal</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach ($datas as $data) {  ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $data->name ?></td>
                          <td>
                            <img src="<?= base_url('uploads/galeri/') . $data->image ?>" alt="" width="160px">
                          </td>
                          <td><?= $data->date ?></td>
                          <td><?= $data->description ?></td>
                          <td>
                            <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="modal" data-target="#modal-ubah-galeri-<?= $data->id ?>">Ubah</button>
                            <div class="modal fade" id="modal-ubah-galeri-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('assistant/galleries/ubah') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Ubah <?= $page ?></h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $data->name ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="text" class="form-control" name="date" id="date" value="<?= $data->date ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">File</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="description" id="description" class="form-control"><?= $data->description ?></textarea>
                                      </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-primary">Ubah <?= $page ?></button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-hapus-galeri-<?= $data->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-hapus-galeri-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('assistant/galleries/hapus') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus <?= $page ?></h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <p>Yakin ingin menghapus Galeri <?= $data->name ?></p>
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