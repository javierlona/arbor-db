<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Selected Agenda'; ?>
<?php $pageSubtitle = 'Agenda Details' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
  $agendaID = $_GET['agenda_id'] ?? '1'; // PHP > 7.0
  $agenda = find_agenda_by_id($agendaID);
?>
<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="<?php echo WWW_ROOT . "/index.php"; ?>">Dashboard</a></li>
      <li><a href="<?php echo WWW_ROOT . "/agendas/index.php"; ?>">Agendas</a></li>
      <li class="active">Selected Agenda</li>
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
             <h3 class="panel-title">Agenda Date: <?php echo htmlspecialchars($agenda['meeting_date']); ?></h3>
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
           </div>
         </div>
      </div>
     </div>
  </div>
</section>
<?php include(SHARED_PATH . '/footer.php'); ?>
