<?
if(Session::get('is_loggined')){
  $username = Session::get('session_user');
?>

<section class="py-5 text-center container">
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Welcome <?=$username["username"]?>🤝!</strong> You should start uploading photos ❤️
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Success:"></button>
</div>
   <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Lens Elements</h1>
        <p class="lead text-muted">Its were you store the movement..</p>
        <p>
          <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Click here to start uploading Photos</button>
        </p>
      </div>
    </div>
  </section>

  <div class="offcanvas offcanvas-bottom min-vh-100" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" >
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasBottomLabel">Press ❌ to Exit</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body" >
  <div class=" py-2">
  <label for="formFileLg" class="form-label">Upload the pictures Which was taken by you✌️</label>
  <input class="form-control form-control-lg w-25"  id="formFileLg" type="file">
</div>


<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label" nameholder="hiii">Picture description✍️..</label>
  <textarea class="form-control w-50 " id="exampleFormControlTextarea1" rows="3" placeholder="Type what Describes your picture"></textarea>
</div>
<button type="button" class="btn btn-dark">Upload..</button>
  </div>
</div>
<?
} 
?>
