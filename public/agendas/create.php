<?php
  require_once('../../private/initialize.php');
  require_login();

  if($_SERVER['REQUEST_METHOD'] == 'POST'):
    $agenda = [];
    $agenda['agenda_id'] = $agendaID;
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

    $result = insert_agenda($agenda);
    $newAgendaID = mysqli_insert_id($db);
    header("Location: " . WWW_ROOT . "/agendas/show.php?agenda_id=" . $newAgendaID);
  else:
    header("Location: " . WWW_ROOT . "/agendas/new.php");
  endif;

?>
