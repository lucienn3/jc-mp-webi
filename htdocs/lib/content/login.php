<?php
    
    if ($sactive == true) { send("index"); } 
    if(isset($_POST["submit"])) {
        if($_POST["password"] == "") {
            ?>
            <div class="alert alert-warning"><?php echo LOGIN_ERROR_EMPTY; ?></div>
            <?php
        } else {
            if($_POST["password"] == PASSWORD) {
                $_SESSION["active"] = true;
                ?>
                <div class="alert alert-success"><?php echo LOGIN_ERROR_SUCCESS; ?></div>
                <?php
                sendto("index.php?p=index",3);
            } else {
                ?>
                <div class="alert alert-danger"><?php echo LOGIN_ERROR_WRONG; ?></div>
                <?php
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="<?php echo LANG; ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo PAGE_DESC; ?>">
    <meta name="author" content="TuaTim">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title><?php echo PAGE_NAME; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" method="POST">
        <h2 class="form-signin-heading"><?php echo LOGIN_HEAD_TEXT; ?></h2>
        <input type="password" class="form-control" name="password" placeholder="<?php echo LOGIN_PLACEHOLDER; ?>" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"><?php echo LOGIN_SINGIN; ?></button>
      </form>

    </div> <!-- /container -->
  </body>
</html>
