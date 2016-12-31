<!DOCTYPE html>
<html>
<head>
  <title>Print Jurnal</title>
  <style type="text/css">
    body {
  background-color: rgb(82, 86, 89);
  font-family: 'Roboto', 'Noto', sans-serif;
  margin: 0;
  font-size: 12px;
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
  <center><h2>PRINT LIST JURNAL<br><small>{{ Helpers.dateChange(dt[0]) }} - {{ Helpers.dateChange(dt[1]) }}</small></h2></center>
  <p></p>
  <table style="border-collapse: collapse;" width="100%" cellpadding="5">
    <tr>
      <td align="center" width="20" style="border: 1px solid black;"><b>No</b></td>
      <td align="center" width="110" style="border: 1px solid black;"><b>Tanggal</b></td>
      <td align="center" width="80" style="border: 1px solid black;"><b>Nomor Jurnal</b></td>
      <td align="center" style="border: 1px solid black;"><b>Keterangan</b></td>
      <td align="center" width="80" style="border: 1px solid black;"><b>Kantor</b></td>
    </tr>
    {% set no = 1 %}
    {% for x in jurnal %}
    <tr>
      <td style="border: 1px solid black;">{{ no }}</td>
      <td style="border: 1px solid black;">{{ Helpers.dateChange(x.tanggal) }}</td>
      <td style="border: 1px solid black;">{{ x.kode_jurnal }}</td>
      <td style="border: 1px solid black;">{{ x.keterangan }}</td>
      <td style="border: 1px solid black;">{{ x.kantor }}</td>
    </tr>
    {% set no = no + 1 %}
    {% endfor %}
  </table>
  </div>

  <script>
    setTimeout(window.close, 0);
  </script>
</body>
</html>