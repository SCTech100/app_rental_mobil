<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Transaksi</h1>
    </div>

    <table class="table table-responsive table-bordered table-striped">
      <tr>
        <th>No</th>
        <th>Customer</th>
        <th style="width: 100px;">Mobil</th>
        <th>Tanggal Rental</th>
        <th>Jam Rental</th>
        <th>Lama Rental (Jam)</th>
        <th>Harga/Jam</th>     
        <th>Status Rental</th>
        <!-- <th>Cek Pembayaran</th> -->
        <th>Total Pembayaran</th>
        <th>Status Pembayaran</th>
        <th>Bukti Pembayaran</th>
        <th>Action</th>
      </tr>

      <?php 
      $no = 1;
      foreach($transaksi as $tr): ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $tr->nama; ?></td>
        <td style="width: 100px;"><?= $tr->kode_tipe . '-' . $tr->nama_tipe; ?></td>
        <td><?= date('d/m/Y', strtotime($tr->tanggal_sewa)); ?></td>
        <td><?= date('H:i',strtotime($tr->waktu_sewa)); ?></td>
        <td><?= $tr->lama_sewa; ?></td> 
        <td>Rp.<?= number_format($tr->harga, 0,',','.'); ?>,-</td>  
        <td><?= $tr->status_rental; ?></td> 
        <td>Rp.<?= number_format($tr->totalpembayaran, 0,',','.'); ?>,-</td>   
        <td>
          <?php if ($tr->status_pembayaran == "1") { ?> 
            <div>Telah Bayar</div> 
          <?php } else { ?> 
            <div>Belum Bayar</div> 
          <?php } ?>  
        </td>  
 
        <td>
          <?php if ($tr->bukti_pembayaran != "" || $tr->bukti_pembayaran != null) { ?> 
            <a href="<?php echo 'test' + $tr->bukti_pembayaran ?>"><img src="" width="100%"></img></a> 
          <?php } else { ?> 
            <div></div> 
          <?php } ?>  
        </td>  

        <td>
          <?php if($tr->status == "1"){
            echo "-";
          }else{ ?>
            <div class="row">
              <a class="btn btn-sm btn-success mr-2" href="<?= base_url('admin/transaksi/transaksi_selesai/'.$tr->id_rental) ?>"><i class="fas fa-check"></i></a>
              <a onclick="return confirm('Yakin batal?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/transaksi/batal_transaksi/'.$tr->id_rental) ?>"><i class="fas fa-times"></i></a>
            </div>
          <?php } ?>
        </td>
      </tr>

      <?php endforeach; ?>
    </table>
  </section>
</div>