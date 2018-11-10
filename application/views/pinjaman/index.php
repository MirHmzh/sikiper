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
                  <h4 class="card-title">Pinjaman</h4>
                  <a href="<?= base_url('pinjaman/form') ?>" title="">
                    <button type="button" class="btn btn-gradient-dark btn-fw">Tambah</button>
                  </a>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID Pinjaman</th>
                        <th>Kreditur</th>
                        <th>Nominal</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tenor Pinjaman</th>
                        <th>Jatuh Tempo</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $val): ?>
                        <tr>
                          <td><?= $val->id_pinjaman ?></td>
                          <td><?= $val->nama_anggota ?></td>
                          <td><?= $val->nominal_pinjaman ?></td>
                          <td><?= $val->tanggal_pengajuan ?></td>
                          <td><?= $val->tenor_pinjaman ?></td>
                          <td><?= $val->jatuh_tempo_pembayaran ?></td>
                          <td>
                            <a href="<?= base_url('pinjaman/form/'.$val->id_pinjaman) ?>" title="">
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