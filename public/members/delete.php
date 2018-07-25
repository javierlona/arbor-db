<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Delete Member'; ?>
<?php $pageSubtitle = 'Remove From Database' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php

  // member_id is required or else we're going to redirect back to the index.
  if(!isset($_GET['member_id'])) :
    header("Location: " . WWW_ROOT . "/members/index.php");
  endif;
  $memberID = $_GET['member_id'];
  $member = find_member_by_id($memberID);

  if($_SERVER['REQUEST_METHOD'] == 'POST') :
    delete_member($memberID);
    header("Location: " . WWW_ROOT . "/members/index.php");
  endif;

?>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="<?php echo WWW_ROOT; ?>">Dashboard</a></li>
      <li><a href="<?php echo WWW_ROOT . '/members'; ?>">Members</a></li>
      <li class="active">Delete Member</li>
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
      <h3 class="panel-title">Are you sure you want to delete the member?</h3>
    </div>
    <div class="panel-body">
     <table class="table table-striped table-hover">
       <tr>
         <th>Name</th>
         <th>Email</th>
         <th>Joined</th>
         <th></th>
       </tr>
       <tr>
         <td><?php echo htmlspecialchars($member['member_name_first']) . ' ' . htmlspecialchars($member['member_name_last']) ; ?></td>
         <td><?php echo htmlspecialchars($member['member_email']); ?></td>
         <td><?php echo htmlspecialchars($member['member_join']); ?></td>
         <td>  <form action="<?php echo WWW_ROOT . '/members/delete.php?member_id=' . htmlspecialchars(urlencode($member['member_id'])); ?>" method="post">
                <input class="btn btn-danger" type="submit" name="commit" value="Delete Member" />
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
