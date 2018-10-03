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
      <h4 class="card-title">Anggota</h4>
      <!-- <p class="card-description">
        Basic form elements
      </p> -->
      <br>
      <form class="forms-sample" method="POST">
        <div class="form-group">
          <label for="nik">NIK</label>
          <input type="number" name="nik" class="form-control" id="nik" placeholder="NIK Anggota" value="<?= $data->nik_anggota ? $data->nik_anggota : ''?>">
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anggota" value="<?= $data->nama_anggota ? $data->nama_anggota : ''?>">
        </div>
        <?php if ($data->id_anggota): ?>
          <div class="form-group">
            <label for="nama">Tanggal Bergabung</label>
            <input type="text" name="tgl_bergabung" disabled="disabled" class="form-control" id="nama" placeholder="Nama Anggota" value="<?= $data->tgl_bergabung ? $data->tgl_bergabung : ''?>">
          </div>
        <?php endif ?>
        <button type="submit" name="submit" class="btn btn-gradient-primary mr-2" value="Submit">Submit</button>
        <a href="<?= base_url('anggota/del/'.$data->id_anggota) ?>" title="">
          <button type="button" class="btn btn-gradient-danger btn-fw">Hapus</button>
        </a>
        <a href="<?= base_url('anggota'); ?>" title="">
          <button type="button" class="btn btn-light float-right">Batal</button>
        </a>
      </form>
    </div>
  </div>
</div>