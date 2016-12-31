<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Surat Bukti Sewa</title>
  </head>
  <body style="font-family: arial;"  onload="window.print()">
    <main>
      <div style="width: 47%; float: left; padding-left: 30px;">
        {{ image('img/logo.jpg', 'alt':'logo', 'width':'70px', 'height':'80px', 'style':'padding:10px; float: left;') }}
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
        <table border="0" style="font-size: 11px;">
          <tr>
            <td>Nama Pemesan</td>
            <td>:</td>
            <td colspan="2">{{ booking.nama|upper }}</td>
          </tr>
          <tr>
            <td>Nomor Telpon</td>
            <td>:</td>
            <td colspan="2">{{ booking.telpon|upper }}</td>
          </tr>
          <tr>
            <td valign="top">Tujuan</td>
            <td valign="top">:</td>
            <td valign="top" colspan="2">
            {% if booking.paket == 'regular' %}
              {{ Prints.TujuanRegular(booking.route, booking.lokasi) }}
            {% else %}
            {% endif %}
            </td>
          </tr>
          <tr>
            <td>Berangkat Tgl</td>
            <td>:</td>
            <td colspan="2">{{ booking.tanggal_mulai|upper }}</td>
          </tr>
          <tr>
            <td>Jumlah Armada</td>
            <td>:</td>
            <td colspan="2"> {{ Prints.BusCount(booking.nama, 'big', booking.tanggal_mulai) }} Besar | {{ Prints.BusCount(booking.nama, 'medium', booking.tanggal_mulai) }} Medium</td>
          </tr>
          <tr>
            <td>Kode Booking Bus</td>
            <td>:</td>
            <td colspan="2"> {{ Prints.KodeBooking(booking.nama, booking.tanggal_mulai) }}</td>
          </tr>
          <tr>
            <td>Biaya Sewa</td>
            <td>:</td>
            <td colspan="2">Rp. {{ Helpers.number(booking.tarif) }},-</td>
          </tr>
          <tr>
            <td>Uang Muka</td>
            <td>:</td>
            <td>Rp. {{ Helpers.number(booking.dp) }},-<td>
          </tr>
          <tr>
            <td>Sisa</td>
            <td>:</td>
            <td>Rp.{% set sisa = booking.tarif - booking.dp %} {{ Helpers.number(sisa) }},-<td>
          </tr>
          <tr>
            <td>Alamat Penjemputan</td>
            <td>:</td>
            <td colspan="2"> {{ booking.lokasi_jemput }}</td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td colspan="2"> {{ booking.note }}</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td width="120" align="center" valign="bottom"><p>Semarang, {{ date('d M Y') }}</p></td>
          </tr>
          <tr>
            <td align="center">Penyewa</td>
            <td></td>
            <td></td>
            <td align="center">GALATAMA BUS PARIWISATA</td>
          </tr>
          <tr>
            <td height="45" colspan="4"></td>
          </tr>
          <tr>
            <td align="center"><b>{{ booking.nama|upper }}</b></td>
            <td></td>
            <td></td>
            <td align="center">.................................</td>
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
        {{ image('img/logo.jpg', 'alt':'logo', 'width':'70px', 'height':'80px', 'style':'padding:10px; float: left;') }}
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
        <table border="0" style="font-size: 11px;">
          <tr>
            <td>Nama Pemesan</td>
            <td>:</td>
            <td colspan="2">{{ booking.nama|upper }}</td>
          </tr>
          <tr>
            <td>Nomor Telpon</td>
            <td>:</td>
            <td colspan="2">{{ booking.telpon|upper }}</td>
          </tr>
          <tr>
            <td valign="top">Tujuan</td>
            <td valign="top">:</td>
            <td valign="top" colspan="2">
            {% if booking.paket == 'regular' %}
              {{ Prints.TujuanRegular(booking.route, booking.lokasi) }}
            {% else %}
            {% endif %}
            </td>
          </tr>
          <tr>
            <td>Berangkat Tgl</td>
            <td>:</td>
            <td colspan="2">{{ booking.tanggal_mulai|upper }}</td>
          </tr>
          <tr>
            <td>Jumlah Armada</td>
            <td>:</td>
            <td colspan="2"> {{ Prints.BusCount(booking.nama, 'big', booking.tanggal_mulai) }} Besar | {{ Prints.BusCount(booking.nama, 'medium', booking.tanggal_mulai) }} Medium</td>
          </tr>
          <tr>
            <td>Kode Booking Bus</td>
            <td>:</td>
            <td colspan="2"> {{ Prints.KodeBooking(booking.nama, booking.tanggal_mulai) }}</td>
          </tr>
          <tr>
            <td>Biaya Sewa</td>
            <td>:</td>
            <td colspan="2">Rp. {{ Helpers.number(booking.tarif) }},-</td>
          </tr>
          <tr>
            <td>Uang Muka</td>
            <td>:</td>
            <td>Rp. {{ Helpers.number(booking.dp) }},-<td>
          </tr>
          <tr>
            <td>Sisa</td>
            <td>:</td>
            <td>Rp.{% set sisa = booking.tarif - booking.dp %} {{ Helpers.number(sisa) }},-<td>
          </tr>
          <tr>
            <td>Alamat Penjemputan</td>
            <td>:</td>
            <td colspan="2"> {{ booking.lokasi_jemput }}</td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td colspan="2"> {{ booking.note }}</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td width="120" align="center"><p>Semarang, {{ date('d M Y') }}</p></td>
          </tr>
          <tr>
            <td align="center">Penyewa</td>
            <td></td>
            <td></td>
            <td align="center">GALATAMA BUS PARIWISATA</td>
          </tr>
          <tr>
            <td height="45" colspan="4"></td>
          </tr>
          <tr>
            <td align="center"><b>{{ booking.nama|upper }}</b></td>
            <td></td>
            <td></td>
            <td align="center">.................................</td>
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
  <script>
    setTimeout(window.close, 0);
  </script>
  </body>
</html>
