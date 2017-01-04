<!DOCTYPE html>
<html>
<head>
  <title>Print Jurnal</title>
  <style>
    #table tr td{
      border: 1px solid #000;
    }
  </style>
</head>
<body style="font-family:Tahoma, Geneva, Verdana, sans-serif; font-size: 10px;" onload="windows:print()">

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
    <center>
      <h3>BUKU BESAR</h3>
    </center>
    <p></p>
    <table>
      <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td>{{ date }}</td>
      </tr>
      <tr>
        <td>No. Account</td>
        <td>:</td>
        <td>{{ account }}</td>
      </tr>
    </table>
    <table style="border-collapse: collapse;" width="100%" id="table" cellpadding="5">
      <tr>
        <td height="18" width="25" align="center">NO.</td>
        <td align="center" width="70">Tanggal</td>
        <td align="center" width="75">No. Jurnal</td>
        <td align="center">Keterangan</td>
        <td align="center" width="90">Debet</td>
        <td align="center" width="90">Kredit</td>
      </tr>
      {% set no = 1 %}
      {% set total_debet = 0 %}
      {% set total_kredit = 0 %}
      {% for j in jurnalChild %}
        {% for x in bukuBesar %}
          {% if x.id_jurnal == j.id_jurnal %}
          <tr>
            <td height="18" align="center">{{ no }}</td>
            <td align="center">{{ x.tanggal }}</td>
            <td align="center">{{ x.kode_jurnal }}</td>
            <td>{{ x.keterangan }}</td>
              <td>Rp.<span style="float:right;">{{ Helpers.number(j.debet) }} ,-</span></td>
              <td>Rp.<span style="float:right;">{{ Helpers.number(j.kredit) }} ,-</span></td>
          </tr>
          {% set total_debet = total_debet + j.debet %}
          {% set total_kredit = total_kredit + j.kredit %}
          {% endif %}
        {% endfor %}
      {% set no = no + 1 %}
      {% endfor %}
      <tr>
        <td colspan="4" align="center"><b>TOTAL</b></td>
        <td><b>Rp.<span style="float:right;">{{ Helpers.number(total_debet) }} ,-</span></b></td>
        <td><b>Rp.<span style="float:right;">{{ Helpers.number(total_kredit) }} ,-</span></b></td>
      </tr>
    </table>
  </div>

  <script>
    setTimeout(window.close, 0);
  </script>
</body>
</html>