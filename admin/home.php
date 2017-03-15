<!DOCTYPE html>
<html>
<head>
<?php include "header.php";
include "dbconfig.php"


 ?>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
Data Pelanggan
</div>
<div class="panel-body">

<table align="center">
	<tr><td align="center"><font size="80px"><?php echo $jmln = $DB_con->query('select count(*) from pelanggan')->fetchColumn(); ?>  </font></td><td align="center" width="100px">    pelanggan</td></tr>
	
</table>
<center>
<a href="pelanggan" >Lihat Detail </a>
</center>
</div>
</div>
</div>

<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
Data Tagihan
</div>
<div class="panel-body">
<table align="center">
	<tr><td align="center"><font size="80px"><?php echo $jmln = $DB_con->query('select count(*) from tagihan')->fetchColumn(); ?>  </font></td><td align="center" width="100px">    Tagihan</td></tr>
	
</table>
<center>
<a href="Kecamatan" >Lihat Detail </a>
</center>
</div>
</div>
</div>


<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
Data Pembayaran
</div>
<div class="panel-body">
<table align="center">
	<tr><td align="center"><font size="80px"> <?php echo $jmln = $DB_con->query('select count(*) from buktibayar')->fetchColumn(); ?>  </font></td><td align="center" width="100px">    Bukti bayar</td></tr>
	
</table>
<center>
<a href="blok" >Lihat Detail </a>
</center>
</div>
</div>
</div>


<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
Data User
</div>
<div class="panel-body">
<table align="center">
	<tr><td align="center"><font size="80px"> <?php echo $jmln = $DB_con->query('select count(*) from user')->fetchColumn(); ?>  </font></td><td align="center" width="100px">    Orang</td></tr>
	
</table>
<center>
<a href="userlist" >Lihat Detail </a>
</center>
</div>
</div>
</div>

</div>
<?php include "footer.php" ;?>
</div>
</div>


</body>
</html>
