<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Simulasi</h3>
              <!-- <a class='float-right btn btn-primary btn-sm' href='<?= base_url('admin/tambah_simulasi'); ?>'>Tambah import</a> -->
            </div>

            <div class="card-body">
              <div class="row">

                <div class="col-lg-7 col-8">
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

                <div class="col-lg-3 col-12">
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
              </div>

              <div class="row">
                <div class="col-lg-12 col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="col-lg-12 col-12">
                        <h4> Simulasi </h4>
                        <form action="<?= base_url('admin/tambah_simulasi') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                          <input type='hidden' class='form-control' name='id_barang' value="<?= rupiah($summary[0]['id_barang']) ?>" required>

                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Harga Jual</label>
                            <div class="col-sm-6">
                              <input type='number' class='form-control' name='harga_jual' required>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Unit</label>
                            <div class="col-sm-6">
                              <input type='number' class='form-control' name='unit' required>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                              <button type='submit' name='submit' class='btn btn-primary btn-sm'>Simpan</button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <table id="table1" class="table table-sm table-borderless" style="width:100%">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th>Harga Jual</th>
                    <th>Unit</th>
                    <th>Persen</th>
                    <th>Profit</th>
                    <th style="width: 10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {
                    $persen = (($row['harga_jual']  - $summary[0]['hpp']) /  $summary[0]['hpp']) * 100;

                    echo "<tr><td>$no</td>
                    <td> Rp " . rupiah($row['harga_jual']) . "</td>
                    <td> $row[unit] </td>
                    <td> " . number_format($persen, 2, '.', '') . "%</td>
                    <td> Rp " . rupiah($row['harga_jual'] - $summary[0]['hpp']) . "</td>
                    <td>
                    <button class='btn btn-danger btn-xs' title='Hapus' data-id='$row[id_simulasi]' onclick=\"confirmation(event)\"><i class='fas fa-times fa-fw'></i></button>
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