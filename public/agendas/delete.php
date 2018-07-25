<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Delete Agenda'; ?>
<?php $pageSubtitle = 'Remove From Database' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php

  // agenda_id is required or else we're going to redirect back to the index.
  if(!isset($_GET['agenda_id'])) :
    header("Location: " . WWW_ROOT . "/agendas/index.php");
  endif;
  $agendaID = $_GET['agenda_id'];
  $agenda = find_agenda_by_id($agendaID);

  if($_SERVER['REQUEST_METHOD'] == 'POST') :
    delete_agenda($agendaID);
    header("Location: " . WWW_ROOT . "/agendas/index.php");
  endif;

?>
<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="<?php echo WWW_ROOT . "/index.php"; ?>">Dashboard</a></li>
      <li><a href="<?php echo WWW_ROOT . "/agendas/index.php"; ?>">Agendas</a></li>
      <li class="active">Delete Agenda</li>
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
             <h3 class="panel-title">Are you sure you want to delete the agenda dated: <?php echo htmlspecialchars($agenda['meeting_date']); ?>?</h3>
           </div>
           <div class="panel-body">
             <table class="table table-striped table-hover">
               <tr>
                 <th>Role</th>
                 <th>Member</th>
               </tr>
               <tr>
                <th>Toastmaster</th>
                <td><?php echo htmlspecialchars($agenda['toastmaster']); ?></td>
              </tr>
              <tr>
                <th>Invocation and Pledge</th>
                <td><?php echo htmlspecialchars($agenda['invocation_pledge']); ?></td>
              </tr>
              <tr>
                <th>General Evaluator</th>
                <td><?php echo htmlspecialchars($agenda['general_evaluator']); ?></td>
              </tr>
              <tr>
                <th>Grammarian</th>
                <td><?php echo htmlspecialchars($agenda['grammarian']); ?></td>
              </tr>
              <tr>
                <th>Timer</th>
                <td><?php echo htmlspecialchars($agenda['timer']); ?></td>
              </tr>
              <tr>
                <th>Vote Counter</th>
                <td><?php echo htmlspecialchars($agenda['vote_counter']); ?></td>
              </tr>
              <tr>
                <th>Ah Counter</th>
                <td><?php echo htmlspecialchars($agenda['ah_counter']); ?></td>
              </tr>
              <tr>
                <th>Listener</th>
                <td><?php echo htmlspecialchars($agenda['listener']); ?></td>
              </tr>
              <tr>
                <th>Table Topic Master</th>
                <td><?php echo htmlspecialchars($agenda['table_topics_master']); ?></td>
              </tr>
              <tr>
                <th>Speaker 1</th>
                <td><?php echo htmlspecialchars($agenda['speaker_1']); ?></td>
              </tr>
              <tr>
                <th>Evaluator 1</th>
                <td><?php echo htmlspecialchars($agenda['evaluator_1']); ?></td>
              </tr>
             </table>
             <div class="form-group">
               <label>Any additional comments?</label>
               <p><?php echo htmlspecialchars($agenda['agenda_comments']); ?></p>
             </div>
             <form action="<?php echo WWW_ROOT . '/agendas/delete.php?agenda_id=' . htmlspecialchars(urlencode($agenda['agenda_id'])); ?>" method="post">
               <input class="btn btn-danger" type="submit" name="delete-agenda" value="Delete Agenda" />
             </form>
           </div>

         </div>
      </div>
     </div>
  </div>
</section>
<?php include(SHARED_PATH . '/footer.php'); ?>
