<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Edit Administrators'; ?>
<?php $pageSubtitle = 'Make Changes to an Administrator' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
  if(!isset($_GET['admin_id'])) :
    header("Location: " . WWW_ROOT . "/admins/index.php");
  endif;
  $adminID = $_GET['admin_id'];

  if($_SERVER['REQUEST_METHOD'] == 'POST') :
    $admin = [];
    $admin['admin_id'] = $adminID;
    $admin['first_name'] = $_POST['first-name'] ?? '';
    $admin['last_name'] = $_POST['last-name'] ?? '';
    $admin['email'] = $_POST['email'] ?? '';
    $admin['username'] = $_POST['username'] ?? '';
    $admin['password'] = $_POST['password'] ?? '';
    $admin['confirm_password'] = $_POST['confirm-password'] ?? '';

    $result = update_admin($admin);

    if($result === true) :
      $_SESSION['message'] = 'Admin updated.';
      header("Location: " . WWW_ROOT . "/admins/show.php?admin_id=" . $adminID);
    else:
      $errors = $result;
    endif;

  else:
    $admin = find_admin_by_id($adminID);
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
               <form action="<?php echo WWW_ROOT . '/admins/edit.php?admin_id=' . htmlspecialchars(urlencode($adminID)); ?>" method="post">
                <label>Instructions: Enter the Administrator's information.</label><br/>

                 <div class="form-group">
                   <label>First Name</label>
                   <input type="text" class="form-control" name="first-name" placeholder="First Name"
                   value="<?php echo htmlspecialchars($admin['first_name']); ?>">
                 </div>
                 <div class="form-group">
                   <label>Last Name</label>
                   <input type="text" class="form-control" name="last-name" placeholder="Last Name"
                   value="<?php echo htmlspecialchars($admin['last_name']); ?>">
                 </div>
                 <div class="form-group">
                   <label>Email Address</label>
                   <input type="email" class="form-control" name="email" placeholder="Member's email"
                   value="<?php echo htmlspecialchars($admin['email']); ?>">
                 </div>
                 <div class="form-group">
                   <label>Username</label>
                   <input type="text" class="form-control" name="username" placeholder="Adminstrator's Username" value="<?php echo htmlspecialchars($admin['username']); ?>">
                 </div>
                 <div class="form-group">
                   <label>Password</label>
                   <input type="password" name="password" value="" class="form-control">
                 </div>
                 <div class="form-group">
                   <label>Confirm Password</label>
                   <input type="password" name="confirm-password" value="" class="form-control">
                 </div>
               <input type="submit" name="edit-admin" class="btn btn-default" value="Edit Administrator">
              </form>
             </div>
           </div>

        </div>
       </div>
    </div>
  </section>
<?php include(SHARED_PATH . '/footer.php');?>
