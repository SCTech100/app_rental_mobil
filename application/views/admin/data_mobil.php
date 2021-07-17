<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Forklift</h1>
    </div>
    
    <a href="<?= base_url('admin/data_mobil/tambah_mobil'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
    <?= $this->session->flashdata('pesan'); ?>

    <table class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>No</th> 
          <th>Gambar</th>
          <th>Tipe</th>
          <th>Merek</th> 
          <th>Harga/Jam</th> 
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($mobil as $mb): ?> 
        <tr>
          <td><?= $no++; ?>.</td>
          <td style="text-align:center">
            <img width="70px;text-align:center" src="<?= base_url('assets/upload/'). $mb->gambar; ?>" alt="">
          </td>
          <td><?= $mb->kode_tipe; ?></td>
          <td><?= $mb->nama_tipe; ?></td>
           
          <td>Rp.<?= number_format($mb->harga, 0, ',', '.'); ?>,-</td>
          <td>
            <?php if($mb->status == 0){ ?>
              <span class="badge badge-danger">Tidak Tersedia</span>
            <?php }
            else{ ?>
              <span class="badge badge-primary">Tersedia</span>
            <?php } ?>
          </td>
          <td>
            <a href="<?= base_url('admin/data_mobil/detail_mobil/'). $mb->id_mobil; ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
            <a onclick="return confirm('Yakin hapus?')" href="<?= base_url('admin/data_mobil/delete_mobil/'). $mb->id_mobil; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            <a href="<?= base_url('admin/data_mobil/update_mobil/'). $mb->id_mobil; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>



  </section>
</div>