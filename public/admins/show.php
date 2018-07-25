<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Selected Administrator'; ?>
<?php $pageSubtitle = 'Administrator Details' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php

  # check and see if there's a value there. If there is, use it. If not, then use this second value as a default instead.
  $adminID = $_GET['admin_id'] ?? '1'; // PHP > 7.0
  $admin = find_admin_by_id($adminID);
?>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="<?php echo WWW_ROOT; ?>">Dashboard</a></li>
      <li><a href="<?php echo WWW_ROOT . '/admins'; ?>">Administrator</a></li>
      <li class="active"><?php echo htmlspecialchars($admin['first_name']) . ' ' . htmlspecialchars($admin['last_name']) ; ?></li>
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
             <h3 class="panel-title">Adminstrator</h3>
           </div>
           <div class="panel-body">
            </br>
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
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<?php include(SHARED_PATH . '/footer.php');?>
