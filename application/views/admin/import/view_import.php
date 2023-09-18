<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Import Admin</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?= base_url('admin/tambah_import'); ?>'>Tambah import</a>
            </div>

            <div class="card-body">
              <table id="table1" class="table table-sm table-borderless" style="width:100%">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 25%">Kode Barang</th>
                    <th>Brand</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Value</th>
                    <th>Average HPP</th>
                    <th style="width: 10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {
                    echo "<tr><td>$no</td>
                    <td>$row[kode_barang]</td>
                    <td>$row[brand]</td>
                    <td>$row[nama_barang]</td>
                    <td>$row[sum_qty]</td>
                    <td>Rp" .  rupiah($row['sum_value']) . "</td>
                    <td>Rp" .  rupiah($row['hpp']) . "</td>
                    <td>
                      <a class='btn btn-success btn-xs' title='Detail' href='" . base_url() . "admin/detail_import/$row[id_barang]'><i class='fas fa-list fa-fw'></i></a>
                    </td>
                    </tr>";
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>