<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Selected Member'; ?>
<?php $pageSubtitle = 'Member Details' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php

  # check and see if there's a value there. If there is, use it. If not, then use this second value as a default instead.
  $memberID = $_GET['member_id'] ?? '1'; // PHP > 7.0
  $member = find_member_by_id($memberID);
?>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="<?php echo WWW_ROOT; ?>">Dashboard</a></li>
      <li><a href="<?php echo WWW_ROOT . '/members'; ?>">Members</a></li>
      <li class="active"><?php echo htmlspecialchars($member['member_name_first']) . ' ' . htmlspecialchars($member['member_name_last']) ; ?></li>
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
            </br>

            <table class="table table-striped table-hover">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
              </tr>
              <tr>
                <td><?php echo htmlspecialchars($member['member_name_first']) . ' ' . htmlspecialchars($member['member_name_last']) ; ?></td>
                <td><?php echo htmlspecialchars($member['member_email']); ?></td>
                <td><?php echo htmlspecialchars($member['member_join']); ?></td>
              </tr>
              <tr>
                <th>Comments:</th>
                <td colspan="2"><?php echo htmlspecialchars($member['member_comments']); ?></td>
              </tr>
              <tr>
                <td colspan="3">
                  <a class="btn btn-primary" href="<?php echo WWW_ROOT . '/members/leadership.php?member_id=' . htmlspecialchars(urlencode($member['member_id'])); ?>">Leadership Roles</a>
                  <a class="btn btn-info" href="<?php echo WWW_ROOT . '/members/speaker.php?member_id=' . htmlspecialchars(urlencode($member['member_id'])); ?>">Speaking Roles</a>
                </td>
              </tr>
            </table>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<?php include(SHARED_PATH . '/footer.php');?>
