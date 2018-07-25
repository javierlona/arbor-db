<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Leadership'; ?>
<?php $pageSubtitle = 'Member Leadership Roles' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php

  # check and see if there's a value there. If there is, use it. If not, then use this second value as a default instead.
  $memberID = $_GET['member_id'] ?? '1'; // PHP > 7.0
  $member = find_member_by_id($memberID);
  $memberName = htmlspecialchars($member['member_name_first']) . ' ' . htmlspecialchars($member['member_name_last']);
  $leadershipRoles = find_leadership_roles($memberID);
?>
<section id="main">
  <div class="container">
     <div class="row">
       <?php include(SHARED_PATH . '/sidebar.php'); ?>
       <div class="col-md-9">
          <!-- Website Overview -->
         <div class="panel panel-default">
           <div class="panel-heading main-color-bg">
             <h3 class="panel-title"><?php echo $memberName . " had a leadership role the following dates:"?></h3>
           </div>
           <div class="panel-body">
            </br>
            <table class="table table-striped table-hover">
              <tr>
                <th>Date</th>
                <th></th>
              </tr>
              <?php while ($agenda = mysqli_fetch_assoc($leadershipRoles)) : ?>
              <tr>
                <td><?php echo htmlspecialchars($agenda['meeting_date']); ?></td>
                <td>
                  <a class="btn btn-warning" href="<?php echo WWW_ROOT . '/agendas/show.php?agenda_id=' . htmlspecialchars(urlencode($agenda['agenda_id'])); ?>">View</a>
                  <a class="btn btn-default" href="<?php echo WWW_ROOT . '/agendas/edit.php?agenda_id=' . htmlspecialchars(urlencode($agenda['agenda_id'])); ?>">Edit</a>
                </td>
              </tr>
              <?php endwhile; ?>
            </table>
              <?php mysqli_free_result($leadershipRoles); ?>

           </div>
         </div>

      </div>
     </div>
  </div>
</section>



<?php include(SHARED_PATH . '/footer.php'); ?>
