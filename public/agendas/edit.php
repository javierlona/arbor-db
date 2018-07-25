<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Edit Agenda'; ?>
<?php $pageSubtitle = 'Make Changes to the Agenda' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
  // member_id is required or else we're going to redirect back to the index.
  if(!isset($_GET['agenda_id'])) :
    header("Location: " . WWW_ROOT . "/agendas/index.php");
  endif;
  $agendaID = $_GET['agenda_id'];
  // If post request process it, if not show the page
  if($_SERVER['REQUEST_METHOD'] == 'POST') :

    $agenda = [];
    $agenda['meeting_date'] = $_POST['meeting-date'] ?? '';
    $agenda['toastmaster'] = $_POST['toastmaster'] ?? '';
    $agenda['invocation_pledge'] = $_POST['invocation-pledge'] ?? '';
    $agenda['general_evaluator'] = $_POST['general-evaluator'] ?? '';
    $agenda['grammarian'] = $_POST['grammarian'] ?? '';
    $agenda['timer'] = $_POST['timer'] ?? '';
    $agenda['vote_counter'] = $_POST['vote-counter'] ?? '';
    $agenda['ah_counter'] = $_POST['ah-counter'] ?? '';
    $agenda['listener'] = $_POST['listener'] ?? '';
    $agenda['table_topics_master'] = $_POST['tbl-topic-master'] ?? '';
    $agenda['speaker_1'] = $_POST['speaker-1'] ?? '';
    $agenda['evaluator_1'] = $_POST['evaluator-1'] ?? '';
    $agenda['agenda_comments'] = $_POST['agenda-comments'] ?? '';

    $result = update_agenda($agenda);
    header("Location: " . WWW_ROOT . "/agendas/show.php?agenda_id=" . $agendaID);
  else:
    $agenda = find_agenda_by_id($agendaID);
    $memberNameSet = find_member_by_name();
  endif;
?>


  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?php echo WWW_ROOT . "/index.php"; ?>">Dashboard</a></li>
        <li><a href="<?php echo WWW_ROOT . "/agendas/index.php"; ?>">Agendas</a></li>
        <li class="active">Edit Agenda</li>
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
               <h3 class="panel-title">Agenda</h3>
             </div>
             <div class="panel-body">
               <form action="<?php echo WWW_ROOT . '/agendas/edit.php?agenda_id=' . htmlspecialchars(urlencode($agendaID)); ?>" method="post">
                 <div class="form-group">
                   <label>Agenda Date</label>
                   <input type="date" name="meeting-date" value="<?php echo htmlspecialchars($agenda['meeting_date']); ?>">
                 </div>
                 <label>Instructions: Enter the member's name for each role.</label><br/>
                 <div class="form-group">
                   <label>Toastmaster</label>
                   <select class="form-control" name="toastmaster">
                     <option selected>Choose...</option>
                     <?php
                       foreach($memberNameSet as $member) :
                         echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                         if($agenda['toastmaster'] == $member['Name']) :
                           echo " selected";
                         endif;
                         echo ">" . htmlspecialchars($member['Name']) . "</option>";
                       endforeach;
                     ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Invocation and Pledge </label>
                   <select class="form-control" name="invocation-pledge">
                     <option selected>Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        if($agenda['invocation_pledge'] == $member['Name']) :
                          echo " selected";
                        endif;
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>General Evaluator</label>
                   <select class="form-control" name="general-evaluator">
                     <option selected>Choose...</option>
                     <?php
                       foreach($memberNameSet as $member) :
                         echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                         if($agenda['general_evaluator'] == $member['Name']) :
                           echo " selected";
                         endif;
                         echo ">" . htmlspecialchars($member['Name']) . "</option>";
                       endforeach;
                     ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Grammarian</label>
                   <select class="form-control" name="grammarian">
                     <option selected>Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        if($agenda['grammarian'] == $member['Name']) :
                          echo " selected";
                        endif;
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Timer</label>
                   <select class="form-control" name="timer">
                     <option selected>Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        if($agenda['timer'] == $member['Name']) :
                          echo " selected";
                        endif;
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Vote Counter</label>
                   <select class="form-control" name="vote-counter">
                     <option selected>Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        if($agenda['vote_counter'] == $member['Name']) :
                          echo " selected";
                        endif;
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Ah Counter</label>
                   <select class="form-control" name="ah-counter">
                     <option selected>Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        if($agenda['ah_counter'] == $member['Name']) :
                          echo " selected";
                        endif;
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Listener</label>
                   <select class="form-control" name="listener">
                     <option selected>Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        if($agenda['listener'] == $member['Name']) :
                          echo " selected";
                        endif;
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Table Topic Master</label>
                   <select class="form-control" name="tbl-topic-master">
                     <option selected>Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        if($agenda['table_topics_master'] == $member['Name']) :
                          echo " selected";
                        endif;
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Speaker 1</label>
                   <select class="form-control" name="speaker-1">
                     <option selected>Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        if($agenda['speaker_1'] == $member['Name']) :
                          echo " selected";
                        endif;
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Evaluator 1</label>
                   <select class="form-control" name="evaluator-1">
                     <option selected>Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        if($agenda['evaluator_1'] == $member['Name']) :
                          echo " selected";
                        endif;
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Any additional comments?</label>
                   <textarea name="agenda-comments" class="form-control"><?php echo htmlspecialchars($agenda['agenda_comments']); ?></textarea>
                 </div>
               <input type="submit" name="update-agenda" class="btn btn-default" value="Update Agenda">
              </form>
             </div>
           </div>
          <?php mysqli_free_result($memberNameSet); ?>
        </div>
       </div>
    </div>
  </section>
  <?php include(SHARED_PATH . '/footer.php'); ?>
