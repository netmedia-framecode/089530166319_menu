<?php require_once("../controller/script.php");
$_SESSION["project_menu"]["name_page"] = "Minuman";
require_once("../templates/views_top.php"); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $_SESSION['project_menu']['name_page'] ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah"><i class="bi bi-plus-lg"></i> Tambah</a>
  </div>

  <div class="card shadow mb-4 border-0">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">Gambar</th>
              <th class="text-center">Judul</th>
              <th class="text-center">Deskripsi</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Gambar</th>
              <th class="text-center">Judul</th>
              <th class="text-center">Deskripsi</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($views_menu_minuman as $data) { ?>
              <tr>
                <td><img src="../assets/img/menu/<?= $data['image'] ?>" style="width: 150px;" alt=""></td>
                <td><?= $data['judul'] ?></td>
                <td><?= $data['deskripsi'] ?></td>
                <td>Rp. <?= number_format($data['harga']) ?></td>
                <td class="text-center">
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah<?= $data['id_menu'] ?>">
                    <i class="bi bi-pencil-square"></i> Ubah
                  </button>
                  <div class="modal fade" id="ubah<?= $data['id_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0 shadow">
                          <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $data['judul'] ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="id_menu" value="<?= $data['id_menu'] ?>">
                          <input type="hidden" name="judulOld" value="<?= $data['judul'] ?>">
                          <input type="hidden" name="imageOld" value="<?= $data['image'] ?>">
                          <input type="hidden" name="menu" value="minuman">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="image">Gambar</label>
                              <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="image">
                                <label class="custom-file-label" for="customFile">Pilih file</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="judul">Judul</label>
                              <input type="text" name="judul" value="<?= $data['judul'] ?>" class="form-control" id="judul" placeholder="" required>
                            </div>
                            <div class="form-group">
                              <label for="deskripsi">Deskripsi</label>
                              <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"><?= $data['deskripsi'] ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="harga">Harga</label>
                              <input type="number" name="harga" value="<?= $data['harga'] ?>" class="form-control" id="harga" placeholder="" required>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-center border-top-0">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" name="edit_menu" class="btn btn-warning btn-sm">Ubah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $data['id_menu'] ?>">
                    <i class="bi bi-trash3"></i> Hapus
                  </button>
                  <div class="modal fade" id="hapus<?= $data['id_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0 shadow">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $data['judul'] ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="" method="post">
                          <input type="hidden" name="id_menu" value="<?= $data['id_menu'] ?>">
                          <input type="hidden" name="judul" value="<?= $data['judul'] ?>">
                          <input type="hidden" name="image" value="<?= $data['image'] ?>">
                          <input type="hidden" name="menu" value="minuman">
                          <div class="modal-body">
                            <p>Jika anda yakin ingin menghapus data ini, klik Hapus!</p>
                          </div>
                          <div class="modal-footer justify-content-center border-top-0">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" name="delete_menu" class="btn btn-danger btn-sm">hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-bottom-0 shadow">
          <h5 class="modal-title" id="tambahLabel">Tambah Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_kategori" value="2">
          <input type="hidden" name="menu" value="minuman">
          <div class="modal-body">
            <div class="form-group">
              <label for="image">Gambar</label>
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="image" required>
                <label class="custom-file-label" for="customFile">Pilih file</label>
              </div>
            </div>
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" name="judul" class="form-control" id="judul" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="number" name="harga" class="form-control" id="harga" placeholder="" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center border-top-0">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" name="add_menu" class="btn btn-primary btn-sm">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>