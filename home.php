<?php include 'header.php' ;?>
<div class="container">
<div class="row">
<div class="col-md-4">
<div class="panel panel-primary">
<div class="panel-heading">
Data Pelanggan
</div>
<div class="panel-body">

<table>
<tr><td width="100"> ID Pelanggan</td><td width="400">: <?php echo $userRow['idpelanggan']; ?> </td></tr>
  <tr><td> Nama</td><td width="100px">: <?php echo $userRow['namapelanggan']; ?>  </td></tr>
  <tr><td> Alamat</td><td width="100px">: <?php echo $userRow['alamat']; ?> </td></tr>
  <tr><td> Kontak</td><td width="100px">: <?php echo $userRow['kontak']; ?> </td></tr>
  
</table>

</div>
</div>
</div>

<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel-heading">
Data Tagihan
</div>
<div class="panel-body">

<?php
include('admin/dbconfig.php');
include_once 'admin/model/tagihan.php';
$crud = new tagihan($DB_con);
  $a=$userRow['nama'];  

?>
<div class="clearfix"></div><br />



     <table class='table table-bordered table-responsive'>
     <tr>
     <th>Id Tagihan</th>
      <th>Tanggal</th>
       <th>Besar</th>
        <th>Pelanggan</th>
         <th>Status</th>
         <th>Action</th>


      </tr>
      <tr>
     <?php
      ini_set("display_errors",0);
                        
        $query = "SELECT tagihan.* ,pelanggan.namapelanggan from tagihan left join pelanggan on tagihan.idpelanggan = pelanggan.idpelanggan where tagihan.idpelanggan ='$a' and status='BELUM BAYAR' order by tanggal desc";       
        $records_per_page=10;
        $newquery = $crud->paging($query,$records_per_page);
        $crud->tagihan2($newquery);
    
     ?>
     </tr>
    <tr>
        <td colspan="7" align="center">
            <div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
            </div>
        </td>
    </tr>
 
</table>
   
       



</div>
</div>
</div>
</div>

</div>

<div class="container">

<?php include "footer.php";?>
</body>
</html>
