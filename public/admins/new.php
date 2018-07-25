<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Add Administrator'; ?>
<?php $pageSubtitle = 'Create New Administrator' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
  // If post request process it, if not show the page
  if($_SERVER['REQUEST_METHOD'] == 'POST') :
    // $adminComment = $_POST['editor1'] ?? '';

    $admin = [];
    $admin['first_name'] = $_POST['first-name'] ?? '';
    $admin['last_name'] = $_POST['last-name'] ?? '';
    $admin['email'] = $_POST['email'] ?? '';
    $admin['username'] = $_POST['username'] ?? '';
    $admin['password'] = $_POST['password'] ?? '';
    $admin['confirm_password'] = $_POST['confirm-password'] ?? '';

    $result = insert_admin($admin);
    if($result === true) :
      $newID = mysqli_insert_id($db);
      $_SESSION['message'] = 'Admin Created.';
      header("Location: " . WWW_ROOT . "/admins/show.php?admin_id=" . $newID);
    else:
      $errors = $result;
    endif;

  else:
    // display blank form
    $admin = [];
    $admin["first_name"] = '';
    $admin["last_name"] = '';
    $admin["email"] = '';
    $admin["username"] = '';
    $admin['password'] = '';
    $admin['confirm_password'] = '';
  endif;
?>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?php echo WWW_ROOT . "/index.php"; ?>">Dashboard</a></li>
        <li><a href="members.php">Adminstrators</a></li>
        <li class="active">Edit Administrator</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
       <div class="row">
        <?php include(SHARED_PATH . '/sidebar.php'); ?>
         <div class="col-md-9">
            <!-- Website Overview -->
           <div class="panel panel-default">
             <div class="panel-heading main-color-bg">
               <h3 class="panel-title">Administrator</h3>
             </div>
             <div class="panel-body">
               <form action="<?php echo WWW_ROOT . '/admins/new.php'; ?>" method="post">
                <label>Instructions: Enter the Administrator's information.</label><br/>

                 <div class="form-group">
                   <label>First Name</label>
                   <input type="text" class="form-control" name="first-name" placeholder="First Name"
                   value="">
                 </div>
                 <div class="form-group">
                   <label>Last Name</label>
                   <input type="text" class="form-control" name="last-name" placeholder="Last Name"
                   value="">
                 </div>
                 <div class="form-group">
                   <label>Email Address</label>
                   <input type="email" class="form-control" name="email" placeholder="Member's email"
                   value="">
                 </div>
                 <div class="form-group">
                   <label>Username</label>
                   <input type="text" class="form-control" name="username" placeholder="Adminstrator's Username" value="">
                 </div>
                 <div class="form-group">
                   <label>Password</label>
                   <input type="password" name="password" value="" class="form-control">
                 </div>
                 <div class="form-group">
                   <label>Confirm Password</label>
                   <input type="password" name="confirm-password" value="" class="form-control">
                 </div>
               <input type="submit" name="add-admin" class="btn btn-default" value="Add Administrator">
              </form>
             </div>
           </div>

        </div>
       </div>
    </div>
  </section>
<?php include(SHARED_PATH . '/footer.php');?>
