            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <?php if ($this->session->flashdata('msg')): ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <?= $this->session->flashdata('msg') ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif ?>
                  <h4 class="card-title">Anggota</h4>
                  <!-- <p class="card-description">
                    Add class <code>.table-hover</code>
                  </p> -->
                  <a href="<?= base_url('anggota/form') ?>" title="">
                    <button type="button" class="btn btn-gradient-dark btn-fw">Tambah</button>
                  </a>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID Anggota</th>
                        <th>NIK Anggota</th>
                        <th>Nama Anggota</th>
                        <th>Tanggal Bergabung</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- <?php print_r($data); ?> -->
                      <?php foreach ($data as $val): ?>
                        <tr>
                          <td><?= $val->id_anggota ?></td>
                          <td><?= $val->nik_anggota ?></td>
                          <td><?= $val->nama_anggota ?></td>
                          <td><?= $val->tgl_bergabung ?></td>
                          <td>
                            <a href="<?= base_url('anggota/form/'.$val->id_anggota) ?>" title="">
                              <button type="button" class="btn btn-outline-warning btn-fw">Sunting</button>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>