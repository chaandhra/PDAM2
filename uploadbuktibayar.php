<?php include 'header.php' ;?>

<div class="container">





<div class="panel panel-primary">
<div class="panel-heading">
PDAM Tirta Medal Sumedang
</div>
<div class="panel-body">


       


<?php

include('admin/dbconfig.php');
  error_reporting( ~E_NOTICE ); // avoid notice
  

  
  if(isset($_POST['btnsave']))
  {
    $id = '';
    $tgl = $_POST['tgl'];
    $nama = $_POST['nama'];
    $ket= 'Belum Di Verifikasi';
    $tagihan = $_POST['tagihan'];

    $imgFile = $_FILES['poto']['name'];
    $tmp_dir = $_FILES['poto']['tmp_name'];
    $imgSize = $_FILES['poto']['size'];
    
      if(empty($nama)){
      $errMSG = "Please Enter Username.";
    }
    else if(empty($tgl)){
      $errMSG = "Please Select Image File.";
    }
    else
    {
    
      $upload_dir = 'admin/upload/'; // upload directory
  
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
      // rename uploading image
      $poto = rand(1000,1000000).".".$imgExt;
        
      // allow valid image file formats
      if(in_array($imgExt, $valid_extensions)){     
        // Check file size '5MB'
        if($imgSize < 5000000)        {
          move_uploaded_file($tmp_dir,$upload_dir.$poto);
        }
        else{
          $errMSG = "Sorry, your file is too large.";
        }
      }
      
  else{
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
      }
    }
    
    // if no error occured, continue ....
    if(!isset($errMSG))
    {
      $stmt = $DB_con->prepare('INSERT INTO buktibayar VALUES(:id,:tgl,:nama,:buktibayar,:ket,:idtagihan) ');
      $stmt->bindParam(':id',$id);
      $stmt->bindParam(':tgl',$tgl);
      $stmt->bindParam(':nama',$nama);
      $stmt->bindParam(':ket',$ket);
      $stmt->bindParam(':buktibayar',$poto);
      $stmt->bindParam(':idtagihan',$tagihan);
       


      if($stmt->execute())
      {
        $successMSG = "new record succesfully inserted ...";
        header("refresh:1;home"); // redirects image view page after 5 seconds.
      }
      else
      {
        $errMSG = "error while inserting....";
      }
    }
  }
?>

<body>




    

  <?php
  if(isset($errMSG)){
      ?>
            <div class="alert alert-danger">
              <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
  }
  else if(isset($successMSG)){
    ?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
  }
  ?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
      <?php

include_once 'admin/model/tagihan.php';
$crud = new tagihan($DB_con);
$date=date('d-m-Y'); 
if(isset($_GET['id']))
{
  $idtagihan = $_GET['id'];
  extract($crud->getID2($idtagihan)); 
}

?>
  <table class="table table-bordered table-responsive">
  
   <tr>
      <td><label class="control-label">Tanggal</label></td>
        <td><input class="form-control"  name="tgl" value="<?php echo $date ;?>" readonly="readonly"></td>
    </tr>
     <tr>
      <td><label class="control-label">ID Tagihan </label></td>
        <td><input class="form-control" type="text" name="tagihan" placeholder="Enter Username" value="<?php echo $idtagihan; ?>" readonly="readonly"></td>
    </tr>
    <tr>
      <td><label class="control-label">Nama </label></td>
        <td><input class="form-control" type="text" name="nama" placeholder="Enter Username" value="<?php echo $idpelanggan; ?>" readonly="readonly"></td>
    </tr>
    
  
    
    <tr>
      <td><label class="control-label">Bukti Bayar</label></td>
        <td><input class="input-group" type="file" name="poto" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>



<?php include "footer.php";?>
</body>
</html>
