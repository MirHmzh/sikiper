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
                  <a href="<?= base_url('simpananpokok/form') ?>" title="">
                    <button type="button" class="btn btn-gradient-dark btn-fw">Tambah</button>
                  </a>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID Simpanan Pokok</th>
                        <th>Nama Anggota</th>
                        <th>Nominal</th>
                        <th>Tanggal Disetorkan</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $val): ?>
                        <tr>
                          <td><?= $val->id_simp_pokok ?></td>
                          <td><?= $val->nama_anggota ?></td>
                          <td>Rp. <?= $val->nominal_pokok ?></td>
                          <td><?= $val->tgl_disetorkan ?></td>
                          <td>
                            <?php if ($val->status_pokok == 1): ?>
                              <i class="mdi mdi-checkbox-marked-circle green"></i>
                            <?php else: ?>
                              <i class="mdi mdi-timer-sand"></i>
                            <?php endif ?>
                          </td>
                          <td>
                            <a href="<?= base_url('simpananpokok/form/'.$val->id_simp_pokok) ?>" title="">
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