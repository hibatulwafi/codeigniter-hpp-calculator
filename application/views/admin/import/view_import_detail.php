<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Import Admin</h3>
              <a class='float-right btn btn-primary btn-sm' href='<?= base_url('admin/tambah_import'); ?>'>Tambah import</a>
            </div>

            <div class="card-body">
              <div class="row">

                <div class="col-lg-4 col-8">
                  <div class="small-box">
                    <div class="inner">
                      <h3><?= $summary[0]['nama_barang'] ?></h3>
                      <p><?= $summary[0]['kode_barang'] ?></p>
                    </div>
                  </div>
                </div>

                <div class="col-lg-2 col-4">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3><?= rupiah($summary[0]['sum_qty']) ?></h3>
                      <p>Stok</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-6">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>Rp <?= rupiah($summary[0]['hpp']) ?></h3>
                      <p>HPP Rata - Rata</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-6">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>Rp <?= rupiah($summary[0]['sum_value']) ?></h3>
                      <p>Value</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                  </div>
                </div>
              </div>
              <table id="table1" class="table table-sm table-borderless" style="width:100%">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 25%">Tanggal Input</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Value</th>
                    <th style="width: 10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {
                    echo "<tr><td>$no</td>
                    <td>$row[tanggal_input]</td>
                    <td>$row[kode_barang]</td>
                    <td>$row[nama_barang]</td>
                    <td>" . rupiah($row['qty']) . "</td>
                    <td>Rp " . rupiah($row['value']) . "</td>
                    <td>
                    <a class='btn btn-success btn-xs' title='Ubah' href='" . base_url() . "admin/edit_import/$row[id_import]'><i class='fas fa-edit fa-fw'></i></a>
                    <button class='btn btn-danger btn-xs' title='Hapus' data-id='$row[id_import]' onclick=\"confirmation(event)\"><i class='fas fa-times fa-fw'></i></button>
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
          url: site_url + 'admin/delete_import/' + data_id,
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