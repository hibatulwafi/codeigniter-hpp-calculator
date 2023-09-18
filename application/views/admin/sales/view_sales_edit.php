<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ubah Transaksi</h3>
            </div>

            <div class="card-body">
              <form action="<?= base_url('admin/edit_sales') ?>" method="post" enctype="multipart/form-data">

                <input type='hidden' name='id' value='<?= $rows['id_sales'] ?>'>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Barang</label>
                  <div class="col-sm-6">
                    <select name='id_barang' class='form-control' required>
                      <option value='' selected>- Pilih Barang -</option>
                      <?php
                      foreach ($barang as $rowz) {
                        if ($rows['id_barang'] == $rowz['id_barang']) {
                          echo "<option value='$rowz[id_barang]' selected>$rowz[nama_barang]</option>";
                        } else {
                          echo "<option value='$rowz[id_barang]'>$rowz[nama_barang]</option>";
                        }
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Customer</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='nama_customer' value="<?= $rows['nama_customer'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Harga Jual</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='harga_jual' id="harga_jual" value="<?= $rows['harga_jual'] ?>" onkeyup="autofill();" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">QTY</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='qty' id="qty" value="<?= $rows['qty'] ?>" onkeyup="autofill();" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Value</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='value' id="value" value="<?= $rows['value'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                  <div class="col-sm-6">
                    <input type='date' class='form-control' name='tanggal_transaksi' value="<?= $rows['tanggal_transaksi'] ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sales</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='sales' value="<?= $rows['sales'] ?>" required>
                  </div>
                </div>



                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Perbarui</button>
                    <a href='<?= base_url('admin/sales') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
                  </div>
                </div>

              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<script>
  function autofill() {
    var harga_jual = document.getElementById('harga_jual').value;
    var qty = document.getElementById('qty').value;
    document.getElementById('value').value = harga_jual * qty;
  }
</script>