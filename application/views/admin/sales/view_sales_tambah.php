<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Transaksi</h3>
            </div>

            <form action="<?= base_url('admin/tambah_sales') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">

              <div class="card-body">

                <input type='hidden' name='id' value=''>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Barang</label>
                  <div class="col-sm-6">
                    <select name='id_barang' class='form-control select2' onchange="getData(this.value)" required>
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
                  <label class="col-sm-2 col-form-label">Nama Customer</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='nama_customer' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Harga Jual</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='harga_jual' id="harga_jual" onkeyup="autofill();" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">QTY</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='qty' id="qty" onkeyup="autofill();" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Value</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='value' id="value" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                  <div class="col-sm-6">
                    <input type='date' class='form-control' name='tanggal_transaksi' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Sales</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='sales' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Simpan</button>
                    <a href='<?= base_url('admin/sales') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
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

<script>
  function autofill() {
    var harga_jual = document.getElementById('harga_jual').value;
    var qty = document.getElementById('qty').value;
    document.getElementById('value').value = harga_jual * qty;
  }

  function getData(id) {
    $.ajax({
      url: site_url + 'admin/cek_stok/' + id,
      type: "POST",
      dataType: "JSON",
      success: function(data) {
       console.log(data);
       var inputElement = document.getElementById("qty"); // Mendapatkan elemen input
       inputElement.max = data.status;
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.debug(jqXHR);
        console.debug(textStatus);
        console.debug(errorThrown);
      },
    });
  }
</script>