<?php include 'libs/load.php' ?>
<!doctype html>
<html lang="en">
<?load_template('_head');?>
<body class="text-center">
    <main>
    <?load_template('_header');?>

        <?load_template('_login');?>
    </main>
    
    <?
if (isset($_GET['logout'])) {
  Session::destroy();
  die("Session destroyed, <a href='login.php'>Login Again</a>");
}
?>
    <?load_template('_footer') ?>

    <script src="/app/assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html> 

