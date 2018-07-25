<?php require_once('../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Dashboard'; ?>
<?php $pageSubtitle = 'Manage Your Group\'s Progress' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
  $memberCount = count_all_members();
  $agendaCount = count_all_agendas();
  $newMembersSet = find_latest_members();
?>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
       <div class="row">
        <?php include(SHARED_PATH . '/sidebar.php'); ?>
         <div class="col-md-9">
            <!-- Group Overview -->
           <div class="panel panel-default">
             <div class="panel-heading main-color-bg">
               <h3 class="panel-title">Group Overview</h3>
             </div>
             <div class="panel-body">

               <div class="col-md-6">
                 <div class="well dash-box">
                   <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo $agendaCount ; ?></h2>
                   <h4>Agendas</h4>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="well dash-box">
                   <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $memberCount ; ?></h2>
                   <h4>Members</h4>
                 </div>
               </div>
             </div>
           </div>
          <!-- Latest Members -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Latest Members</h3>
            </div>
            <div class="panel-body">
               <table class="table table-striped table-hover">
                 <tr>
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>Email</th>
                   <th>Joined</th>
                 </tr>
                 <?php while($newMember = mysqli_fetch_assoc($newMembersSet)) : ?>
                 <tr>
                   <td><?php echo htmlspecialchars($newMember['member_name_first']); ?></td>
                   <td><?php echo htmlspecialchars($newMember['member_name_last']); ?></td>
                   <td><?php echo htmlspecialchars($newMember['member_email']); ?></td>
                   <td><?php echo htmlspecialchars($newMember['member_join']); ?></td>
                 </tr>
               <?php endwhile; ?>
               </table>
            </div>
          </div>
        </div>
       </div>
    </div>
  </section>
<?php include(SHARED_PATH . '/footer.php'); ?>
