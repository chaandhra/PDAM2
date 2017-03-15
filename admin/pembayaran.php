<?php
include_once 'dbconfig.php';

 include_once 'header.php';




if(isset($_GET['id']))
	{
	
		
		$idtagihan = $_GET['id'];
       $sql = "update buktibayar set status='Ter_verifikasi' where id='$idtagihan'";
                            $DB_con->exec($sql);
		

         $query=$DB_con->query("select * from buktibayar where id='$_GET[id]'");
	$data  = $query->fetch(PDO::FETCH_ASSOC);   
	$status=$data['idtagihan']  ;             
       $sql2 = "update tagihan set status='SUDAH BAYAR' where idtagihan='$status'";
                            $DB_con->exec($sql2);

		header("Location: pembayaran");
	}

?>




<div class="container">
<div class="row">
<?php
	
	$stmt = $DB_con->prepare('SELECT buktibayar.*, pelanggan.namapelanggan FROM buktibayar left join pelanggan on buktibayar.idpelanggan=pelanggan.idpelanggan ORDER BY tanggal DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-xs-3">
				<p class="page-header"><?php echo $namapelanggan."&nbsp;/&nbsp;".$tanggal."&nbsp;/&nbsp;".$status; ?></p>
				<img src="upload/<?php  echo $row['buktibayar']; ?>" class="img-rounded" width="250px" height="250px"  title="<?php echo $id; ?>">
			<p class="page-header">
				<span>
				<a class="btn btn-info" href="?id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('yakin verifired ?')"><span class="glyphicon glyphicon-edit"></span> Verifikasi</a> 
				
				</span>
				</p>
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}
	
?>