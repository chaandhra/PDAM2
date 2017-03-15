<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
    $kontak=$_POST['kontak'];
    $id=$_POST['id'];

$sql = "SELECT COUNT(*) FROM pelanggan WHERE idpelanggan=$id";
if ($res = $DB_con->query($sql)) {

    /* Check the number of rows that match the SELECT statement */
  if ($res->fetchColumn() > 0) {

        /* Issue the real SELECT statement and work with the results */
      header("Location: add-data.php?duplicate");

    }
    /* No rows matched -- do something else */
  else {
    


if($crud->create($id,$nama,$alamat,$kontak))
    {
        header("Location: add-data.php?inserted");
    }
    else
    {
        header("Location: add-data.php?failure");
    }
        }
}

}
?>
<?php include_once 'header.php'; ?>
<div class="clearfix"></div>

<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>WOW!</strong> Record was inserted successfully 
    <meta http-equiv="refresh" content="1;url=pelanggan">

	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong>SORRY!</strong> ERROR while inserting record !
	</div>
	</div>
    <?php
}
else if(isset($_GET['duplicate']))
{
    ?>
    <div class="container">
    <div class="alert alert-warning">
    <strong>SORRY!</strong> Id Sudah ada !
     <meta http-equiv="refresh" content="1;url=add-data">
    </div>
    </div>
    <?php
}
?>

<div class="clearfix"></div><br />

<div class="container">

 	
	 <form method='post'>
 
    <table class='table table-bordered'>
 
        <tr>
            <td>ID Pelanggan</td>
            <td><input type='text' name='id' class='form-control' required></td>
        </tr>                      
        <tr>
            <td>Nama</td>
            <td><input type='text' name='nama' class='form-control' required></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea class='form-control' name='alamat' required></textarea></td>
        </tr>
        <tr>
            <td>Kontak</td>
            <td><input type='text' name='kontak' class='form-control' required></td>
        </tr>
        
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Create New Record
			</button>  
            <a href="pelanggan" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to pelanggan</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>