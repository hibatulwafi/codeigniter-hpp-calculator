<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Import</h3>
            </div>

            <form action="<?= base_url('admin/tambah_import') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">

              <div class="card-body">

                <input type='hidden' name='id' value=''>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Barang</label>
                  <div class="col-sm-6">
                    <select name='id_barang' class='form-control select2' required>
                      <option value='' selected>- Pilih Barang -</option>
                      <?php
                      var_dump($barang);
                      foreach ($barang as $row) {
                        echo "<option value='$row[id_barang]'>$row[kode_barang] - $row[nama_barang]</option>";
                      } ?>
                    </select>
                  </div>
                </div>



                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">QTY</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='qty' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Value</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='value' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Input</label>
                  <div class="col-sm-6">
                    <input type='date' class='form-control' name='tanggal_input' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Simpan</button>
                    <a href='<?= base_url('admin/import') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
                  </div>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>