<?php 


   $username = $_POST['name'];
   $password = $_POST['password'];
   $result = false;
   $result=User::login($username , $password); 
   

if (isset($_POST['name']) and isset($_POST['password']) and !empty($_POST['password'])) {
    if ($result) {
        ?>
        <main class="container">
            <div class="bg-light p-5 rounded mt-3">
                <h1>Signup Success</h1>
               
              <?
              Session::set('session_user',$result);
              header("Location: /uma_project/index1.php"); exit;?>
            </div>
        </main>
    <?php
    } else {
        ?>
        <main class="container">
            <div class="bg-light p-5 rounded mt-3">
                <h1>Signup Fail</h1>
                <p class="lead">Something went wrong, <?= $error ?>
                </p>
            </div>
        </main>
    <?php
    }
}
    ?>

<main class="form-signin w-100 m-auto">
       <form method="post" action="login.php">
       <img class="mb-4 mx-auto" style="width: 350px;" src="https://api.logo.com/api/v2/images?logo=logo_68aac0f4-f420-44dc-91c9-08a819030537&format=webp&margins=0&quality=60&width=500&background=transparent&u=1661086195"
             alt="nope" height="45">           <h1 class="h3 mb-3 fw-normal">Please Login here</h1>

           <div class="form-floating">
               <input name="name" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
               <label for="floatingInput">Username</label>
           </div>
           <div class="form-floating">
               <input id="myInput" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
               <label for="floatingPassword">Password</label>
           </div>

           <div class="checkbox mb-3">
               <label>
                   <input type="checkbox" value="remember-me" onclick="myFunction()"> Show password
               </label>
           </div>
          
           <button class="w-100 btn btn-lg btn-primary" id="liveToastBtn" type="submit">Sign in</button>
           
           <div class="p-4">
           Don't have account Signup <a href="signup.php">here</a>
           </div>

       </form>
</main>

<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>