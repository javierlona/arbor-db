<?php require_once('../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $pageTitle = 'Agendas'; ?>
<?php $pageSubtitle = 'View All Agendas' ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
  $agendaSet = find_all_agendas();
?>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?php echo WWW_ROOT; ?>">Dashboard</a></li>
        <li class="active">Agendas</li>
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
               <h3 class="panel-title">Agendas</h3>
             </div>
             <div class="panel-body">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Filter Agendas...">
                  </div>
                </div>
              </br>
              <table class="table table-striped table-hover">
                <tr>
                  <th>Date</th>
                  <th>Choose an Option</th>
                </tr>
                <?php while ($agenda = mysqli_fetch_assoc($agendaSet)) : ?>
                <tr>
                  <td><?php echo htmlspecialchars($agenda['date']); ?></td>
                  <td>
                    <a class="btn btn-warning" href="<?php echo WWW_ROOT . '/agendas/show.php?agenda_id=' . htmlspecialchars(urlencode($agenda['agenda_id'])); ?>">View</a>
                    <a class="btn btn-default" href="<?php echo WWW_ROOT . '/agendas/edit.php?agenda_id=' . htmlspecialchars(urlencode($agenda['agenda_id'])); ?>">Edit</a>
                    <a class="btn btn-danger" href="<?php echo WWW_ROOT . '/agendas/delete.php?agenda_id=' . htmlspecialchars(urlencode($agenda['agenda_id'])); ?>">Delete</a>
                  </td>
                </tr>
                <?php endwhile; ?>
              </table>
                <?php mysqli_free_result($agendaSet); ?>
              </div>
             </div>
           </div>

        </div>
      </div> <!-- .row -->

    </div>
  </section>
<?php include(SHARED_PATH . '/footer.php'); ?>
