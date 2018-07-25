<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Administrators'; ?>
<?php $pageSubtitle = 'View All Admins' ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
  $adminSet = find_all_admins();
?>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?php echo WWW_ROOT; ?>">Dashboard</a></li>
        <li class="active">Administrators</li>
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
               <h3 class="panel-title">Administrators</h3>
             </div>
             <div class="panel-body">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Filter Administrators...">
                  </div>
                </div>
              </br>
              <table class="table table-striped table-hover">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th></th>
                </tr>
                <?php while($admin = mysqli_fetch_assoc($adminSet)) : ?>
                <tr>
                  <td><?php echo htmlspecialchars($admin['first_name']) . ' ' . htmlspecialchars($admin['last_name']) ; ?></td>
                  <td><?php echo htmlspecialchars($admin['email']); ?></td>
                  <td>
                    <a class="btn btn-warning" href="<?php echo WWW_ROOT . '/admins/show.php?admin_id=' . htmlspecialchars(urlencode($admin['admin_id'])); ?>">View</a>
                    <a class="btn btn-default" href="<?php echo WWW_ROOT . '/admins/edit.php?admin_id=' . htmlspecialchars(urlencode($admin['admin_id'])); ?>">Edit</a>
                    <a class="btn btn-danger" href="<?php echo WWW_ROOT . '/admins/delete.php?admin_id=' . htmlspecialchars(urlencode($admin['admin_id'])); ?>">Delete</a>
                  </td>
                </tr>
              <?php endwhile; ?>
              </table>
              <?php mysqli_free_result($adminSet); ?>

              </div>
             </div>
           </div>

        </div>
       </div>
    </div>
  </section>
  <?php include(SHARED_PATH . '/footer.php'); ?>
