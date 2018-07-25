<?php
  require_once('../../private/initialize.php');
  require_login();
  // create.php - a form processing page

  if($_SERVER['REQUEST_METHOD'] == 'POST') :
    $member = [];
    $member['member_id'] = $memberID;
    $member['member_join'] = $_POST['member-join-date'] ?? '';
    $member['member_name_first'] = $_POST['member-name-first'] ?? '';
    $member['member_name_last'] = $_POST['member-name-last'] ?? '';
    $member['member_email'] = $_POST['member-email'] ?? '';
    $member['member_comments'] = $_POST['member-comments'] ?? '';

    $result = insert_member($member);
    $newMemberID = mysqli_insert_id($db);
    header("Location: " . WWW_ROOT . "/members/show.php?member_id=" . $newMemberID);

  else:
    header("Location: " . WWW_ROOT . "/members/new.php");
  endif;
?>
