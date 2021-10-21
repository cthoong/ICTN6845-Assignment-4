<?php
    date_default_timezone_set('US/Eastern');
    include 'comments.inc.php';
    include 'dbh.inc.php';
    
    session_set_cookie_params(3600);
    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        die;
}
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <title>ICTN 6845</title>
</head>

<body>
  <!-- your content here... -->
    <?php
    echo
    "<form method='POST' action='".setComment($conn)."'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <textarea name='message'></textarea>
        <br></br>
        <button type='submit' name='commentSubmit'>Comment</button>
    </form>";

    getComments($conn)
    ?>
  

</body>
</html>