<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Update Data Forklift</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <?php foreach($mobil as $mb): ?>

        <form action="<?= base_url('admin/data_mobil/update_mobil_aksi') ?>" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Tipe Forklift</label>
                <input type="hidden" name="id_mobil" value="<?= $mb->id_mobil; ?>">
                <select name="id_tipe" id="id_tipe" class="form-control">
                  <option value="<?= $mb->id_tipe ?>"><?= ($mb->kode_tipe . ' - ' . $mb->nama_tipe) ?></option>
                  <?php foreach($tipe as $tp): ?>
                  <option value="<?= $tp->id_tipe ?>"><?= $tp->kode_tipe . ' - ' . $tp->nama_tipe ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('id_tipe', '<div class="text-small text-danger">', '</div>') ?>
              </div>
 
            </div>
            <div class="col-md-6"> 
              <div class="form-group">
                <label for="">Harga Sewa/jam</label>
                <input type="number" name="harga" class="form-control" value="<?= $mb->harga ?>">
                <?= form_error('harga', '<div class="text-small text-danger">', '</div>') ?>
              </div> 
            </div>
          </div>
            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                  <option <?php if($mb->status == "1"){echo "selected='selected'";} echo $mb->status; ?> value="1">Tersedia</option>
                  <option <?php if($mb->status == "0"){echo "selected='selected'";} echo $mb->status; ?> value="0">Tidak Tersedia</option>
                </select>
                <?= form_error('status', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" name="gambar" accept="image/*"  class="form-control">
              </div> 
            </div>
          </div>
              <button type="submit" class="btn btn-primary mt-4">Simpan</button>
              <button type="reset" class="btn btn-success mt-4">Reset</button>
        </form>

        <?php endforeach; ?>
      </div>
    </div>

  </section>
</div>