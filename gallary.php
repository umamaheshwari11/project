<?php include 'libs/load.php' ?>
<?php include 'like.php' ?>
<!doctype html>
<html lang="en">
<?load_template('_head');?>
<body>
<?load_template('_header');?>
<main>
<? if(Session::get('session_user')){ ?>
<div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?$id = Session::get('session_user')['id']?>
      <?php
   $connect = Database::getConnection();
   $query = "SELECT * FROM `image`";
   $result = mysqli_query($connect, $query); 
                     
   while($row = mysqli_fetch_array($result)){ ?>

        <div class="col">
          <div class="card shadow-sm">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
            <? echo '<img src="data:image/jpeg;base64,'.base64_encode($row['uploadfile'] ).'" class="img-fluid" />  ';?>
        
            <div class="card-body">
              <p class="card-text"><?=$row['description']?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="">
                <div class="post-info">
      	<i <?php if (userLiked($row['id'])): ?>
      		  class="fa fa-thumbs-up like-btn border border-primary px-4 py-2 rounded-4"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn border border-primary px-4 py-2 rounded-4"
      	  <?php endif ?>
      	  data-id="<?php echo $row['id'] ?>"></i>
      	<span class="likes"><?php echo getLikes($row['id']); ?></span>
                  </div>
                 </div>
                <small class="text-muted">9 mins </small>
              </div>
            </div>
          </div>
        </div>
<? } ?>
</div>
    </div>
  </div>
  <? }
  else{
    echo ' <main class="container">
    <div class="bg-light p-5 rounded mt-3">
        <h1>Session not found</h1>
        <p class="lead">Try to login <a href="login.php">here</a>
        </p>
    </div>
  </main>';
  }?>
</main>
<?load_template('_footer') ?>
<script src="/app/assets/dist/js/bootstrap.bundle.min.js">
</script>
<script src="scripts.js"></script>
</body>
</html>
<style>
  .posts-wrapper {
    width: 50%;
    margin: 20px auto;
    border: 1px solid #eee;
  }
  .post {
    width: 90%;
    margin: 20px auto;
    padding: 10px 5px 0px 5px;
    border: 1px solid green;
  }
  .post-info {
    margin: 10px auto 0px;
    padding: 5px;
  }
  .fa {
    font-size: 1.2em;
  }
  .fa-thumbs-down, .fa-thumbs-o-down {
    transform:rotateY(180deg);
  }
  .logged_in_user {
    padding: 10px 30px 0px;
  }
  i {
    color: blue;
  }
</style>


