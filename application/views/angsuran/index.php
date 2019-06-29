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
                  <h4 class="card-title">Angsuran</h4>
                  <!-- <a href="<?= base_url('angsuran/form') ?>" title="">
                    <button type="button" class="btn btn-gradient-dark btn-fw">Tambah</button>
                  </a> -->
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID Pinjaman</th>
                        <th>Nominal Pinjaman</th>
                        <th>Nominal Terangsur </th>
                        <th>Angsuran/Tenor</th>
                        <th>Status Angsuran</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $val): ?>
                        <tr>
                          <td><?= $val->id_pinjaman ?></td>
                          <td><?= $val->nominal_pinjaman ?></td>
                          <td><?= $val->jumlah_terangsur ?></td>
                          <td><?= $val->jumlah_diangsur?>/<?= $val->tenor_pinjaman ?></td>
                          <td>
                            <?php if ($val->status_angsuran == 1): ?>
                              <i class="mdi mdi-checkbox-marked-circle green"></i>
                            <?php else: ?>
                              <i class="mdi mdi-timer-sand"></i>
                            <?php endif ?>
                          </td>
                          <td>
                            <a href="<?= base_url('angsuran/form/'.$val->id_pinjaman) ?>" title="">
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