<?php require_once("controller/script.php");
$_SESSION["project_menu"]["name_page"] = "";
require_once("templates/top.php"); ?>

<body>

  <p style="font-size: 35px;text-align: center;color: #fff;"><b>MENU DAN HARGA</b></p>

  <p style="font-size: 25px;text-align: center;color: #fff;margin-bottom: -20px;"><b>Snack dan Makanan</b></p>
  <div class="shop-container">
    <?php foreach ($views_menu_makanan as $data) : ?>
      <div class="product">
        <img src="assets/img/menu/<?= $data['image'] ?>" alt="<?= $data['judul'] ?>">
        <h4><b><?= $data['judul'] ?></b></h4>
        <p><?= $data['deskripsi'] ?></p>
        <p>Harga Rp <?= number_format($data['harga']) ?></p>
        <?php
        $phone_number = '6289530166319';
        $wa_text = urlencode("🔥 PESAN SEKARANG - " . $data['judul'] . " 🔥

Hai, saya ingin memesan " . $data['judul'] . "!

Mohon menunggu, kami akan segera mengonfirmasi ketersediaan dan total biaya. Terima kasih atas kepercayaan Anda dalam memilih " . $data['judul'] . " kami! 🙏✨");
        ?>
        <a href="javascript:void(0);" onclick="window.open('https://api.whatsapp.com/send?phone=<?= $phone_number ?>&text=<?= $wa_text; ?>', '_blank', 'width=600,height=600,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
          <button class="buy-button">BELI SEKARANG</button>
        </a>
      </div>
    <?php endforeach; ?>
  </div>

  <p style="font-size: 25px;text-align: center;color: #fff;margin-bottom: -20px;"><b>Minuman</b></p>
  <div class="shop-container">
    <?php foreach ($views_menu_minuman as $data) : ?>
      <div class="product">
        <img src="assets/img/menu/<?= $data['image'] ?>" alt="<?= $data['judul'] ?>">
        <h4><b><?= $data['judul'] ?></b></h4>
        <p><?= $data['deskripsi'] ?></p>
        <p>Harga Rp <?= number_format($data['harga']) ?></p>
        <?php
        $phone_number = '6289530166319';
        $wa_text = urlencode("🔥 PESAN SEKARANG - " . $data['judul'] . " 🔥

Hai, saya ingin memesan " . $data['judul'] . "!

Mohon menunggu, kami akan segera mengonfirmasi ketersediaan dan total biaya. Terima kasih atas kepercayaan Anda dalam memilih " . $data['judul'] . " kami! 🙏✨");
        ?>
        <a href="javascript:void(0);" onclick="window.open('https://api.whatsapp.com/send?phone=<?= $phone_number ?>&text=<?= $wa_text; ?>', '_blank', 'width=600,height=600,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
          <button class="buy-button">BELI SEKARANG</button>
        </a>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="w3-card-4 w3-aqua" style="max-width: 300px; margin: 50px auto;">
    <div class="w3-container w3-center w3-cursive">
      <h3><b>DOYAN CEMILAN</b></h3>
      <img src="assets/img/LOGO.png" alt="Avatar" style="width:80%">
      <p>Open 10:00 - 22:00</p>
      <p>Purwakarta,Jawa Barat</p>
    </div>
    <center>
      <a href="https://www.instagram.com/doyan.cemilan2022">
        <button class="w3-button-ig" style="width:40px;"></button>
      </a>
      <a href="wa.me/6289530166319">
        <button class="w3-button-wa" style="width:30px;"> </button>
      </a>
    </center>
  </div>

</body>

</html>