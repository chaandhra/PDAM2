<?php
include_once 'dbconfig.php';
include_once 'model/tagihan.php';
$crud = new tagihan($DB_con);
if(isset($_POST['btn-save']))
{
	$tanggal = $_POST['tgl'];
	$id = $_POST['id'];
	$besar= $_POST['besar'];
	$idpelanggan=$_POST['pelanggan'];

	if($crud->create($id,$tanggal,$besar,$idpelanggan,$status))
	{
		header("Location: add-tagihan.php?inserted");
	}
	else
	{
		header("Location: add-tagihan.php?failure");
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
    <strong>WOW!</strong> Record was inserted successfully <meta http-equiv="refresh" content="1;url=tagihan">

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
?>

<div class="clearfix"></div><br />

<div class="container">

 	
	 <form method='post'>
 
    <table class='table table-bordered'>
 <?php 
function random_char( $panjang ) 
{ 
	$karakter = '1234567890'; 
	$string = ''; 
	for ( $i = 0; $i < $panjang; $i++ ) { 
		$pos = rand( 0, strlen( $karakter ) - 1 ); 
		$string .= $karakter{$pos}; 
	} 
    return $string;
}
 
$date=date('d-m-Y'); 
$years = date( 'Y' );
$bulan= date('m');
 // tahun
$get_3_number_of_year = substr( $years,-4 ); 
$a= substr( $bulan,-2 ) ;
$x='-';
$CODE = random_char(5) . $x .$a. $get_3_number_of_year ;


 ?>
        <tr>
            <td>ID tagihan</td>
            <td><input type='text' name='id' class='form-control' value="<?php echo $CODE ;?>"></td>
        </tr>
    	 <tr>
            <td>Tanggal</td>
            <td><input type='date' name='tgl' class='form-control' required></td>
        </tr>
         <tr>
            <td>Besar</td>
            <td><input type='number' name='besar' class='form-control' required></td>
        </tr>
          <?php
                                $sql = "SELECT * from pelanggan";
                                    $query = $DB_con->prepare($sql);
                                    $query->execute();
                                    $tahun = "";
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {
                                    $id = $row['idpelanggan'];
                                    $nama=$row['namapelanggan'];
                                    $tahun.='<option value="'.$id.'">'.$nama.'</option>';}
                                ?>
         <tr>
            <td>Pelanggan</td>
            <td>
            	<select name="pelanggan" class="form-control">
            		<?php echo $tahun ;?>
            	</select>
            </td>
        </tr>
 
        
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Create New Record
			</button>  
            <a href="tagihan" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>