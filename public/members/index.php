<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Members'; ?>
<?php $pageSubtitle = 'View All Members' ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
  $memberSet = find_all_members();
?>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?php echo WWW_ROOT; ?>">Dashboard</a></li>
        <li class="active">Members</li>
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
               <h3 class="panel-title">Members</h3>
             </div>
             <div class="panel-body">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Filter Members...">
                  </div>
                </div>
              </br>
              <table class="table table-striped table-hover">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Joined</th>
                  <th></th>
                </tr>
                <?php while($member = mysqli_fetch_assoc($memberSet)) : ?>
                <tr>
                  <td><?php echo htmlspecialchars($member['member_name_first']) . ' ' . htmlspecialchars($member['member_name_last']) ; ?></td>
                  <td><?php echo htmlspecialchars($member['member_email']); ?></td>
                  <td><?php echo htmlspecialchars($member['member_join']); ?></td>
                  <td>
                    <a class="btn btn-warning" href="<?php echo WWW_ROOT . '/members/show.php?member_id=' . htmlspecialchars(urlencode($member['member_id'])); ?>">View</a>
                    <a class="btn btn-default" href="<?php echo WWW_ROOT . '/members/edit.php?member_id=' . htmlspecialchars(urlencode($member['member_id'])); ?>">Edit</a>
                    <a class="btn btn-danger" href="<?php echo WWW_ROOT . '/members/delete.php?member_id=' . htmlspecialchars(urlencode($member['member_id'])); ?>">Delete</a>
                  </td>
                </tr>
              <?php endwhile; ?>
              </table>
              <?php mysqli_free_result($memberSet); ?>

              </div>
             </div>
           </div>

        </div>
       </div>
    </div>
  </section>
  <?php include(SHARED_PATH . '/footer.php'); ?>
