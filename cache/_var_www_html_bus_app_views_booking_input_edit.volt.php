<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_usergroup">Input Booking</h4>
      </div>

      <form name="booking" action="<?= $this->url->get('Booking/input') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="row">

            <!-- left -->
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <div class="input-group date">
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_booking" id="tanggal_booking" class="form-control" placeholder="Tanggal Booking">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <input type="text" name="nama" class="form-control" placeholder="Nama"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" name="telpon" data-telp class="form-control" placeholder="Nomor Telpon"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_start" id="tanggal_start" class="form-control" placeholder="Tanggal Mulai"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_back" id="tanggal_back" class="form-control" placeholder="Tanggal Kembali"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="tarif" data-tarif class="form-control" placeholder="Tarif"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="dp" data-dp class="form-control" placeholder="DP / Uang Muka"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-credit-card"></i>
                  </span>
                  <select name="pembayaran" class="form-control">
                    <?= $this->Helpers->tagSetting('pembayaran', 'Methode Pembayaran', '') ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <select name="driver" class="form-control">
                    <option value="">Pilih Driver</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- right -->
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-cubes"></i>
                  </span>
                  <select name="paket" class="form-control" onclick="pakett(this)">
                    <?= $this->Helpers->tagSetting('paket', 'Pilih Paket', '') ?>
                  </select>
                </div>
              </div>

              <div class="collapse" id="regular">
                <div class="form-group">
                  <div class="input-group" >
                    <span class="input-group-addon">
                      <i class="fa fa-map"></i>
                    </span>
                    <select name="area" class="form-control" onclick="areaa(this)">
                      <?= $this->Helpers->tagSetting('area', 'Pilih Area', '') ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group" >
                    <span class="input-group-addon">
                      <i class="fa fa-map-o"></i>
                    </span>
                    <select name="route" class="form-control" onclick="routee(this)">
                      <option value="">Pilih Route</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group" >
                    <span class="input-group-addon">
                      <i class="fa fa-map-marker"></i>
                    </span>
                    <select name="lokasi" class="form-control">
                      <option value="">Pilih Lokasi</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="collapse" id="jiarah">
                <div class="form-group">
                  <div class="input-group" >
                    <span class="input-group-addon">
                      <i class="fa fa-map-marker"></i>
                    </span>
                    <select name="location" class="form-control">
                      <option value="">Pilih Route Jiarah</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-map-pin"></i>
                  </span>
                  <input type="text" name="lokasi_jemput" class="form-control" placeholder="Lokasi Penjemputan"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-road"></i>
                  </span>
                  <input type="number" name="jarak_jemput" class="form-control" placeholder="Jarak Penjemputan"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-bus"></i>
                  </span>
                  <select name="type_bus" class="form-control" onclick="typee_bus(this)">
                    <?= $this->Helpers->tagSetting('type_bus', 'Pilih Type Bus', '') ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-bus"></i>
                  </span>
                  <select name="bus" class="form-control">
                    <option value="">Pilih Bus</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <select name="co_driver" class="form-control">
                    <option value="">Pilih Co. Driver</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <textarea name="note" rows="3" class="form-control" placeholder="Catatan ...."></textarea>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>