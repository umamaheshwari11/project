<?php

$signup = false;
if (isset($_POST['username']) and isset($_POST['password']) and !empty($_POST['password']) and isset($_POST['email_address']) and isset($_POST['phone'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email_address'];
    $phone = $_POST['phone'];
    $error = User::signup($username, $password, $email, $phone);
    $signup = true;
}
?>

<?php
if ($signup) {
    if (!$error) {
?>
        <main class="container">
            <div class="bg-light p-5 rounded mt-3">
                <h1>Signup Success</h1>
                <p class="lead">Now you can login from <a href="login.php">here</a>.</p>

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
} else {
    ?>
  <main class="form-signin w-100 m-auto">
        <form method="post" action="signup.php">
            <img class="mb-4 mx-auto" style="width: 350px;" src="https://api.logo.com/api/v2/images?logo=logo_68aac0f4-f420-44dc-91c9-08a819030537&format=webp&margins=0&quality=60&width=500&background=transparent&u=1661086195"
             alt="nope" height="45">
            <h1 class="h3 mb-3 fw-normal">Signup here</h1>
            <div class="form-floating">
                <input name="username" type="text" class="form-control" id="floatingInputUsername" placeholder="name@example.com"required>
                <label for="floatingInputUsername">Username</label>
            </div>
            <div class="form-floating">
                <input name="phone" type="text" class="form-control" id="floatingInputUsername" placeholder="name@example.com"required>
                <label for="floatingInputUsername">Phone</label>
            </div>
            <div class="form-floating">
                <input name="email_address" type="email" class="form-control" id="floatingInput" placeholder="name@example.com"required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input id="myInput" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password"required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="checkbox mb-3">
               <label>
                   <input type="checkbox" value="remember-me" onclick="myFunction()"> Show password
               </label>
           </div>
            <button class="w-100 btn btn-lg btn-primary hvr-grow-rotate" type="submit">Sign up</button>
            <div class="p-4">
           Already signed up Login <a href="login.php">here</a>
           </div>
        </form>
    </main>
<?php
}
?>
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