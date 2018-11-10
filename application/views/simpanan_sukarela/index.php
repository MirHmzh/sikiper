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
                  <h4 class="card-title">Simpanan Sukarela</h4>
                  <!-- <p class="card-description">
                    Add class <code>.table-hover</code>
                  </p> -->
                  <a href="<?= base_url('simpanansukarela/form') ?>" title="">
                    <button type="button" class="btn btn-gradient-dark btn-fw">Tambah</button>
                  </a>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID Simpanan Wajib</th>
                        <th>Nama Anggota</th>
                        <th>Nominal</th>
                        <th>Tanggal Disetorkan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $val): ?>
                        <tr>
                          <td><?= $val->id_simp_sukarela ?></td>
                          <td><?= $val->nama_anggota ?></td>
                          <td>Rp. <?= $val->nominal_simp_sukarela ?></td>
                          <td><?= $val->tgl_disetorkan ?></td>
                          <td>
                            <a href="<?= base_url('simpanansukarela/form/'.$val->id_simp_sukarela) ?>" title="">
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