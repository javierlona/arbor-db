<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Delete Adminstrator'; ?>
<?php $pageSubtitle = 'Remove From Database' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php

  // member_id is required or else we're going to redirect back to the index.
  if(!isset($_GET['admin_id'])) :
    header("Location: " . WWW_ROOT . "/admins/index.php");
  endif;

  $adminID = $_GET['admin_id'];

  if($_SERVER['REQUEST_METHOD'] == 'POST') :
    delete_admin($adminID);
    $_SESSION['message'] = 'Admin deleted.';
    header("Location: " . WWW_ROOT . "/admins/index.php");
  else:
    $admin = find_admin_by_id($adminID);
  endif;

?>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="<?php echo WWW_ROOT; ?>">Dashboard</a></li>
      <li><a href="<?php echo WWW_ROOT . '/admins'; ?>">Adminstrators</a></li>
      <li class="active">Delete Administrator</li>
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
      <h3 class="panel-title">Are you sure you want to delete the Administrator?</h3>
    </div>
    <div class="panel-body">
     <table class="table table-striped table-hover">
       <tr>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Email</th>
         <th>Username</th>
       </tr>
       <tr>
         <td><?php echo htmlspecialchars($admin['first_name']); ?></td>
         <td><?php echo htmlspecialchars($admin['last_name']); ?></td>
         <td><?php echo htmlspecialchars($admin['email']); ?></td>
         <td><?php echo htmlspecialchars($admin['username']); ?></td>
       </tr>
       <tr>
         <td colspan="5">
           <form action="<?php echo WWW_ROOT . '/admins/delete.php?admin_id=' . htmlspecialchars(urlencode($admin['admin_id'])); ?>" method="post">
             <input class="btn btn-danger" type="submit" name="delete-admin" value="Delete Adminstrator" />
           </form>
         </td>
       </tr>
     </table>
    </div>
  </div>

</div>
</div>
</div>
</section>

<?php include(SHARED_PATH . '/footer.php'); ?>
