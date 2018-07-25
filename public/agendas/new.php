<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Add Agenda'; ?>
<?php $pageSubtitle = 'Create a New Agenda' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
  /*
    Issues one database query and returns the table output
    from the query as an array. The for loops process the array output.
  */
  $memberNameSet = find_member_by_name();
?>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?php echo WWW_ROOT . "/index.php"; ?>">Dashboard</a></li>
        <li><a href="<?php echo WWW_ROOT . "/agendas/index.php"; ?>">Agendas</a></li>
        <li class="active">Add Agenda</li>
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
               <form action="<?php echo WWW_ROOT . '/agendas/create.php'; ?>" method="post">
                 <div class="form-group">
                   <label>Agenda Date</label>
                   <input type="date" name="meeting-date" required>
                 </div>
                 <label>Instructions: Enter the member's name for each role.</label><br/>
                 <div class="form-group">
                   <label>Toastmaster</label>
                   <select class="form-control" name="toastmaster">
                     <option selected value="">Choose...</option>
                     <?php
                       foreach($memberNameSet as $member) :
                         echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                         echo ">" . htmlspecialchars($member['Name']) . "</option>";
                       endforeach;
                     ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Invocation and Pledge </label>
                   <select class="form-control" name="invocation-pledge">
                     <option selected value="">Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>General Evaluator</label>
                   <select class="form-control" name="general-evaluator">
                     <option selected value="">Choose...</option>
                     <?php
                       foreach($memberNameSet as $member) :
                         echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                         echo ">" . htmlspecialchars($member['Name']) . "</option>";
                       endforeach;
                     ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Grammarian</label>
                   <select class="form-control" name="grammarian">
                     <option selected value="">Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Timer</label>
                   <select class="form-control" name="timer">
                     <option selected value="">Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Vote Counter</label>
                   <select class="form-control" name="vote-counter">
                     <option selected value="">Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Ah Counter</label>
                   <select class="form-control" name="ah-counter">
                     <option selected value="">Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Listener</label>
                   <select class="form-control" name="listener">
                     <option selected value="">Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Table Topic Master</label>
                   <select class="form-control" name="tbl-topic-master">
                     <option selected value="">Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Speaker 1</label>
                   <select class="form-control" name="speaker-1">
                     <option selected value="">Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Evaluator 1</label>
                   <select class="form-control" name="evaluator-1">
                     <option selected value="">Choose...</option>
                    <?php
                      foreach($memberNameSet as $member) :
                        echo "<option value=\"" . htmlspecialchars($member['Name']) . "\"";
                        echo ">" . htmlspecialchars($member['Name']) . "</option>";
                      endforeach;
                    ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label>Any additional comments?</label>
                   <textarea name="agenda-comments" class="form-control"></textarea>
                 </div>
               <input type="submit" name="create-agenda" class="btn btn-default" value="Create Agenda">
              </form>
             </div>
           </div>
          <?php mysqli_free_result($memberNameSet); ?>
        </div>
       </div>
    </div>
  </section>
  <?php include(SHARED_PATH . '/footer.php'); ?>
