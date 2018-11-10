<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <?php if ($this->session->flashdata('msg')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= $this->session->flashdata('msg') ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif ?>
      <h4 class="card-title">Angsuran</h4>
      <br>
      <form class="forms-sample" method="POST">
        <input type="hidden" name="id_pinjaman" id="inputId_pinjaman" class="form-control" value="<?= $data->id_pinjaman ?>">
        <div class="form-group">
          <label for="input" class="col-sm-8 control-label">Nominal</label>
          <div class="col-sm-12">
            <input type="number" name="nominal_angsuran" id="input" class="form-control" required="required" value="<?= isset($data->nominal_angsuran) ? $data->nominal_angsuran : '' ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="input" class="col-sm-8 control-label">Tenor</label>
          <div class="col-sm-12">
            <input type="number" name="angsuran_ke" id="input" class="form-control" value="<?= isset($data->angsuran_ke) ? $data->angsuran_ke : ''?>" required="required">
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-gradient-primary mr-2" value="Submit">Simpan</button>
        <?php if (isset($data->id_pinjaman)): ?>
          <a href="<?= base_url('angsuran/del/'.$data->id_pinjaman) ?>" title="">
            <button type="button" class="btn btn-gradient-danger btn-fw">Hapus</button>
          </a>
        <?php endif ?>
        <a href="<?= base_url('angsuran'); ?>" title="">
          <button type="button" class="btn btn-light float-right">Batal</button>
        </a>
      </form>
    </div>
  </div>
</div>