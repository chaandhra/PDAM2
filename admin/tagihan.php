<?php
include_once 'dbconfig.php';
include_once 'model/tagihan.php';
$crud = new tagihan($DB_con);
 include_once 'header.php';
$jmln = $DB_con->query('select count(*) from tagihan')->fetchColumn(); 
  
if (isset($_GET['delete_id'])) {
    $DB_con->exec("DELETE FROM tagihan WHERE idtagihan = '$_GET[delete_id]'");
echo '<script type="text/javascript">

       
        window.location = "tagihan";
  
</script>';

}

  ?>

<div class="clearfix"></div>

<div class="container">
<a href="add-tagihan" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
<form class="navbar-form navbar-right" role="search" action="userlist" method="post">
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="cari">
                            </div>
                            <a href="pelanggan" >
                             <button type="button" class="btn btn-outline btn-primary navbar-btn"><span class="glyphicon glyphicon-refresh"></span> </button></a>
                            </form>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 <table class='table table-bordered table-responsive'>
     <tr>
     <th>Id Tagihan</th>
      <th>Tanggal</th>
       <th>Besar</th>
        <th>Pelanggan</th>
         <th>Status</th>



     <th colspan="2" align="center">Actions</th>
     </tr>
     <?php
      ini_set("display_errors",0);
                        $cari=$_POST['cari'];
                        if(isset($_POST)){
                      $query = "SELECT tagihan.* , pelanggan.namapelanggan from tagihan left join pelanggan on tagihan.idpelanggan = pelanggan.idpelanggan where idtagihan like'%$cari%' or pelanggan.namapelanggan like'%$cari%' ";       
                        $records_per_page=10;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->tagihan($newquery);


                        } else {
        $query = "SELECT tagihan.* ,pelanggan.namapelanggan from tagihan left join pelanggan on tagihan.idpelanggan = pelanggan.idpelanggan order by tanggal";       
        $records_per_page=10;
        $newquery = $crud->paging($query,$records_per_page);
        $crud->dataview($newquery);
    }
     ?>
    <tr>
        <td colspan="7" align="center">
 			<div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
        	</div>
        </td>
    </tr>
 <tr> <td colspan="7"> Jumlah Data: <span class="badge"><?php echo $jmln;?></span>
                </td>
                </tr>
</table>
   
       


<?php include_once 'footer.php'; ?>