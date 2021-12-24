
 <div class="overflow-auto p-3 bg-light" style="margin-left:auto; width: 81.333333%; position:relative;">
      <h1><?= $data['dashname'] ?></h1>
        <?= $data['datepicker'] ?>
        <hr>
      <h5>Belum Dikonfirmasi</h5>

      <div class="table-responsive">
        <table id="mytable" class="table table-dark table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col">NIM</th>
              <th scope="col">Kelas</th>
              <th scope="col">Praktikum</th>
              <th scope="col">Laboratorium</th>
              <th scope="col">Waktu</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            foreach($data['submisi'] as $submisi) {?>
            <tr>
              <th scope="row"><?= $submisi['id']?></th>
              <td><?= $submisi['nama']?></td>
              <td><?= $submisi['id_user']?></td>
              <td><?= $submisi['kelas']?></td>
              <td><?= $submisi['praktikum']?></td>
              <td><?= $submisi['lab']?></td>
              <td><span class="badge bg-primary"><?= $submisi['created_at']?></span></td>
              <td><span class="badge bg-warning"><?= $submisi['status']?></span></td>
              <td>
                <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?=$submisi['id']?>"><i data-feather='maximize-2'></i></button>
                <a href="<?= BASEURL?>/submisi/delete/<?= $submisi['id']?>" class="btn btn-danger btn-sm"><i data-feather='trash-2'></i></a></td>
            </tr>

            <div id="detail<?=$submisi['id']?>" class="modal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Detail Submisi Perizinan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['nama']?>">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">NIM</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['id_user']?>">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Kelas</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['kelas']?>">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Praktikum</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['praktikum']?>">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Asisten</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['asisten']?>">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Judul:</label>
                      <input name="judul" type="text" class="form-control" id="recipient-name" value="<?= $submisi['judul']?>" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Message:</label>
                      <textarea name="deskripsi" class="form-control" id="message-text" readonly><?= $submisi['deskripsi']?></textarea>
                    </div>
                  </div>
                  </form>
                  <div class="modal-footer">
                    <a href="<?= BASEURL?>/submisi/konfirmasi/<?= $submisi['id']?>/tolak" class="btn btn-danger">Tolak</a>
                    <a href="<?= BASEURL?>/submisi/konfirmasi/<?= $submisi['id']?>/terima" class="btn btn-success">Terima</a>
                  </div>
                </div>
              </div>
            </div>
          <?php }?>
          </tbody>
        </table>
      </div>
      <hr>
      <h5>Diterima</h5>
      <div class="table-responsive">
        <table id="tabelterima" class="table table-dark table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col">NIM</th>
              <th scope="col">Kelas</th>
              <th scope="col">Praktikum</th>
              <th scope="col">Laboratorium</th>
              <th scope="col">Waktu</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            foreach($data['diterima'] as $submisi) {?>
            <tr>
              <th scope="row"><?= $submisi['id']?></th>
              <td><?= $submisi['nama']?></td>
              <td><?= $submisi['id_user']?></td>
              <td><?= $submisi['kelas']?></td>
              <td><?= $submisi['praktikum']?></td>
              <td><?= $submisi['lab']?></td>
              <td><span class="badge bg-primary"><?= $submisi['created_at']?></span></td>
              <td><span class="badge bg-success"><?= $submisi['status']?></span></td>
              <td>
                <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?=$submisi['id']?>"><i data-feather='maximize-2'></i></button>
                <a href="<?= BASEURL?>/submisi/hapus/<?= $submisi['id']?>" class="btn btn-danger btn-sm"><i data-feather='trash-2'></i></a></td>
            </tr>

            <div id="detail<?=$submisi['id']?>" class="modal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Detail Submisi Perizinan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['nama']?>">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">NIM</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['id_user']?>">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Kelas</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['kelas']?>">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Praktikum</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['praktikum']?>">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Asisten</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['asisten']?>">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Judul:</label>
                      <input name="judul" type="text" class="form-control" id="recipient-name" value="<?= $submisi['judul']?>" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Message:</label>
                      <textarea name="deskripsi" class="form-control" id="message-text" readonly><?= $submisi['deskripsi']?></textarea>
                    </div>
                  </div>
                  </form>
                  <div class="modal-footer">
                    <a href="<?= BASEURL?>/submisi/konfirmasi/<?= $submisi['id']?>/tolak" class="btn btn-danger">Tolak</a>
                    <a href="<?= BASEURL?>/submisi/konfirmasi/<?= $submisi['id']?>/terima" class="btn btn-success">Terima</a>
                  </div>
                </div>
              </div>
            </div>
          <?php }?>
          </tbody>
        </table>
      </div>

      <hr>

      <h5>Ditolak</h5>
      <div class="table-responsive">
        <table id="tabletolak" class="table table-dark table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col">NIM</th>
              <th scope="col">Kelas</th>
              <th scope="col">Praktikum</th>
              <th scope="col">Laboratorium</th>
              <th scope="col">Waktu</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            foreach($data['ditolak'] as $submisi) {?>
            <tr>
              <th scope="row"><?= $submisi['id']?></th>
              <td><?= $submisi['nama']?></td>
              <td><?= $submisi['id_user']?></td>
              <td><?= $submisi['kelas']?></td>
              <td><?= $submisi['praktikum']?></td>
              <td><?= $submisi['lab']?></td>
              <td><span class="badge bg-primary"><?= $submisi['created_at']?></span></td>
              <td><span class="badge bg-danger"><?= $submisi['status']?></span></td>
              <td>
              <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?=$submisi['id']?>"><i data-feather='maximize-2'></i></button>
                <a href="<?= BASEURL?>/submisi/delete/<?= $submisi['id']?>" class="btn btn-danger btn-sm"><i data-feather='trash-2'></i></a></td>
            </tr>

            <div id="detail<?=$submisi['id']?>" class="modal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Detail Submisi Perizinan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['nama']?>">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">NIM</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['id_user']?>">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Kelas</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['kelas']?>">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Praktikum</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['praktikum']?>">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Asisten</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $submisi['asisten']?>">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Judul:</label>
                      <input name="judul" type="text" class="form-control" id="recipient-name" value="<?= $submisi['judul']?>" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Message:</label>
                      <textarea name="deskripsi" class="form-control" id="message-text" readonly><?= $submisi['deskripsi']?></textarea>
                    </div>
                  </div>
                  </form>
                  <div class="modal-footer">
                    <a href="<?= BASEURL?>/submisi/konfirmasi/<?= $submisi['id']?>/tolak" class="btn btn-danger">Tolak</a>
                    <a href="<?= BASEURL?>/submisi/konfirmasi/<?= $submisi['id']?>/terima" class="btn btn-success">Terima</a>
                  </div>
                </div>
              </div>
            </div>
          <?php }?>
          </tbody>
        </table>
      </div>

    </div>
</main>

</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
  <script>
      /* global bootstrap: false */
        (function () {
        'use strict'
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl)
        })
        })()

        jQuery(function($){
          $(document).ready( function () {
            $('#mytable').DataTable({
              bLengthChange: false,
              order:[[0, "desc"]],
              columnDefs: [
                { "width": "10%", "targets": 8 }
              ]
            });
          } );
          $(document).ready( function () {
            $('#tabelterima').DataTable({
              bLengthChange: false,
              order:[[0, "desc"]],
              columnDefs: [
                { "width": "10%", "targets": 8 }
              ]
            });
          } );
          $(document).ready( function () {
            $('#tabletolak').DataTable({
              bLengthChange: false,
              order:[[0, "desc"]],
              columnDefs: [
                { "width": "10%", "targets": 8 }
              ]
            });
          } );
        });
  </script>
