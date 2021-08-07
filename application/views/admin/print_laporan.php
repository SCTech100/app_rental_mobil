<h3 style="text-align: center;">Laporan Transaksi Rental Mobil</h3>

<table>
  <tr>
    <td>Dari Tanggal</td>
    <td>:</td>
    <td><?= date('d-M-Y', strtotime($_GET['dari'])); ?></td>
  </tr>
  <tr>
    <td>Sampai Tanggal</td>
    <td>:</td>
    <td><?= date('d-M-Y', strtotime($_GET['sampai'])); ?></td>
  </tr>
</table>

<table class="table table-bordered table-striped mt-3">
  <tr>
    <th>No</th>
    <th>Customer</th>
    <th>Forklift</th>
    <th>Tanggal Rental</th>
    <th>Waktu Rental</th>
    <th>Lama Rental (Jam)</th>
    <th>Harga/Jam</th>      
    <th>Total Pembayaran</th> 
    
    <!-- <th>Tgl. Kembali</th>
    <th>Harga/Hari</th>
    <th>Denda/Hari</th>
    <th>Total Denda</th>
    <th>Tgl. Dikembalikan</th>
    <th>Status Pengembalian</th>
    <th>Status Rental</th> -->
  </tr>

  <?php 
  $no = 1;
  foreach($laporan as $tr): ?>
  <tr>
    <td><?= $no++; ?></td>
    <td><?= $tr->nama; ?></td>
    <td><?= $tr->kode_tipe . '-' . $tr->nama_tipe; ?></td>
    <td><?= date('d/m/Y', strtotime($tr->tanggal_sewa)); ?></td>
    <td><?= date('H:i',strtotime($tr->waktu_sewa)); ?></td>
    <td><?= $tr->lama_sewa; ?></td> 
    <td>Rp.<?= number_format($tr->harga, 0,',','.'); ?>,-</td>   
    <td>Rp.<?= number_format($tr->totalpembayaran, 0,',','.'); ?>,-</td>   
     
    <!-- <td>Rp.<?= number_format($tr->denda, 0,',','.'); ?>,-</td>
    <td>Rp.<?= number_format($tr->total_denda, 0,',','.'); ?>,-</td>
    <td>
      <?php if($tr->tgl_pengembalian == "0000-00-00"){
        echo "-";
      }else{
        echo date('d/m/Y', strtotime($tr->tgl_pengembalian));
      } ?>
    </td>

    <td>
      <?php if($tr->status_pembayaran == "1"){
        echo "Kembali";
      }else{
        echo "Belum Kembali";
      }?>
    </td>


    <td>
      <?php if($tr->status_pembayaran == "1"){
        echo "Selesai";
      }else{
        echo "Belum Selesai";
      }?>
    </td> -->
  </tr>

  <?php endforeach; ?>
</table>
<br>
<table class="" style="width: 100%">
    <tr>  
      <td style="width: 80%">
      </td>
      <td style="width: 20%">
        <?= date('d/m/Y'); ?>
      </td>
    </tr>
    <tr style="height:100px;">  
      <td style="width: 80%">
      </td>
      <td style="width: 20%">
        
      </td>
    </tr>
    <tr style="height:100px;">  
      <td style="width: 80%">
      </td>
      <td style="width: 20%">
        Admin
      </td>
    </tr>
</table>

<script>
  window.print();
</script>