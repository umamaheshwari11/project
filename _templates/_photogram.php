<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
   $connect = Database::getConnection();
   $query = " select * from image ";
   $result = mysqli_query($connect, $query); 
                     
   while($row = mysqli_fetch_array($result)){ ?>

        <div class="col">
          <div class="card shadow-sm">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
            <? echo '<img src="data:image/jpeg;base64,'.base64_encode($row['uploadfile'] ).'" class="img-fluid" />  ';?>
        
            <div class="card-body">
              <p class="card-text"><?=$row['description']?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Description</button>
                </div>
                <small class="text-muted">9 mins</small>
                
                <div class="post-info">
	    <!-- if user likes post, style button differently -->
      	<i <?php if (userLiked($post['id'])): ?>
      		  class="fa fa-thumbs-up like-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['id'] ?>"></i>
      	<span class="likes"><?php echo getLikes($post['id']); ?></span>
      	
      	&nbsp;&nbsp;&nbsp;&nbsp;
      </div>

              </div>
            </div>
          </div>
        </div>

     <? } ?>

    
      </div>
    </div>
  </div>

