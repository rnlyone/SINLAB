</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-white" aria-label="Third navbar example">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="<?= img ?>/logo.svg" style="max-width: 3rem;max-height:100%"
                alt="ic"><span style="font-family: 'Poppins', sans-serif; padding-left: 10px;">SINLAB</span></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if (isset($_SESSION["user"])) {?>
        <span class="navbar-text">
        Halo, <?= $_SESSION["user"]["nama"] ?>
      </span>
        <?php } ?>
    </div>
</nav>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <?= Flasher::flash() ?>
            <h1 class="fw-light">Buat Izin Laboratorium</h1>
            <p class="lead text-muted">Segala Jenis Ketidakhadiran Laboratorium, Wajib Membuat Submisi Perizinan</p>
            <p>
            <?php if (isset($_SESSION["user"])) {
                      if($_SESSION["user"]["jenis"] == 'admin'){?>
                          <a href="dashboard" class="btn btn-dark my-2">Dashboard</a>
                      <?php } else { ?>
                        <a href="submisi" class="btn btn-dark my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Buat Submisi</a>
                      <?php } ?>
                <a href="login/logout" class="btn btn-secondary my-2">Logout</a>
            <?php } else { ?>
                <a href="login" class="btn btn-dark my-2">Login</a>
            <?php } ?>
            </p>
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Submisi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>/submisi" method="post">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nama Lengkap:</label>
            <input name="nama" value="<?= $_SESSION["user"]["nama"] ?>" type="text" class="form-control" id="recipient-name" readonly>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">NIM:</label>
            <input name="nim" value="<?= $_SESSION["user"]["id"] ?>" type="text" class="form-control" id="recipient-name" readonly>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Praktikum:</label>
            <select name="praktikum" type="text" class="form-select" id="recipient-name" required>
              <option value="">Pilih Praktikum</option>
              <?php foreach($data['praktikum'] as $praktikum) { ?>
              <option value="<?= $praktikum['id'] ?>"><?= $praktikum['nama_praktikum'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Asisten:</label>
            <select name="asisten" type="text" class="form-select" id="recipient-name" required>
              <option value="">Pilih Asisten</option>
              <?php foreach($data['asisten'] as $asisten) { ?>
              <option value="<?= $asisten['id'] ?>"><?= $asisten['nama_asisten'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Laboratorium:</label>
            <select name="laboratorium" type="text" class="form-select" id="recipient-name" required>
              <option value="">Pilih Laboratorium</option>
              <?php foreach($data['laboratorium'] as $laboratorium) { ?>
              <option value="<?= $laboratorium['id'] ?>"><?= $laboratorium['laboratorium'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Kelas:</label>
            <select name="kelas" type="text" class="form-select" id="recipient-name" required>
              <option value="">Pilih Kelas</option>
              <option value="A1">A1</option>
              <option value="A2">A2</option>
              <option value="A3">A3</option>
              <option value="A4">A4</option>
              <option value="A5">A5</option>
              <option value="A6">A6</option>
              <option value="A7">A7</option>
              <option value="B1">B1</option>
              <option value="B2">B2</option>
              <option value="B3">B3</option>
              <option value="B4">B4</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Judul:</label>
            <input name="judul" type="text" class="form-control" id="recipient-name" required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea name="deskripsi" class="form-control" id="message-text" required></textarea>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Bukti Ketidakhadiran</label>
            <input name="bukti" class="form-control" type="file" id="formFile">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="text-muted">© 2021 Laboratorium Terpadu Fakultas Ilmu Komputer</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
    </ul>
  </footer>
</div>
<?php include '../layout/footer.php' ?>