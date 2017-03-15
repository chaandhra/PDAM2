<?php
include_once 'dbconfig.php';
include_once 'model/tagihan.php';
$crud = new tagihan($DB_con);
if(isset($_POST['btn-update']))
{
	$tanggal = $_POST['tgl'];
	$id = $_POST['id'];
	$besar= $_POST['besar'];
	$idpelanggan=$_POST['pelanggan'];
		
	if($crud->update($id,$tanggal,$besar,$idpelanggan,$status))
	{
		$msg = "<div class='alert alert-info'>
				<strong>WOW!</strong> Record was updated successfully <meta http-equiv='refresh' content='1;url=tagihan'>

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
            <td>ID tagihan</td>
            <td><input type='text' name='id' class='form-control' value="<?php echo $idtagihan ;?>" readonly="readonly"></td>
        </tr>
    	 <tr>
            <td>Tanggal</td>
            <td><input type='date' name='tgl' class='form-control' value="<?php echo $tanggal ;?>"></td>
        </tr>
         <tr>
            <td>Besar</td>
            <td><input type='number' name='besar' class='form-control' value="<?php echo $besar ;?>"></td>
        </tr>
         
         
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Update this Record
				</button>
                <a href="tagihan" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>