<div class="container">
  <div style="height: 150px;"></div>
  <div class="card">
    <card class="card-header">
      Form Rental Forklift
    </card> 
    <div class="card-body">
      <?php foreach($detail as $dt): ?>
      <form action="<?= base_url('customer/rental/tambah_rental_aksi') ?>" method="post">
        <div class="form-group">
          <label for="">Harga Sewa/jam</label>
          <input type="hidden" name="id_mobil" value="<?= $dt->id_mobil; ?>">
          <input type="hidden" name="harga" value="<?= $dt->harga; ?>">
          
          <!-- <input type="hidden" name="harga" value="<?= $dt->harga; ?>"> -->
          <div><b>Rp.<?= number_format($dt->harga, 0, ',', '.'); ?>,-</b></div>
          <!-- <input type="text" name="harga" class="form-control" value="<?= $dt->harga; ?>" readonly> -->
        </div>
        <!-- <div class="form-group">
          <label for="">denda/jam</label>
          <input type="text" name="denda" class="form-control" value="<?= $dt->denda; ?>" readonly>
        </div> -->
        <div class="form-group">
          <label for="">Tanggal Sewa</label>
          <input type="date" min="<?php echo date('Y-m-d');?>" value="<?php echo date('Y-m-d');?>" name="tanggal_sewa" max class="form-control" style="width: 200px">
            <?= form_error('tanggal_sewa', '<div class="text-small text-danger">', '</div>') ?>
        </div>
        <div class="form-group">
          <label for="">Jam Sewa</label>
          <input type="time" name="waktu_sewa" class="form-control" style="width: 200px" >
            <?= form_error('waktu_sewa', '<div class="text-small text-danger">', '</div>') ?>
        </div>
        <div class="form-group">
          <label for="">Lama Sewa / Jam</label>
          <input type="number" name="lama_sewa" class="form-control" style="width: 200px" min="1" >
            <?= form_error('lama_sewa', '<div class="text-small text-danger">', '</div>') ?>
        </div>
        <!-- <div class="form-group">
          <label for="">Tanggal Kembali</label>
          <input type="date" name="tgl_kembali" class="form-control">
        </div> -->

        <button type="submit" class="btn btn-primary">Rental</button>
      </form>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div style="height: 180px;"></div>
