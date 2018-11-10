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
      <h4 class="card-title">Pinjaman</h4>
      <br>
      <form class="forms-sample" method="POST">
        <div class="form-group">
          <label for="input" class="col-sm-2 control-label">Pinjaman</label>
          <div class="col-sm-12">
            <select name="anggota" id="input" class="form-control">
              <?php foreach ($anggota as $val): ?>
                <option <?= isset($data->id_anggota) && $val->id_anggota == $data->id_anggota ? 'selected="selected' : ''; ?>value="<?= $val->id_anggota ?>"><?= $val->nama_anggota ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="input" class="col-sm-8 control-label">Nominal</label>
          <div class="col-sm-12">
            <input type="number" name="nominal" id="input" class="form-control" required="required" value="<?= isset($data->nominal_pokok) ? $data->nominal_pokok : '' ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="input" class="col-sm-8 control-label">Tenor</label>
          <div class="col-sm-12">
            <input type="number" name="tenor" id="input" class="form-control" value="<?= isset($data->tenor_pinjaman) ? $data->tenor_pinjaman : ''?>" required="required">
          </div>
        </div>
        <div class="form-group">
          <label for="inputTanggal_disetorkan" class="col-sm-8 control-label">Tanggal Jatuh Tempo</label>
          <div class="col-sm-12">
            <input type="date" name="jatuh_tempo" id="inputTanggal_disetorkan" class="form-control" value="<?= isset($data->jatuh_tempo) ? $data->jatuh_tempo : ''?>" required="required">
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-gradient-primary mr-2" value="Submit">Simpan</button>
        <?php if (isset($data->id_pinjaman)): ?>
          <a href="<?= base_url('pinjaman/del/'.$data->id_pinjaman) ?>" title="">
            <button type="button" class="btn btn-gradient-danger btn-fw">Hapus</button>
          </a>
        <?php endif ?>
        <a href="<?= base_url('pinjaman'); ?>" title="">
          <button type="button" class="btn btn-light float-right">Batal</button>
        </a>
      </form>
    </div>
  </div>
</div>