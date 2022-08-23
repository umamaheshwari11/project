

<?php include 'libs/load.php' ?>

<!doctype html>
<html lang="en">
<?load_template('_head');?>
<body>
<main>
<?php

if (isset($_POST['comment'])) {

    
    $pid = Session::get('temppostid'); 
    $uid = Session::get('session_user')['id'];
    $comment = $_POST['comment'];
    $conn = Database::getConnection();
    date_default_timezone_set('Asia/Kolkata'); 
    $currentTime = date( 'd-m-Y h:i:s A', time () ); 
    $sql = "INSERT INTO `comment` (`pid`,`uid`,`comment`,`time`)
    VALUES ('$pid','$uid','$comment','$currentTime')";
    $error = false;

    try{
    if ($conn->query($sql) === true) {
        $error = false;
     $preview = Session::get('page');
  header("Location: $preview");
  echo $preview;
    } 
    } catch(Exception $e){
        // echo "Error: " . $sql . "<br>" . $conn->error;
        $error = $conn->error;
        echo $error;
        echo $pid;
    }

    // $conn->close();
    // return $error;
}
else{
  echo "Not received";
}
?>
<form method="post" action="comments.php">
  <?Session::set('temppostid',$_POST['postid']);?>
  <?Session::set('page',$_POST['page']);?>
<div class="offcanvas offcanvas-start show overflow-auto" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">
    <div class="input-group">
    <button  class="btn btn-dark" type="submit">Post</button>
    <input id="myInput" name="comment" type="text" class="form-control" id="floatingPassword" placeholder="Comment heree.." required>
    <button  type="button" class="btn btn-outline-danger" onclick="myFunction()">EXIT</button>


    </div>
    </h5>
  </div>
  <div class="offcanvas-body">
     Comment section:
  

    <?php
   $connect = Database::getConnection();
   $postid = $_POST['postid'];
   $query = "SELECT * FROM `comment` WHERE pid = $postid";
  
   $result = mysqli_query($connect, $query); 
                     
   while($row = mysqli_fetch_array($result)){ ?> 
       <? $userid = $row['uid'];
        $query2 = "SELECT * FROM `auth` WHERE id = $userid";
          $result2 = mysqli_query($connect, $query2); 
          while($row2 = mysqli_fetch_array($result2)){ ?>
         <div class="alert alert-light p-0" role="alert">
          <p class="text-muted p-0"><b class="text-danger p-0">@<?=$row2['username']?>
          <span class="badge rounded-pill text-bg-warning"><?=$row['time']?></span></b>
          <span class="badge rounded-pill text-bg-light"><?=$row['comment']?></span></p>
  

 
 
  </div>

  <? } } ?>

  </div>
</div>


</form>

<script>
    function myFunction(){
  var x = document.getElementById("offcanvas");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<style>
    #offcanvas{
        display:block;
    }
</style>


</main>
<?load_template('_footer') ?>
<script src="/app/assets/dist/js/bootstrap.bundle.min.js">
</script>
<script src="scripts.js"></script>
</body>
</html>