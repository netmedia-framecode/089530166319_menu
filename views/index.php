<?php require_once("../controller/script.php");
$_SESSION["project_menu"]["name_page"] = "";
require_once("../templates/views_top.php"); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">List Daftar Menu</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="makanan">Detail Makanan</a>
              <a class="dropdown-item" href="minuman">Detail Minuman</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="text-center">Gambar</th>
                  <th class="text-center">Judul</th>
                  <th class="text-center">Deskripsi</th>
                  <th class="text-center">Kategori</th>
                  <th class="text-center">Harga</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th class="text-center">Gambar</th>
                  <th class="text-center">Judul</th>
                  <th class="text-center">Deskripsi</th>
                  <th class="text-center">Kategori</th>
                  <th class="text-center">Harga</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($views_menu_limit as $data) { ?>
                  <tr>
                    <td><img src="../assets/img/menu/<?= $data['image'] ?>" style="width: 150px;" alt=""></td>
                    <td><?= $data['judul'] ?></td>
                    <td><?= $data['deskripsi'] ?></td>
                    <td><?php if ($data['id_kategori'] == 1) {
                          echo "Makanan";
                        } else {
                          echo "Minuman";
                        } ?></td>
                    <td>Rp. <?= number_format($data['harga']) ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>