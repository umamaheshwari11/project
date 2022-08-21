

<?php  
 $connect = Database::getConnection();
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["uploadfile"]["tmp_name"],100));
      $description = $_POST['description']; 
      $query = "INSERT INTO `image`( `uploadfile`, `description`) VALUES ('$file','$description')";   
      if(mysqli_query($connect, $query))  
      {  
        echo '<div class="alert alert-info alert-dismissible fade show container" role="alert">
        <strong>Succesfull </strong>The photo is being uploaded
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Success:"></button>
      </div>';
      }  
      else{
        echo '<div class="alert alert-info alert-dismissible fade show container" role="alert">
    <strong>Failed</strong>Retry to upload the photo once again..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Success:"></button>
  </div>';
      }
    
 }  


 ?>  

<?
if(Session::get('session_user')){
  $username = Session::get('session_user');
if (!$_SERVER['HTTP_CACHE_CONTROL']) {
 echo' <div class="alert alert-info alert-dismissible fade show container" role="alert">
  <strong>Welcome '.$username['username'].'🤝!</strong> You should start uploading photos ❤️
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Success:"></button>
</div>';
}

?>



<section class="py-5 text-center container">

   <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Lens Elements </h1>
        <p class="lead text-muted">Its were you store the movement..</p>
        <p>
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Click here to start uploading Photos</button>
        </p>
      </div>
    </div>
  </section>

  <div class="offcanvas offcanvas-bottom min-vh-100" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" >
  <form method="POST" action="" enctype="multipart/form-data">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasBottomLabel">Press ❌ to Exit</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body" >
  <div class=" py-2">
  <label for="formFileLg" class="form-label">Upload the pictures Which was taken by you✌️</label>
  <input class="form-control form-control-lg w-25"  id="formFileLg" type="file" name="uploadfile">
</div>


<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label" nameholder="hiii">Picture description✍️..</label>
  <textarea name="description" class="form-control w-50 " id="exampleFormControlTextarea1" rows="3" placeholder="Type what Describes your picture"></textarea>
</div>
<button class="btn btn-dark"   name="insert" id="insert" value="Insert" type="submit">Upload..</button>


  </div>
  </form>
</div>
<?
} 
else{
  print_r("no session found");
}
?>

