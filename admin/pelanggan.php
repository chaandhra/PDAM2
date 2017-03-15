<?php
include_once 'dbconfig.php';

include_once 'header.php';
$jmln = $DB_con->query('select count(*) from pelanggan')->fetchColumn(); 
 ?>

<div class="clearfix"></div>

<div class="container">
<a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
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
     <th>Id Pelanggan</th>
     <th>Nama Pelanggan</th>
     <th>Alamat</th>
     <th>Kontak</th>

     <th colspan="2" align="center">Actions</th>
     </tr>
     <tr>
     <?php
      ini_set("display_errors",0);
                        $cari=$_POST['cari'];
                        if(isset($_POST)){
                      $query = "SELECT * from pelanggan where idpelanggan like'%$cari%' or namapelanggan like'%$cari%' ";       
                        $records_per_page=10;
                        $newquery = $crud->paging($query,$records_per_page);
                        $crud->dataview($newquery);


                        } else {
		$query = "SELECT * from pelanggan";       
		$records_per_page=10;
		$newquery = $crud->paging($query,$records_per_page);
		$crud->dataview($newquery);
    }
	 ?>
     </tr>
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
  <?php 
if ($jmln>0){
    echo 'ada';
}else{
    echo 'tidak';
}

  ?> 
<?php include_once 'footer.php'; ?>
</div>

