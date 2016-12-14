<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Surat Bukti Sewa</title>
  </head>
  <body style="font-family: arial;"  onload="window.print()">
    <main>
      <div style="width: 47%; float: left; padding-left: 30px;">
        <?= $this->tag->image(['img/logo.jpg', 'alt' => 'logo', 'width' => '70px', 'height' => '80px', 'style' => 'padding:10px; float: left;']) ?>
        <p style="color: green; font-size: 14px;"><b>GALATAMA</b></p>
        <p style="font-size: 10px;  ">
          <b>Kantor :</b><br>
          Jl.Pandanaran No. 58(Loby Area Hotel Pandanaran Lt.1) Semarang-Jawa Tengah <br>
          Telp.(024)841-1414 Fax. (024)844-7989 <br>
          <b>Garasi :</b><br>
          Jl. Semarang-Mangkang(Karanganyar, Tugu) KM 12 No. 58 Semarang- Jawa Tengah <br>
          Telp/Fax. (024)866-3149
        </p>

        <h1 style="font-size: 15px; text-align: center;"><u><b>SURAT BUKTI SEWA</b></u></h1>
        <table border="0" style="font-size: 11px;" width="400">
          <tr>
            <td>Nama Pemesan</td>
            <td>:</td>
            <td colspan="3"><?= Phalcon\Text::upper($booking->nama) ?></td>
          </tr>
          <tr>
            <td>Nomor Telpon</td>
            <td>:</td>
            <td colspan="3"><?= Phalcon\Text::upper($booking->telpon) ?></td>
          </tr>
          <tr>
            <td>Tujuan</td>
            <td>:</td>
            <td colspan="3">
            <?php if ($booking->paket == 'regular') { ?>
              <?= Phalcon\Text::upper($booking->nama) ?>
            <?php } else { ?>
            <?php } ?>
            </td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td>Berangkat Tgl</td>
            <td>:</td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td>Jumlah Armada</td>
            <td>:</td>
            <td width="100">....................................Besar</td>
            <td width="100" align="right">Seat....................................</td>
            <td width="40"></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td width="100">....................................Medium</td>
            <td width="100" align="right">Seat....................................</td>
            <td width="40"></td>
          </tr>
          <tr>
            <td>Biaya Sewa</td>
            <td>:</td>
            <td colspan="3">Rp. .......................................................................................</td>
          </tr>
          <tr>
            <td>Uang Muka</td>
            <td>:</td>
            <td colspan="3">Rp. .......................................................................................</td>
          </tr>
          <tr>
            <td>Sisa</td>
            <td>:</td>
            <td colspan="3">Rp. .......................................................................................</td>
          </tr>
          <tr>
            <td>Alamat Penjemputan</td>
            <td>:</td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td>Jemput Jam</td>
            <td>:</td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="2"><p>Semarang, ...............................</p></td>
          </tr>
          <tr>
            <td colspan="2" align="center">Penyewa</td>
            <td></td>
            <td colspan="2" align="center">GALATAMA BUS PARIWISATA</td>
          </tr>
          <tr>
            <td height="45" colspan="5"></td>
          </tr>
          <tr>
            <td colspan="2" align="center">.................................</td>
            <td></td>
            <td colspan="2" align="center">.................................</td>
          </tr>
        </table>

        <p style="font-size: 11px;  ">NB:</p>
        <ul style="font-size: 11px;  ">
          <li>Pelunasan sewa bus paling lambat 3hari sebelum berangkat.</li>
          <li>Parkir/Tol/Retribusi/Dispensasi ditangung penyewa.</li>
          <li>Pembatalan sewa bus, PD/Uang Muka Hilang.</li>
          <li>Jumlah penumpang bus tidak melebihi kapasitas.</li>
          <li>Apabila ada kenaikan BBM, tarif sewa disesuaikan</li>
        </ul>
      </div>

      <!-- garis potong -->
      <div style="border-right:1px solid black; width:0; height:700px; float:left;margin:-20px 0 0 0;"></div>

      <div style="width: 47%; float: left; padding-left: 30px;">
        <?= $this->tag->image(['img/logo.jpg', 'alt' => 'logo', 'width' => '70px', 'height' => '80px', 'style' => 'padding:10px; float: left;']) ?>
        <p style="color: green; font-size: 14px;"><b>GALATAMA</b></p>
        <p style="font-size: 10px;  ">
          <b>Kantor :</b><br>
          Jl.Pandanaran No. 58(Loby Area Hotel Pandanaran Lt.1) Semarang-Jawa Tengah <br>
          Telp.(024)841-1414 Fax. (024)844-7989 <br>
          <b>Garasi :</b><br>
          Jl. Semarang-Mangkang(Karanganyar, Tugu) KM 12 No. 58 Semarang- Jawa Tengah <br>
          Telp/Fax. (024)866-3149
        </p>

        <h1 style="font-size: 15px; text-align: center;"><u><b>SURAT BUKTI SEWA</b></u></h1>
        <table border="0" style="font-size: 11px;  ">
          <tr>
            <td>Nama Pemesan</td>
            <td>:</td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td>Alamat/Telp</td>
            <td>:</td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td>Tujuan</td>
            <td>:</td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td>Berangkat Tgl</td>
            <td>:</td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td>Jumlah Armada</td>
            <td>:</td>
            <td width="100">....................................Besar</td>
            <td width="100" align="right">Seat....................................</td>
            <td width="40"></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td width="100">....................................Medium</td>
            <td width="100" align="right">Seat....................................</td>
            <td width="40"></td>
          </tr>
          <tr>
            <td>Biaya Sewa</td>
            <td>:</td>
            <td colspan="3">Rp. .......................................................................................</td>
          </tr>
          <tr>
            <td>Uang Muka</td>
            <td>:</td>
            <td colspan="3">Rp. .......................................................................................</td>
          </tr>
          <tr>
            <td>Sisa</td>
            <td>:</td>
            <td colspan="3">Rp. .......................................................................................</td>
          </tr>
          <tr>
            <td>Alamat Penjemputan</td>
            <td>:</td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td>Jemput Jam</td>
            <td>:</td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td colspan="3">..............................................................................................</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="2"><p>Semarang, ...............................</p></td>
          </tr>
          <tr>
            <td colspan="2" align="center">Penyewa</td>
            <td></td>
            <td colspan="2" align="center">GALATAMA BUS PARIWISATA</td>
          </tr>
          <tr>
            <td height="45" colspan="5"></td>
          </tr>
          <tr>
            <td colspan="2" align="center">.................................</td>
            <td></td>
            <td colspan="2" align="center">.................................</td>
          </tr>
        </table>

        <p style="font-size: 11px;  ">NB:</p>
        <ul style="font-size: 11px;  ">
          <li>Pelunasan sewa bus paling lambat 3hari sebelum berangkat.</li>
          <li>Parkir/Tol/Retribusi/Dispensasi ditangung penyewa.</li>
          <li>Pembatalan sewa bus, PD/Uang Muka Hilang.</li>
          <li>Jumlah penumpang bus tidak melebihi kapasitas.</li>
          <li>Apabila ada kenaikan BBM, tarif sewa disesuaikan</li>
        </ul>
      </div>
    </main>
<script type="text/javascript">
if(navigator.userAgent.toLowerCase().indexOf('chrome') > -1){   // Chrome Browser Detected?
    window.PPClose = false;                                     // Clear Close Flag
    window.onbeforeunload = function(){                         // Before Window Close Event
        if(window.PPClose === false){                           // Close not OK?
            return 'Leaving this page will block the parent window!\nPlease select "Stay on this Page option" and use the\nCancel button instead to close the Print Preview Window.\n';
        }
    }                   
    window.print();                                             // Print preview
    window.PPClose = true;                                      // Set Close Flag to OK.
}
</script>
  </body>
</html>
