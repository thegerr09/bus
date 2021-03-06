<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Invoice/Kwitansi</title>
  </head>
  <body style="font-family:arial;"  onload="window.print()">
    <div style="float:left; padding-left:40px; width:45%;">
      {{ image('img/logo.jpg', 'alt':'logo', 'width':'70px', 'height':'80px', 'style':'padding:10px; float: left;') }}
      <p style="color: green; font-size: 14px;"><b>GALATAMA</b></p>
      <p style="font-size: 10px;">
        <b>Kantor :</b><br>
        Jl.Pandanaran No. 58(Loby Area Hotel Pandanaran Lt.1) Semarang-Jawa Tengah <br>
        Telp.(024)841-1414 Fax. (024)844-7989 <br>
        <b>Garasi :</b><br>
        Jl. Semarang-Mangkang(Karanganyar, Tugu) KM 12 No. 58 Semarang- Jawa Tengah <br>
        Telp/Fax. (024)866-3149
      </p><br>

      <table border="0">
        <thead>
          <tr>
            <td colspan="3"></td>
            <td width="230px" align="center"><br><b>No:</b></td>
          </tr>
          <tr>
            <td colspan="4" align="center" style="font-size:20px;"><b><u>INVOICE/KWITANSI</u></b></td>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td width="150px"><u>Recive From</u></td>
            <td width="5px" rowspan="2">:</td>
            <td rowspan="2" colspan="2"> {{ invoice.nama|upper }}</td>
          </tr>
          <tr>
            <td width="150px">Telah Terima Dari</td>
          </tr>

          <tr>
            <td width="150px"><u>The Amount</u></td>
            <td width="5px" rowspan="2">:</td>
            <td colspan="2"><div style="width: 200px; border:2px solid black;">Rp.  {{ Helpers.number(invoice.tarif) }},-</div></td>
          </tr>
          <tr>
            <td width="150px">Uang Sejumlah</td>
            <td colspan="2">...........................................................</td>
          </tr>

          <tr>
            <td width="150px"><u>Paid For</u></td>
            <td width="5px" rowspan="2">:</td>
            <td colspan="2">Sewa bus </td>
          </tr>
          <tr>
            <td width="150px">Guna Membayar</td>
            <td colspan="2">Sewa bus</td>
          </tr>

          <tr>
            <td width="150px"><u>Remarks</u></td>
            <td width="5px" rowspan="3">:</td>
            <td colspan="2">...........................................................</td>
          </tr>
          <tr>
            <td width="150px">Keterangan</td>
            <td colspan="2">{{ invoice.note }}</td>
          </tr>
          <tr>
            <td></td>
            <td colspan="2">...........................................................</td>
          </tr>
        </tbody>

        <tfoot>
          <tr>
            <td colspan="3"></td>
            <td><br><br>&nbsp;Semarang, {{ date('d F Y') }}</td>
          </tr>

          <tr>
            <td colspan="3"></td>
            <td align="center">GALATAMA BUS PARIWISATA</td>
          </tr>

          <tr>
            <td colspan="4" height="70px"></td>
          </tr>

          <tr>
            <td colspan="3" ></td>
            <td align="center">.........................................</td>
          </tr>
        </tfoot>
      </table>
    </div>

    <!-- garis potong -->
    <div style="border-right:1px solid black; width:0; height:700px; float:left;margin:-20px 0 0 0;"></div>

    <div style="float:left; padding-left:40px; width:45%;">
      {{ image('img/logo.jpg', 'alt':'logo', 'width':'70px', 'height':'80px', 'style':'padding:10px; float: left;') }}
      <p style="color: green; font-size: 14px;"><b>GALATAMA</b></p>
      <p style="font-size: 10px;">
        <b>Kantor :</b><br>
        Jl.Pandanaran No. 58(Loby Area Hotel Pandanaran Lt.1) Semarang-Jawa Tengah <br>
        Telp.(024)841-1414 Fax. (024)844-7989 <br>
        <b>Garasi :</b><br>
        Jl. Semarang-Mangkang(Karanganyar, Tugu) KM 12 No. 58 Semarang- Jawa Tengah <br>
        Telp/Fax. (024)866-3149
      </p><br>

      <table border="0">
        <thead>
          <tr>
            <td colspan="3"></td>
            <td width="230px" align="center"><br><b>No:</b></td>
          </tr>
          <tr>
            <td colspan="4" align="center" style="font-size:20px;"><b><u>INVOICE/KWITANSI</u></b></td>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td width="150px"><u>Recive From</u></td>
            <td width="5px" rowspan="2">:</td>
            <td rowspan="2" colspan="2"> {{ invoice.nama|upper }}</td>
          </tr>
          <tr>
            <td width="150px">Telah Terima Dari</td>
          </tr>

          <tr>
            <td width="150px"><u>The Amount</u></td>
            <td width="5px" rowspan="2">:</td>
            <td colspan="2"><div style="width: 200px; border:2px solid black;">Rp.  {{ Helpers.number(invoice.tarif) }},-</div></td>
          </tr>
          <tr>
            <td width="150px">Uang Sejumlah</td>
            <td colspan="2">...........................................................</td>
          </tr>

          <tr>
            <td width="150px"><u>Paid For</u></td>
            <td width="5px" rowspan="2">:</td>
            <td colspan="2">Sewa bus </td>
          </tr>
          <tr>
            <td width="150px">Guna Membayar</td>
            <td colspan="2">Sewa bus</td>
          </tr>

          <tr>
            <td width="150px"><u>Remarks</u></td>
            <td width="5px" rowspan="3">:</td>
            <td colspan="2">...........................................................</td>
          </tr>
          <tr>
            <td width="150px">Keterangan</td>
            <td colspan="2">{{ invoice.note }}</td>
          </tr>
          <tr>
            <td></td>
            <td colspan="2">...........................................................</td>
          </tr>
        </tbody>

        <tfoot>
          <tr>
            <td colspan="3"></td>
            <td><br><br>&nbsp;Semarang, {{ date('d F Y') }}</td>
          </tr>

          <tr>
            <td colspan="3"></td>
            <td align="center">GALATAMA BUS PARIWISATA</td>
          </tr>

          <tr>
            <td colspan="4" height="70px"></td>
          </tr>

          <tr>
            <td colspan="3" ></td>
            <td align="center">.........................................</td>
          </tr>
        </tfoot>
      </table>
    </div>
  <script>
    setTimeout(window.close, 0);
  </script>
  </body>
</html>
