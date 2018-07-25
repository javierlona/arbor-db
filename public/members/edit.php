<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Edit Member'; ?>
<?php $pageSubtitle = 'Make Changes to a Member' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
  // member_id is required or else we're going to redirect back to the index.
  if(!isset($_GET['member_id'])) :
    header("Location: " . WWW_ROOT . "/members/index.php");
  endif;
  $memberID = $_GET['member_id'];
  // If post request process it, if not show the page
  if($_SERVER['REQUEST_METHOD'] == 'POST') :
    // $memberComment = $_POST['editor1'] ?? '';

    $member = [];
    $member['member_id'] = $memberID;
    $member['member_join'] = $_POST['member-join-date'] ?? '';
    $member['member_name_first'] = $_POST['member-name-first'] ?? '';
    $member['member_name_last'] = $_POST['member-name-last'] ?? '';
    $member['member_email'] = $_POST['member-email'] ?? '';
    $member['member_comments'] = $_POST['member-comments'] ?? '';

    $result = update_member($member);
    header("Location: " . WWW_ROOT . "/members/show.php?member_id=" . $memberID);
  else:
    $member = find_member_by_id($memberID);
  endif;
?>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?php echo WWW_ROOT . "/index.php"; ?>">Dashboard</a></li>
        <li><a href="members.php">Members</a></li>
        <li class="active">Edit Member</li>
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
               <h3 class="panel-title">Member</h3>
             </div>
             <div class="panel-body">
               <form action="<?php echo WWW_ROOT . '/members/edit.php?member_id=' . htmlspecialchars(urlencode($memberID)); ?>" method="post">
                <label>Instructions: Enter the member's information.</label><br/>
                 <div class="form-group">
                   <label>Date Joined</label>
                   <input type="date" name="member-join-date" value="<?php echo htmlspecialchars($member['member_join']); ?>">
                 </div>
                 <div class="form-group">
                   <label>First Name</label>
                   <input type="text" class="form-control" name="member-name-first" placeholder="First Name"
                   value="<?php echo htmlspecialchars($member['member_name_first']); ?>">
                 </div>
                 <div class="form-group">
                   <label>Last Name</label>
                   <input type="text" class="form-control" name="member-name-last" placeholder="Last Name"
                   value="<?php echo htmlspecialchars($member['member_name_last']); ?>">
                 </div>
                 <div class="form-group">
                   <label>Email Address</label>
                   <input type="email" class="form-control" name="member-email" placeholder="Member's email"
                   value="<?php echo htmlspecialchars($member['member_email']); ?>">
                 </div>
                 <div class="form-group">
                   <label>Any additional comments?</label>
                   <textarea name="member-comments" class="form-control"><?php echo htmlspecialchars($member['member_comments']); ?></textarea>
                 </div>
               <input type="submit" name="edit-member" class="btn btn-default" value="Edit Member">
              </form>
             </div>
           </div>

        </div>
       </div>
    </div>
  </section>
<?php include(SHARED_PATH . '/footer.php');?>
