<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Laporan Transaksi</h1>
    </div>

    <form action="<?= base_url('admin/laporan') ?>" method="post">
      <div class="form-group">
        <label for="">Dari Tanggal</label>
        <input type="date" name="dari" class="form-control">
        <?= form_error('dari', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group">
        <label for="">Sampai Tanggal</label>
        <input type="date" name="sampai" class="form-control">
        <?= form_error('sampai', '<div class="text-small text-danger">', '</div>') ?>
      </div>

      <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Tampilkan Data</button>
    </form>
    <hr>

    <div class="btn-group">
      <a href="<?= base_url(). 'admin/laporan/print_laporan/?dari='.set_value('dari'). '&sampai='.set_value('sampai'); ?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-print"></i> Print</a>
    </div>

    <table class="table table-responsive table-bordered table-striped mt-3">
      <tr>
        <th>No</th>
        <th>Customer</th>
        <th style="width: 30%">Mobil</th>
        <th>Tanggal Rental</th>
        <th>Waktu Rental</th>
        <th>Lama Rental (Jam)</th>
        <th>Harga/Jam</th>      
        <th>Total Pembayaran</th>
      </tr>

      <?php 
      $no = 1;
      foreach($laporan as $tr): ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $tr->nama; ?></td>
        <td style="width: 30%"><?= $tr->kode_tipe . '-' . $tr->nama_tipe; ?></td>
        <td><?= date('d/m/Y', strtotime($tr->tanggal_sewa)); ?></td>
        <td><?= date('H:i',strtotime($tr->waktu_sewa)); ?></td>
        <td><?= $tr->lama_sewa; ?></td> 
        <td>Rp.<?= number_format($tr->harga, 0,',','.'); ?>,-</td>   
        <td>Rp.<?= number_format($tr->totalpembayaran, 0,',','.'); ?>,-</td>   

        <!-- <td><?= $no++; ?></td>
        <td><?= $tr->nama; ?></td>
        <td><?= $tr->merek; ?></td>
        <td><?= date('d/m/Y', strtotime($tr->tgl_rental)); ?></td>
        <td><?= date('d/m/Y', strtotime($tr->tgl_kembali)); ?></td>
        <td>Rp.<?= number_format($tr->harga, 0,',','.'); ?>,-</td>
        <td>Rp.<?= number_format($tr->denda, 0,',','.'); ?>,-</td>
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

  </section>
</div>