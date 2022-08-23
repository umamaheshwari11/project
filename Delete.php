<?php include 'libs/load.php' ?>

<!doctype html>
<html lang="en">
<?load_template('_head');?>
<body>
<main>

<div class="alert alert-success" role="alert">
  Deleted the post👍 
<?
if ($_POST['postid']) {
    $id =$_POST['postid'];
    $zerro = "Failed";
    $uid = Session::get('session_user')['id'];
    $query = "DELETE FROM `image` WHERE `id` = '$id' and `uid` = '$uid'";
    $conn = Database::getConnection();
    $result = $conn->query($query);
    if ($result) {
        return true;
    } else {
        return $zerro;
    }
    return $query;

    $conn->close();
}
?>
</div>
</main>
<script src="/app/assets/dist/js/bootstrap.bundle.min.js">
</script>
<script src="scripts.js"></script>
</body>
</html>