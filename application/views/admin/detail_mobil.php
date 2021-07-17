<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Detail Forklift</h1>
    </div>
  </section>

  <?php foreach($detail as $dt): ?>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-5">
            <img width="110%;" src="<?= base_url('assets/upload/'). $dt->gambar; ?>" alt="">
          </div>
          <div class="col-md-7">
            <table class="table">
              <tr>
                <td>Tipe Forklift</td>
                <td> 
                  <?= ($dt->kode_tipe . ' - ' . $dt->nama_tipe) ?> 
                </td>
              </tr> 
              <tr>
                <td>Harga Sewa per Jam</td>
                <td>Rp. <?= number_format($dt->harga, 0, ',', '.'); ?>,-</td>
              </tr>
               
              <tr>
                <td>Status</td>
                <td>
                  <?php
                  if($dt->status == "0"){ ?>
                    <span class="badge badge-danger">Tidak Tersedia</span>                 
                  <?php }
                  else{ ?>
                    <span class="badge badge-primary">Tersedia</span>
                  <?php } ?>
                </td>
              </tr> 
            </table>

            <a href="<?= base_url('admin/data_mobil'); ?>" class="btn btn-sm btn-danger ml-4">Kembali</a>
            <a href="<?= base_url('admin/data_mobil/update_mobil/').$dt->id_mobil; ?>" class="btn btn-sm btn-primary">Update</a>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach; ?>
</div>