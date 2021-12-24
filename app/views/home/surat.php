<div class="card" style="margin:auto; width: 790px">
    <div class="card-body">
        <h5 class="card-title">Submisi Perizinan &nbsp; <span class="badge bg-success"><?= $data['surat']['status']?></h5>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                    value="<?= $data['surat']['nama']?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                    value="<?= $data['surat']['id_user']?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                    value="<?= $data['surat']['kelas']?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Praktikum</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                    value="<?= $data['surat']['praktikum']?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Asisten</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                    value="<?= $data['surat']['asisten']?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Lab</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                    value="<?= $data['surat']['lab']?>">
            </div>
        </div>
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Judul:</label>
            <input name="judul" type="text" class="form-control" id="recipient-name"
                value="<?= $data['surat']['judul']?>" readonly>
        </div>
        <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea name="deskripsi" class="form-control" id="message-text"
                readonly><?= $data['surat']['deskripsi']?></textarea>
        </div>
        <!-- <div class="mb-3 row">
            <label for="message-text" class="col-form-label">Bukti:</label>
            <div class="col-sm-10">
                <img src="" class="img-fluid" alt="...">
            </div>
        </div> -->
        <a href="https://api.whatsapp.com/send?phone=62<?= $data['surat']['telp_asisten']?>>&text=%5BSINLAB%20Message%5D%0AAssalamualaikum%20Kak%2C%0ANama%20Saya%2C%20<?= $data['surat']['nama'] ?>%0ASaya%20Telah%20Submit%20Perizinan%20di%20SINLAB%0A<?= BASEURL . '/submisi/surat/' . $data['surat']['nim'] . $data['surat']['id']?>" class="btn btn-primary">Kirim Ke Asisten</a>
    </div>
</div>