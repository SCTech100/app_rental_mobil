<div style="height: 150px;"></div>
<div class="container">
  <div class="card mx-auto">
    <div class="card-header">
      Data Transaksi Anda
    </div>
    <span class="mt-2 p-2"><?= $this->session->flashdata('pesan'); ?></span>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <tr>
          <th>No</th>
          <th>Nama Customer</th>
          <th>Forklift</th> 
          <th>Tanggal Sewa</th>
          <th>Waktu Sewa</th>
          <th>Lama Sewa</th>
          <th>Harga Sewa</th>
          <th>Total Sewa</th>
          <th>Action</th>
          <th>Batal</th>
        </tr>

        <?php
        $no = 1;
        foreach($transaksi as $tr): ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $tr->nama; ?></td>
          <td><?= $tr->kode_tipe . '-' . $tr->nama_tipe; ?></td> 
          <td><?= date('d/m/Y', strtotime($tr->tanggal_sewa)); ?></td>
          <td><?= date('H:i',strtotime($tr->waktu_sewa)); ?></td>
          <td><?= $tr->lama_sewa; ?></td>
          <td>Rp.<?= number_format($tr->harga, 0, ',', '.'); ?>,-</td>
          <td>Rp.<?= number_format($tr->harga * $tr->lama_sewa , 0, ',', '.'); ?>,-</td>
          <td>
            <?php if($tr->status_rental == "Selesai"){ ?>
              <button class="btn btn-sm btn-danger">Rental Selesai</button>
            <?php }
            else{ ?>
              <a href="<?= base_url('customer/transaksi/pembayaran/'.$tr->id_rental); ?>" class="btn btn-sm btn-success">Cek Pembayaran</a>
            <?php } ?>
          </td>
          <td>
            
            <?php if($tr->status_rental == 'Belum Selesai'){ ?>
              <a onclick="return confirm('Yakin batal?')" class="btn btn-sm btn-danger" href="<?= base_url('customer/transaksi/batal_transaksi/'.$tr->id_rental) ?>">Batal</a>
            <?php }
            else{ ?>
              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
                Batal
              </button>
            <?php } ?>
          </td>
        </tr>

        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

<div style="height: 180px;"></div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Batal Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Maaf, transaksi ini sudah selesai, dan tidak bisa dibatalkan!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>