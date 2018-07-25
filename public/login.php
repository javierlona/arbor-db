<?php require_once('../private/initialize.php'); ?>
<?php $pageTitle = ''; ?>
<?php $pageSubtitle = 'Account Login' ?>

<?php
$errors = [];
$username = '';
$password = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') :

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // if there were no errors, try to login
  if(empty($errors)) :
    // Using one variable ensures that msg is the same
    $login_failure_msg = "Log in was unsuccessful.";

    $admin = find_admin_by_username($username);
    // If you get back a record
    if($admin) :

      if(password_verify($password, $admin['hashed_password'])) :
        // password matches
        log_in_admin($admin);
        header("Location: " . WWW_ROOT);
      else :
        // username found, but password does not match
        $errors[] = $login_failure_msg;
      endif;

    else :
      // no username found
      $errors[] = $login_failure_msg;
    endif;

  endif;

endif;

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Account Login</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo WWW_ROOT . '/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo WWW_ROOT . '/css/style.css';?>" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <a class="navbar-brand" href="#">Arbor TM Database</a>
      </div>
    </nav>
  <header id="header">
    <div class="container">
      <div class="row">
      </div>
      <div class="col-md-12">
        <h1 class="text-center"> Admin Area <small>Account Login</small></h1>
      </div>
    </div>
  </header>

  <section id="main">
    <div class="container">
       <div class="row">
         <?php echo display_errors($errors); ?>
         <div class="col-md-4 col-md-offset-4">
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="well" method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <input type="submit" name="login" class="btn btn-default btn-block" value="Login">
        </form>
        </div>
       </div>
    </div>
  </section>
<?php include(SHARED_PATH . '/footer.php');?>
