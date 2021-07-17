<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Input Data Forklift</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <form action="<?= base_url('admin/data_mobil/tambah_mobil_aksi') ?>" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Tipe Forklift</label>
                <select name="id_tipe" id="id_tipe" class="form-control">
                  <option value="">--Pilih Tipe Forklift--</option> 
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
                <input type="number" name="harga" class="form-control">
                <?= form_error('harga', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                  <option value="">--Pilih Status--</option>
                  <option value="1">Tersedia</option>
                  <option value="0">Tidak Tersedia</option>
                </select>
                <?= form_error('status', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-md-6">  
              <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" accept="image/*" name="gambar" class="form-control">
              </div> 
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        <button type="reset" class="btn btn-success mt-4">Reset</button>
            
        </form>
      </div>
    </div>


  </section>
</div>