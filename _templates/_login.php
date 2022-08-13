<?php 

   
   $username = $_POST['name'];
   $password = $_POST['password'];
   $result=verify($username , $password); 
   if($result)
   {
   echo "sucess👍";
   }
   else{
       echo "Please check your code❤️";
   }
   ?>
<main class="form-signin w-100 m-auto">
       <form method="post" action="login.php">
           <img class="mb-4" src="https://img.icons8.com/ios-filled/344/logo.png" alt="" width="72" height="100%">
           <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

           <div class="form-floating">
               <input name="name" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
               <label for="floatingInput">Email address</label>
           </div>
           <div class="form-floating">
               <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
               <label for="floatingPassword">Password</label>
           </div>

           <div class="checkbox mb-3">
               <label>
                   <input type="checkbox" value="remember-me"> Remember me
               </label>
           </div>
           <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
           


       </form>
</main>
