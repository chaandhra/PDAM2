<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak'];
	
	if($crud->update($id,$kontak,$nama,$alamat))
	{
		$msg = "<div class='alert alert-info'>
				<strong>WOW!</strong> Record was updated successfully <meta http-equiv='refresh' content='1;url=pelanggan'>

				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));	
}

?>
<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 
     <form method='post'>
 
    <table class='table table-bordered'>
 
        <tr>
            <td>ID Pelanggan</td>
            <td><input type='text' name='id' class='form-control' value="<?php echo $idpelanggan ;?>" readonly="readonly"></td>
        </tr>                      
        <tr>
            <td>Nama</td>
            <td><input type='text' name='nama' class='form-control' value="<?php echo $namapelanggan ;?>"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea class="form-control" name="alamat" ><?php echo $alamat ;?></textarea></td>
        </tr>
        <tr>
            <td>Kontak</td>
            <td><input type='text' name='kontak' class='form-control' value="<?php echo $kontak ;?>"></td>
        </tr>
       
 
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Update this Record
				</button>
                <a href="pelanggan" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>