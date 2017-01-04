<!DOCTYPE html>
<html>
<head>
  <title>Print Laba Rugi</title>
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
      <h3>LABA RUGI</h3>
    </center>
    <p></p>
    <table>
      <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td>{{ date }}</td>
      </tr>
      <tr>
        <td>Kantor</td>
        <td>:</td>
        <td>{{ kantor }}</td>
      </tr>
    </table>
    <table style="border-collapse: collapse;" width="100%" id="table" cellpadding="5">
      <tr>
        <td height="18" width="25" align="center">NO.</td>
        <td align="center">Keterangan</td>
        <td align="center" width="110">Nominal</td>
      </tr>
      <tr>
        <td bgcolor="yellow">1</td>
        <td>Pendapatan</td>
        <td></td>
      </tr>
      <tr>
        <td bgcolor="yellow">2</td>
        <td><b>TOTAL PENDAPATAN</b></td>
        <td>Rp.<span style="float:right;">{{ Helpers.number(pendapatan) }} ,-</span></td>
      </tr>
      <tr>
        <td bgcolor="yellow">3</td>
        <td>Pengeluaran</td>
        <td></td>
      </tr>
      <tr>
        <td bgcolor="yellow">4</td>
        <td><b>TOTAL PENGELUARAN</b></td>
        <td>Rp.<span style="float:right;">{{ Helpers.number(pengeluaran) }} ,-</span></td>
      </tr>
      {% set total = pendapatan - pengeluaran %}
      <tr>
        <td colspan="2" align="center"><b>TOTAL
        {% if total < 0 %}
          RUGI
        {% else %}
          LABA
        {% endif %}
        </b></td>
        <td><b>Rp.<span style="float:right;">{{ Helpers.number(total) }} ,-</span></b></td>
      </tr>
    </table>
  </div>

  <script>
    window.print();
    setTimeout(window.close(), 500);
  </script>
</body>
</html>