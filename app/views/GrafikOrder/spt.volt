<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Surat Perintah Jalan</title>
  </head>
  <body style="font-family:arial;" onload="windows:print()">
    <div>
      <table border="0"  width="100%" style="margin-top:-20px;">
        <!-- header halaman -->
        <tr>
          <td colspan="6" height="60">
            <div style="margin : auto; margin-top:0; left:0; right:0; top:0; bottom:0; width:260px; height:80px;">
              {{ image('img/logo.jpg', 'alt':'logo', 'width':'55px', 'height':'60px', 'style':'padding:5px; float: left;') }}
              <div style="font-size:32px; margin:10px -10px -5px 0px; float:left;"><b>GALATAMA</b></div>
              <div style="font-size:21px; padding-left:10px; margin:-10px -15px -5px 0px;"><b>BUS PARIWISATA</b></div>
            </div>
          </td>
        </tr>
        <!-- judul -->
        <tr>
          <td colspan="6" style="text-align:center; font-size:20px;"><u><b>SURAT PERINTAH JALAN<br><br></b></u></td>
        </tr><br>
        <!-- isian -->
        <tr>
          <td width="18%"></td>
          <td width="25%">Berangkat, hari/tgl/jam</td>
          <td>:</td>
          <td colspan="3">{{ Prints.tanggakHari(invoice.tanggal_mulai) }}</td>
        </tr>
        <tr>
          <td width="18%"></td>
          <td width="25%">Kembali, hari/tgl.</td>
          <td>:</td>
          <td colspan="3">{{ Prints.tanggakHari(invoice.tanggal_kembali) }}</td>
        </tr>
        <tr>
          <td width="18%" valign="top"></td>
          <td width="25%" valign="top">Tujuan Wisata</td>
          <td valign="top">:</td>
          <td colspan="3">{{ Prints.TujuanRegular(invoice.route, invoice.lokasi) }}</td>
        </tr>
        <tr>
          <td width="18%"></td>
          <td width="25%">Nama Penyewa</td>
          <td>:</td>
          <td colspan="3">{{ invoice.nama|upper }}</td>
        </tr>
        <tr>
          <td width="18%"></td>
          <td width="25%">Driver</td>
          <td>:</td>
          <td colspan="3">{{ Prints.Driver(invoice.driver, 'driver')|upper }}</td>
        </tr>
        <tr>
          <td width="18%"></td>
          <td width="25%">Co. Driver</td>
          <td>:</td>
          <td colspan="3">{{ Prints.Driver(invoice.co_driver, 'coDriver')|upper }}</td>
        </tr>
      </table>
      <!-- tabel bawah -->
      <br>
      <table border="1" style="border-collapse:collapse; border:1px black solid" width="100%">
        <tr height="38">
          <th style="padding:10px;" width="2%">NO</th>
          <th style="padding:10px;" width="30%">URAIAN</th>
          <th style="padding:10px;" width="12%">SAT</th>
          <th style="padding:10px;" width="20%">HARGA SATUAN</th>
          <th style="padding:10px;" width="19%">JUMLAH</th>
          <th style="padding:10px;" width="17%">KETERANGAN</th>
        </tr>
        {% set no = 1 %}
        {% set jumlah = 0 %}
        {% for x in Prints.Cost(invoice.kode) %}
        <tr height="38">
          <td style="padding:10px;">{{ no }}.</td>
          <td style="padding:10px;">{{ x.cost }}</td>
          <td style="padding:10px;">{{ x.satuan }} {{ x.persen }}</td>
          <td style="padding:10px;">{{ Helpers.number(x.harga_satuan) }}</td>
          <td style="padding:10px;">{{ Helpers.number(x.jumlah) }}</td>
          <td></td>
        </tr>
        {% set jumlah = jumlah + x.jumlah %}
        {% set no = no + 1 %}
        {% endfor %}
        <tr height="38">
          <td style="padding:10px;" colspan="4">TOTAL</td>
          <td style="padding:10px;">{{ Helpers.number(jumlah) }}</td>
          <td></td>
        </tr>
      </table>
    </div>
    <!-- garis potong -->
    <br>
    <div style="border-top:1px solid black; margin: 0 -10px 0 -10px;"></div>
    <br>
    <div>
      <table border="0"  width="100%" style="margin-top:-20px;">
        <!-- header halaman -->
        <tr>
          <td colspan="6" height="60">
            <div style="margin : auto; margin-top:0; left:0; right:0; top:0; bottom:0; width:260px; height:80px;">
              {{ image('img/logo.jpg', 'alt':'logo', 'width':'55px', 'height':'60px', 'style':'padding:5px; float: left;') }}
              <div style="font-size:32px; margin:10px -10px -5px 0px; float:left;"><b>GALATAMA</b></div>
              <div style="font-size:21px; padding-left:10px; margin:-10px -15px -5px 0px;"><b>BUS PARIWISATA</b></div>
            </div>
          </td>
        </tr>
        <!-- judul -->
        <tr>
          <td colspan="6" style="text-align:center; font-size:20px;"><u><b>SURAT PERINTAH JALAN<br><br></b></u></td>
        </tr><br>
        <!-- isian -->
        <tr>
          <td width="18%"></td>
          <td width="25%">Berangkat, hari/tgl/jam</td>
          <td>:</td>
          <td colspan="3">{{ Prints.tanggakHari(invoice.tanggal_mulai) }}</td>
        </tr>
        <tr>
          <td width="18%"></td>
          <td width="25%">Kembali, hari/tgl.</td>
          <td>:</td>
          <td colspan="3">{{ Prints.tanggakHari(invoice.tanggal_kembali) }}</td>
        </tr>
        <tr>
          <td width="18%" valign="top"></td>
          <td width="25%" valign="top">Tujuan Wisata</td>
          <td valign="top">:</td>
          <td colspan="3">{{ Prints.TujuanRegular(invoice.route, invoice.lokasi) }}</td>
        </tr>
        <tr>
          <td width="18%"></td>
          <td width="25%">Nama Penyewa</td>
          <td>:</td>
          <td colspan="3">{{ invoice.nama|upper }}</td>
        </tr>
        <tr>
          <td width="18%"></td>
          <td width="25%">Driver</td>
          <td>:</td>
          <td colspan="3">{{ Prints.Driver(invoice.driver, 'driver')|upper }}</td>
        </tr>
        <tr>
          <td width="18%"></td>
          <td width="25%">Co. Driver</td>
          <td>:</td>
          <td colspan="3">{{ Prints.Driver(invoice.co_driver, 'coDriver')|upper }}</td>
        </tr>
      </table>
      <!-- tabel bawah -->
      <br>
      <table border="1" style="border-collapse:collapse; border:1px black solid" width="100%">
        <tr height="38">
          <th style="padding:10px;" width="2%">NO</th>
          <th style="padding:10px;" width="30%">URAIAN</th>
          <th style="padding:10px;" width="12%">SAT</th>
          <th style="padding:10px;" width="20%">HARGA SATUAN</th>
          <th style="padding:10px;" width="19%">JUMLAH</th>
          <th style="padding:10px;" width="17%">KETERANGAN</th>
        </tr>
        {% set no = 1 %}
        {% set jumlah = 0 %}
        {% for x in Prints.Cost(invoice.kode) %}
        <tr height="38">
          <td style="padding:10px;">{{ no }}.</td>
          <td style="padding:10px;">{{ x.cost }}</td>
          <td style="padding:10px;">{{ x.satuan }} {{ x.persen }}</td>
          <td style="padding:10px;">{{ Helpers.number(x.harga_satuan) }}</td>
          <td style="padding:10px;">{{ Helpers.number(x.jumlah) }}</td>
          <td></td>
        </tr>
        {% set jumlah = jumlah + x.jumlah %}
        {% set no = no + 1 %}
        {% endfor %}
        <tr height="38">
          <td style="padding:10px;" colspan="4">TOTAL</td>
          <td style="padding:10px;">{{ Helpers.number(jumlah) }}</td>
          <td></td>
        </tr>
      </table>
    </div>
    <p><br><br><br></p>
    <div style="font-size: 12px;">
      <table border="0" width="100%">
        <!-- logo header -->
        <tr height="20">
          <td colspan="5">
            <div style="margin :0; left:0; right:0; top:0; bottom:0; width:230px; height:80px;">
              {{ image('img/logo.jpg', 'alt':'logo', 'width':'55px', 'height':'60px', 'style':'float: left;') }}
              <div style="font-size:30px; margin:5px -10px -5px 0px; float:left;"><b>GALATAMA</b></div>
              <div style="font-size:19px; padding-left:10px; margin:-10px -15px -5px 0px;"><b>BUS PARIWISATA</b></div>
            </div>
          </td>
        </tr>
        <!-- header -->
        <tr>
          <td colspan="5" style="text-align:center; width:100%; font-size:20px"><b><u>SURAT TUGAS</u><div style="margin-left:-100px; font-size:19px;">No.:</div></b></td>
        </tr>
        <!-- isian data -->
        {% set s = Helpers.setting('spt') %}
        <tr>
          <td colspan="5">Yang bertanda tangan di bawah ini :</td>
        </tr>
        <tr height="30">
          <td width="3%"></td>
          <td>Nama</td>
          <td>:</td>
          <td colspan="2">{{ s.nama }}</td>
        </tr>
        <tr height="30">
          <td></td>
          <td>Jabatan</td>
          <td>:</td>
          <td colspan="2">{{ s.jabatan }}</td>
        </tr>
        <tr height="30">
          <td></td>
          <td>Alamat</td>
          <td>:</td>
          <td colspan="2">{{ s.alamat }}</td>
        </tr>

        <tr>
          <td colspan="5"><br>Dengan ini memberikan tugas kepada :</td>
        </tr>
        <tr>
          <td></td>
          <td>Nama Driver</td>
          <td>:</td>
          <td colspan="2"> {{ Prints.Driver(invoice.driver, 'driver')|upper }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Nama Co. Driver</td>
          <td>:</td>
          <td colspan="2">{{ Prints.Driver(invoice.co_driver, 'coDriver')|upper }}</td>
        </tr>
        <tr>
          <td></td>
          <td>No. Pol</td>
          <td>:</td>
          <td colspan="2">{{ Prints.Bus(invoice.bus).nomor_polisi }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Jenis Bus</td>
          <td>:</td>
          <td colspan="2">{{ Prints.Bus(invoice.bus).ukuran }}</td>
        </tr>

        <tr>
          <td colspan="5"><br>Untuk Menjalankan Tugas Wisata sebagai berikut :</td>
        </tr>
        <tr>
          <td></td>
          <td>Nama Penyewa</td>
          <td>:</td>
          <td colspan="2">{{ invoice.nama }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Alamat / No. Telp</td>
          <td>:</td>
          <td colspan="2">{{ invoice.telpon }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Berangkan, hari/tgl/jam</td>
          <td>:</td>
          <td colspan="2">{{ Prints.tanggakHari(invoice.tanggal_mulai) }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Pulang, hari/tgl.</td>
          <td>:</td>
          <td colspan="2">{{ Prints.tanggakHari(invoice.tanggal_kembali) }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Alamat Penjemputan</td>
          <td>:</td>
          <td colspan="2">{{ invoice.lokasi_jemput }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Tujuan Wisata</td>
          <td>:</td>
          <td colspan="2">{{ Prints.TujuanRegular(invoice.route, invoice.lokasi) }}</td>
        </tr>

        <tr>
          <td colspan="5"><br>Demikian Surat Tugas ini dibuat untuk dapan dipergunakan sebagai mana mestinya.<br><br></td>
        </tr>

        <tr>
          <td colspan="3"></td>
          <td width="30%"></td>
          <td width="40%">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Semarang, {{ date('d F Y') }}</td>
        </tr>

        <tr>
          <td colspan="3" align="center">Yang diberi tugas</td>
          <td width="30%"></td>
          <td width="40%" align="center">GALATAMA BUS PARIWISATA</td>
        </tr>
        <tr>
          <td colspan="5" height="50"></td>
        </tr>
        <tr>
          <td colspan="3" align="center">
            <table>
              <tr>
              <td>(</td>
              <td>
                <div style="border-bottom:1px solid black; width:150px; height:16px;" align="center">
                  {{ Prints.Driver(invoice.driver, 'driver')|upper }}
                </div>
              </td>
              <td>)</td>
              </tr>
            </table>
          </td>
          <td width="40%"></td>
          <td width="30%" align="center"><table><tr><td>(</td><td><div style="border-bottom:1px solid black; width:AUTO; height:16px;">DADANG GUMILANG</div></td><td>)</td></tr></table></td>
        </tr>
        <tr>
          <td colspan="5"><br>Catatan:</td>
        </tr>
      </table>


      <table border="1" width="100%" style="border-collapse:collapse;">
        <tr>
          <th width="3%">NO</th>
          <th width="37%">URAIAN</th>
          <th width="30%">AWAL</th>
          <th width="30%">AKHIR</th>
        </tr>
        <tr>
          <td>1.</td>
          <td>Kondisi Bus</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>2.</td>
          <td>Stand Kilometer</td>
          <td></td>
          <td></td>
        </tr>
        <tr height="40">
          <td>3.</td>
          <td>Stand BBM</td>
          <td><table align="center"><tr><td>E</td><td><div style="border-bottom:1px solid black; width:150px; height:16px;"></div></td><td>F</td></tr></table></td>
          <td><table align="center"><tr><td>E</td><td><div style="border-bottom:1px solid black; width:150px; height:16px;"></div></td><td>F</td></tr></table></td>
        </tr>
      </table>
      <br>
      <!-- Tanda tangan -->
      <table width="100%" style="text-align:center;">
        <tr>
          <td>Pengemudi/Penanggung Jawab</td>
          <td>Petugas Garasi/Bengkel</td>
        </tr>
        <tr>
          <td colspan="2" height="50"></td>
        </tr>
        <tr align="center">
          <td><table><tr><td>(</td><td><div style="border-bottom:1px solid black; width:150px; height:16px;"></div></td><td>)</td></tr></table></td>
          <td><table><tr><td>(</td><td><div style="border-bottom:1px solid black; height:16px;">ZAMRONI</div></td><td>)</td></tr></table></td>
        </tr>
        <tr>
          <td height="15px"></td>
        </tr>
        <tr>
          <td style="text-align:right;padding-right:15px;font-size:9px;">KANTOR:
            <br>Jl.Pandanaran No. 58 (Lobby Area Pandanaran Lt. 1)
            <br>Semarang - Jawa Tengah
            <br>Telp.(024) 841-1414 Fax.(024) 844-7989</td>
          <td style="text-align:left;padding-left:15px;font-size:9px;">GARASI:
            <br>Jl. Semarang - Mangkang (Karangayar, Tugu) KM 12 No.58
            <br>Semarang - Jawa Tengah
            <br>Telp/Fax. (024) 866-3149</td>
        </tr>
      </table>
      <div style="border-top:5px solid black;margin-bottom:-9px;" width="100%" ></div><br>
      <div style="border-top:3px solid black;" width="100%" ></div>
    </div>

    <br><br><br><br>

    <div style="font-size: 12px;">
      <table border="0" width="100%">
        <!-- logo header -->
        <tr height="20">
          <td colspan="5">
            <div style="margin :0; left:0; right:0; top:0; bottom:0; width:230px; height:80px;">
              {{ image('img/logo.jpg', 'alt':'logo', 'width':'55px', 'height':'60px', 'style':'float: left;') }}
              <div style="font-size:30px; margin:5px -10px -5px 0px; float:left;"><b>GALATAMA</b></div>
              <div style="font-size:19px; padding-left:10px; margin:-10px -15px -5px 0px;"><b>BUS PARIWISATA</b></div>
            </div>
          </td>
        </tr>
        <!-- header -->
        <tr>
          <td colspan="5" style="text-align:center; width:100%; font-size:20px"><b><u>SURAT TUGAS</u><div style="margin-left:-100px; font-size:19px;">No.:</div></b></td>
        </tr>
        <!-- isian data -->
        <tr>
          <td colspan="5">Yang bertanda tangan di bawah ini :</td>
        </tr>
        <tr height="30">
          <td width="3%"></td>
          <td>Nama</td>
          <td>:</td>
          <td colspan="2">{{ s.nama }}</td>
        </tr>
        <tr height="30">
          <td></td>
          <td>Jabatan</td>
          <td>:</td>
          <td colspan="2">{{ s.jabatan }}</td>
        </tr>
        <tr height="30">
          <td></td>
          <td>Alamat</td>
          <td>:</td>
          <td colspan="2">{{ s.alamat }}</td>
        </tr>

        <tr>
          <td colspan="5"><br>Dengan ini memberikan tugas kepada :</td>
        </tr>
        <tr>
          <td></td>
          <td>Nama Driver</td>
          <td>:</td>
          <td colspan="2"> {{ Prints.Driver(invoice.driver, 'driver')|upper }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Nama Co. Driver</td>
          <td>:</td>
          <td colspan="2">{{ Prints.Driver(invoice.co_driver, 'coDriver')|upper }}</td>
        </tr>
        <tr>
          <td></td>
          <td>No. Pol</td>
          <td>:</td>
          <td colspan="2">{{ Prints.Bus(invoice.bus).nomor_polisi }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Jenis Bus</td>
          <td>:</td>
          <td colspan="2">{{ Prints.Bus(invoice.bus).ukuran }}</td>
        </tr>

        <tr>
          <td colspan="5"><br>Untuk Menjalankan Tugas Wisata sebagai berikut :</td>
        </tr>
        <tr>
          <td></td>
          <td>Nama Penyewa</td>
          <td>:</td>
          <td colspan="2">{{ invoice.nama }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Alamat / No. Telp</td>
          <td>:</td>
          <td colspan="2">{{ invoice.telpon }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Berangkan, hari/tgl/jam</td>
          <td>:</td>
          <td colspan="2">{{ Prints.tanggakHari(invoice.tanggal_mulai) }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Pulang, hari/tgl.</td>
          <td>:</td>
          <td colspan="2">{{ Prints.tanggakHari(invoice.tanggal_kembali) }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Alamat Penjemputan</td>
          <td>:</td>
          <td colspan="2">{{ invoice.lokasi_jemput }}</td>
        </tr>
        <tr>
          <td></td>
          <td>Tujuan Wisata</td>
          <td>:</td>
          <td colspan="2">{{ Prints.TujuanRegular(invoice.route, invoice.lokasi) }}</td>
        </tr>

        <tr>
          <td colspan="5"><br>Demikian Surat Tugas ini dibuat untuk dapan dipergunakan sebagai mana mestinya.<br><br></td>
        </tr>

        <tr>
          <td colspan="3"></td>
          <td width="30%"></td>
          <td width="40%">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Semarang, {{ date('d F Y') }}</td>
        </tr>

        <tr>
          <td colspan="3" align="center">Yang diberi tugas</td>
          <td width="30%"></td>
          <td width="40%" align="center">GALATAMA BUS PARIWISATA</td>
        </tr>
        <tr>
          <td colspan="5" height="50"></td>
        </tr>
        <tr>
          <td colspan="3" align="center">
            <table>
              <tr>
              <td>(</td>
              <td>
                <div style="border-bottom:1px solid black; width:150px; height:16px;" align="center">
                  {{ Prints.Driver(invoice.driver, 'driver')|upper }}
                </div>
              </td>
              <td>)</td>
              </tr>
            </table>
          </td>
          <td width="40%"></td>
          <td width="30%" align="center"><table><tr><td>(</td><td><div style="border-bottom:1px solid black; width:AUTO; height:16px;">DADANG GUMILANG</div></td><td>)</td></tr></table></td>
        </tr>
        <tr>
          <td colspan="5"><br>Catatan:</td>
        </tr>
      </table>


      <table border="1" width="100%" style="border-collapse:collapse;">
        <tr>
          <th width="3%">NO</th>
          <th width="37%">URAIAN</th>
          <th width="30%">AWAL</th>
          <th width="30%">AKHIR</th>
        </tr>
        <tr>
          <td>1.</td>
          <td>Kondisi Bus</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>2.</td>
          <td>Stand Kilometer</td>
          <td></td>
          <td></td>
        </tr>
        <tr height="40">
          <td>3.</td>
          <td>Stand BBM</td>
          <td><table align="center"><tr><td>E</td><td><div style="border-bottom:1px solid black; width:150px; height:16px;"></div></td><td>F</td></tr></table></td>
          <td><table align="center"><tr><td>E</td><td><div style="border-bottom:1px solid black; width:150px; height:16px;"></div></td><td>F</td></tr></table></td>
        </tr>
      </table>
      <br>
      <!-- Tanda tangan -->
      <table width="100%" style="text-align:center;">
        <tr>
          <td>Pengemudi/Penanggung Jawab</td>
          <td>Petugas Garasi/Bengkel</td>
        </tr>
        <tr>
          <td colspan="2" height="50"></td>
        </tr>
        <tr align="center">
          <td><table><tr><td>(</td><td><div style="border-bottom:1px solid black; width:150px; height:16px;"></div></td><td>)</td></tr></table></td>
          <td><table><tr><td>(</td><td><div style="border-bottom:1px solid black; height:16px;">ZAMRONI</div></td><td>)</td></tr></table></td>
        </tr>
        <tr>
          <td height="15px"></td>
        </tr>
        <tr>
          <td style="text-align:right;padding-right:15px;font-size:9px;">KANTOR:
            <br>Jl.Pandanaran No. 58 (Lobby Area Pandanaran Lt. 1)
            <br>Semarang - Jawa Tengah
            <br>Telp.(024) 841-1414 Fax.(024) 844-7989</td>
          <td style="text-align:left;padding-left:15px;font-size:9px;">GARASI:
            <br>Jl. Semarang - Mangkang (Karangayar, Tugu) KM 12 No.58
            <br>Semarang - Jawa Tengah
            <br>Telp/Fax. (024) 866-3149</td>
        </tr>
      </table>
      <div style="border-top:5px solid black;margin-bottom:-9px;" width="100%" ></div><br>
      <div style="border-top:3px solid black;" width="100%" ></div>
    </div>
    
  <script>
    setTimeout(window.close, 0);
  </script>
  </body>
</html>
