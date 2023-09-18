<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Simulasi</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?= base_url('admin/tambah_simulasi'); ?>'>Tambah import</a>
            </div>

            <?php
            $transaksi = $this->db->query('SELECT * FROM tb_sales');
            $qty = $this->db->query("SELECT sum(qty) as total_qty FROM tb_sales")->row();
            $value = $this->db->query("SELECT sum(value) as total_value FROM tb_sales")->row();
            $top_sales = $this->db->query("SELECT sales, sum(value) as total_value FROM tb_sales group by sales order by total_value DESC")->row();
            
            foreach ($record as $r) {
              $this->db->select('sum(tb_import.value) / sum(tb_import.qty) hpp');
              $this->db->from('tb_import');
              $this->db->where('tb_import.id_barang',$r['id_barang']);
              $summary_hpp = $this->db->get()->result_array();
              $summary_gross = $r['harga_jual']*$r['qty'] - $summary_hpp[0]['hpp']*$r['qty'];
              $summary_total_value += $r['value'];
              $summary_total_hpp += $summary_hpp[0]['hpp']*$r['qty'];
              $summary_total_gross += $summary_gross;
            }
             $summary_average_persen = ($summary_total_gross /  $summary_total_hpp) * 100; 

            ?>

            <div class="card-body">
              <div class="row">
                <div class="col-lg-2 col-6">
                  <div class="small-box bg-info">
                    <div class="inner">
                    <h3><?= $transaksi->num_rows(); ?></h3>
                      <p>Transaksi</p>
                    </div>
                    <div class="icon">
                    </div>
                  </div>
                </div>

                <div class="col-lg-2 col-6">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3><?= $qty->total_qty; ?></h3>
                      <p>Total Qty</p>
                    </div>
                    <div class="icon">
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-12">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>Rp <?= rupiah($summary_total_value) ?> </h3>
                      <p>Total Value</p>
                    </div>
                    <div class="icon">
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-12">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>Rp <?= rupiah($summary_total_hpp) ?> </h3>
                      <p>Total HPP</p>
                    </div>
                    <div class="icon">
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-12">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>Rp <?= rupiah($summary_total_gross) ?> </h3>
                      <p>Gross Profit</p>
                    </div>
                    <div class="icon">
                    </div>
                  </div>
                </div>


                <div class="col-lg-4 col-6">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3><?= number_format($summary_average_persen, 2, '.', '') ?>%</h3>
                      <p>Persen</p>
                    </div>
                    <div class="icon">
                    </div>
                  </div>
                </div>


                <div class="col-lg-4 col-6">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3><?= $top_sales->sales; ?></h3>
                      <p>Top Sales</p>
                    </div>
                    <div class="icon">
                    </div>
                  </div>
                </div>
              </div>

              <table id="table1" class="table table-sm table-borderless" >
                <thead>
                  <tr class="text-center">
                    <th style="width: 5%">No</th>
                    <th>Tanggal Transaksi</th>
                    <th width="150px">Nama Customer</th>
                    <th width="150px">Brand</th>
                    <th width="150px">Kode Barang</th>
                    <th width="150px">Nama Barang</th>
                    <th width="150px">Harga / Unit</th>
                    <th>Qty</th>
                    <th width="150px">Value</th>
                    <th width="150px">HPP / unit</th>
                    <th width="150px">Total HPP</th>
                    <th width="150px">Total Gross Profit</th>
                    <th>Persen</th>
                    <th width="100px">Sales</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {


                    $this->db->select('sum(tb_import.value) / sum(tb_import.qty) hpp');
                    $this->db->from('tb_import');
                    $this->db->where('tb_import.id_barang',$row['id_barang']);
                    $hpp = $this->db->get()->result_array();

                    $persen = (($row['harga_jual']  - $hpp[0]['hpp']) /  $hpp[0]['hpp']) * 100;
                    $gross = $row['value'] - $hpp[0]['hpp'] * $row['qty'];
                    echo "<tr><td>$no</td>
                    <td> $row[tanggal_transaksi] </td>
                    <td> $row[nama_customer] </td>
                    <td> $row[brand] </td>
                    <td> $row[kode_barang] </td>
                    <td> $row[nama_barang] </td>
                    <td class='text-right'> Rp " . rupiah($row['harga_jual']) . "</td>
                    <td class='text-right'> " . rupiah($row['qty']) . "</td>
                    <td class='text-right'> Rp " . rupiah($row['value']) . "</td>
                    <td class='text-right'> Rp " . rupiah($hpp[0]['hpp']) . " </td>
                    <td class='text-right'> Rp " . rupiah($hpp[0]['hpp'] * $row['qty']) . " </td>
                    <td class='text-right'> Rp " . rupiah($gross) . "</td>
                    <td class='text-right'> " . number_format($persen, 2, '.', '') . "%</td>
                    <td> $row[sales] </td>
                    </tr>";

                    $total_value += $row['value'];
                    $total_hpp_satuan += $hpp[0]['hpp'];
                    $total_hpp += $hpp[0]['hpp']*$row['qty'];
                    $total_gross += $gross;
                    
                    $no++;
                  }
                  ?>
                </tbody>
                <tfoot>
                <td colspan="7"> </td>
                <td>Total</td>
                <td class='text-right'>Rp <?= rupiah($total_value) ?> </td>
                <td class='text-right'>Rp <?= rupiah($total_hpp_satuan) ?> </td>
                <td class='text-right'>Rp <?= rupiah($total_hpp) ?> </td>
                <td class='text-right'>Rp <?= rupiah($total_gross) ?> </td>
                <?php $average_persen = ($total_gross /  $total_hpp) * 100; ?>
                <td class='text-right'><?= number_format($average_persen, 2, '.', '') ?> %</td>
                <td> </td>
                </tfoot>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<script>
  function confirmation(ev) {
    ev.preventDefault();
    var data_id = ev.currentTarget.getAttribute('data-id');
    var currentLocation = window.location;
    Swal.fire({
      title: 'Konfirmasi Hapus Data',
      text: "Apakah Anda ingin menghapus data ini?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus',
      cancelButtonText: 'Batal',
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: site_url + 'admin/delete_simulasi/' + data_id,
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            Swal.fire({
              title: 'Dihapus!',
              text: 'Data berhasil dihapus',
              icon: 'success',
              showConfirmButton: false,
              timer: 1500
            }).then(() => {
              location.reload();
            })
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.debug(jqXHR);
            console.debug(textStatus);
            console.debug(errorThrown);
          },
        });
      }
    })
  }
</script>