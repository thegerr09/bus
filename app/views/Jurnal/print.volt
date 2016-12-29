<!DOCTYPE html>
<html>
<head>
  <title>Print Jurnal</title>
  <style type="text/css">
    body {
  background-color: rgb(82, 86, 89);
  font-family: 'Roboto', 'Noto', sans-serif;
  margin: 0;
}
  </style>
</head>
<body style="font-family:Tahoma, Geneva, Verdana, sans-serif;" onload="windows:print()">

  <div>
  	<table>
  	  <tr height="20">
          <td>
            <div style="margin :0; left:0; right:0; top:0; bottom:0; width:230px; height:80px;">
              {{ image('img/logo.jpg', 'alt':'logo', 'width':'55px', 'height':'60px', 'style':'float: left;') }}
              <div style="font-size:30px; margin:5px -10px -5px 0px; float:left;"><b>GALATAMA</b></div>
              <div style="font-size:19px; padding-left:58px; margin:-10px -5px -5px 0px;"><b>BUS PARIWISATA</b></div>
            </div>
          </td>
        </tr>
  	</table>
  <table width="100%">
    <tr>
      <td colspan="3"><h3>BUKTI JURNAL</h3></td>
    </tr>
    <tr>
      <td width="100">Tanggal</td>
      <td width="10">:</td>
      <td>{{ jurnal.tanggal }}</td>
    </tr>
    <tr>
      <td>Nomor Jurnal</td>
      <td>:</td>
      <td>{{ jurnal.kode_jurnal }}</td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td>{{ jurnal.keterangan }}</td>
    </tr>
  </table>
  <p></p>
  <table style="border-collapse: collapse;" width="100%" cellpadding="5">
    <tr>
      <td align="center" width="40" style="border: 1px solid black;"><b>No</b></td>
      <td align="center" style="border: 1px solid black;"><b>Account</b></td>
      <td align="center" width="150" style="border: 1px solid black;"><b>Debet</b></td>
      <td align="center" width="150" style="border: 1px solid black;"><b>Kredit</b></td>
    </tr>
    {% set no = 1 %}
    {% for x in jurnalChild %}
    {% if x.id_jurnal == jurnal.id %}
    <tr>
      <td style="border: 1px solid black;">{{ no }}</td>
      <td style="border: 1px solid black;">{{ Prints.account(x.account).account }}</td>
      <td style="border: 1px solid black;">Rp.<span style="float:right;">{{ Helpers.number(x.debet) }} ,-</span></td>
      <td style="border: 1px solid black;">Rp.<span style="float:right;">{{ Helpers.number(x.kredit) }} ,-</span></td>
    </tr>
    {% set no = no + 1 %}
    {% endif %}
    {% endfor %}
    <tr>
      <td style="border: 1px solid black;" colspan="2" align="center"><b>TOTAL</b></td>
      <td style="border: 1px solid black;">Rp.<span style="float:right;">{{ Helpers.number(jurnal.total_debet) }} ,-</span></td>
      <td style="border: 1px solid black;">Rp.<span style="float:right;">{{ Helpers.number(jurnal.total_kredit) }} ,-</span></td>
    </tr>
  </table>
  </div>

</body>
</html>