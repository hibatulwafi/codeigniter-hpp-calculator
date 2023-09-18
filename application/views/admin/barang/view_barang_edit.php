<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ubah Data</h3>
            </div>

            <div class="card-body">
              <form action="<?= base_url('admin/edit_barang') ?>" method="post" enctype="multipart/form-data">

                <input type='hidden' name='id' value='<?= $rows['id_barang'] ?>'>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kode Barang</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='kode_barang' value='<?= $rows['kode_barang'] ?>' required></td>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Brand</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='brand' value='<?= $rows['brand'] ?>' required></td>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Barang</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='nama_barang' value='<?= $rows['nama_barang'] ?>' required></td>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Perbarui</button>
                    <a href='<?= base_url('admin/barang') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
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