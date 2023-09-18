<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Simulasi</h3>
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <table id="table1" class="table table-sm table-borderless" style="width:100%">
                    <thead>
                      <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 25%">Kode</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>HPP</th>
                        <th style="width: 10%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($record as $row) {
                        echo "<tr><td>$no</td>
                              <td>$row[kode_barang]</td>
                              <td>$row[nama_barang]</td>
                              <td>$row[sum_qty]</td>
                              <td>Rp " . rupiah($row['hpp']) . "</td>
                              <td>
                                <button class='btn btn-info btn-xs' title='Simulasi' data-id='$row[id_barang]' data-nama='$row[nama_barang]' data-kode='$row[kode_barang]' data-hpp='$row[hpp]' onclick=\"simulate(event)\"><i class='fas fa-calculator fa-fw'></i> Simulasi</button>
                              </td>
                          </tr>";
                        $no++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="row mt-3" id="simulasi" style="display:none;">

                <div class="col-lg-12 col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="col-lg-12 col-12">
                        <h4> Simulasi </h4>
                        <form action="<?= base_url('admin/tambah_simulasi') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                          <input type='hidden' class='form-control' name='id_barang' value="<?= rupiah($summary[0]['id_barang']) ?>" required>

                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-6">
                              <input type='text' class='form-control' id='nama_barang' readonly>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">HPP</label>
                            <div class="col-sm-6">
                              <input type='text' class='form-control' id='hpp' readonly>
                              <input type='hidden' class='form-control' id='val_hpp' readonly>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Harga Jual</label>
                            <div class="col-sm-6">
                              <input type='text' class='form-control money' id='harga_jual' onkeyup="autofill();" required>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Unit</label>
                            <div class="col-sm-6">
                              <input type='number' class='form-control' id='unit' onkeyup="autofill();" required>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Persen</label>
                            <div class="col-sm-6">
                              <input type='text' class='form-control' id='persen' readonly>
                            </div>
                          </div>


                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gross Profit</label>
                            <div class="col-sm-6">
                              <input type='text' class='form-control' id='gross' readonly>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<script>
  $('.money').maskMoney({
    allowZero: true,
    allowNegative: true,
    thousands: '.',
    decimal: ',',
    precision: 0
  });

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

  function autofill() {
    var hpp = document.getElementById('val_hpp').value;
    var harga_jual = document.getElementById('harga_jual').value;
    var unit = document.getElementById('unit').value;
    var harga_jual = replaceAllDots(harga_jual);


    var gross = harga_jual / unit - hpp;

    var persen = (((harga_jual / unit) - hpp) / hpp) * 100;

    document.getElementById('persen').value = 1;

    if (unit != '' && harga_jual != '') {
      document.getElementById('gross').value = formatRupiah(gross);
      document.getElementById('persen').value = parseFloat(persen).toFixed(2) + '%';

    }
  }

  function replaceAllDots(string) {
    var regex = /\./g; // Ekspresi reguler untuk mencocokkan semua titik dalam string
    var replacement = ""; // Teks pengganti, dalam kasus ini kosong untuk menghapus titik

    var modifiedString = string.replace(regex, replacement);
    return modifiedString;
  }


  function simulate(ev) {
    var data_id = ev.currentTarget.getAttribute('data-id');
    var data_nama = ev.currentTarget.getAttribute('data-nama');
    var data_kode = ev.currentTarget.getAttribute('data-kode');
    var data_hpp = ev.currentTarget.getAttribute('data-hpp');

    var element = document.getElementById("simulasi");
    element.style.display = "block";

    set_nama_barang = document.getElementById('nama_barang')
    set_nama_barang.value = data_nama;


    set_data_hpp = document.getElementById('hpp')
    set_data_hpp.value = formatRupiah(data_hpp);
    document.getElementById('val_hpp').value = data_hpp

  }

  function formatRupiah(number) {
    var strNumber = number.toString(); // Mengubah angka menjadi string
    var splitNumber = strNumber.split("."); // Memisahkan angka menjadi bagian sebelum dan setelah desimal
    var integerPart = splitNumber[0]; // Bagian angka sebelum desimal
    var decimalPart = splitNumber[1] || ""; // Bagian angka setelah desimal (jika ada), atau string kosong jika tidak ada

    var formattedNumber = "";
    var count = 0;

    // Mengolah bagian angka sebelum desimal
    for (var i = integerPart.length - 1; i >= 0; i--) {
      formattedNumber = integerPart[i] + formattedNumber;
      count++;

      if (count % 3 === 0 && i !== 0) {
        formattedNumber = "." + formattedNumber; // Menambahkan titik setiap 3 digit
      }
    }

    // Menggabungkan bagian angka sebelum desimal dan setelah desimal
    if (decimalPart !== "") {
      formattedNumber += "," + decimalPart;
    }

    return "Rp " + formattedNumber;
  }

  $('.decimal').keyup(function() {
    var val = $(this).val();
    if (isNaN(val)) {
      val = val.replace(/[^0-9\.\-]/g, '');
      if (val.split('.').length > 2)
        val = val.replace(/\.+$/, "");
    }
    $(this).val(val);
  });
</script>