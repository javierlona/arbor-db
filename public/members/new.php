<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Add Member'; ?>
<?php $pageSubtitle = 'Create a New Member' ?>
<?php include(SHARED_PATH . '/header.php'); ?>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?php echo WWW_ROOT . "/index.php"; ?>">Dashboard</a></li>
        <li><a href="<?php echo WWW_ROOT . "/members/index.php"; ?>">Members</a></li>
        <li class="active">Add Member</li>
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
               <form action="<?php echo WWW_ROOT . '/members/create.php'; ?>" method="post">
                <label>Instructions: Enter the member's information.</label><br/>
                 <div class="form-group">
                   <label>Date Joined</label>
                   <input type="date" name="member-join-date" required>
                 </div>
                 <div class="form-group">
                   <label>First Name</label>
                   <input type="text" class="form-control" name="member-name-first" placeholder="First Name">
                 </div>
                 <div class="form-group">
                   <label>Last Name</label>
                   <input type="text" class="form-control" name="member-name-last" placeholder="Last Name">
                 </div>
                 <div class="form-group">
                   <label>Email Address</label>
                   <input type="email" class="form-control" name="member-email" placeholder="Member's email">
                 </div>
                 <div class="form-group">
                   <label>Any additional comments?</label>
                   <textarea name="member-comments" class="form-control"></textarea>
               <input type="submit" name="create-member" class="btn btn-default" value="Create Member">
              </form>
             </div>
           </div>

        </div>
       </div>
    </div>
  </section>
<?php include(SHARED_PATH . '/footer.php');?>
