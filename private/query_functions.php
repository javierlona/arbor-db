<?php
  function find_all_members() {
    // either pass it in as an argument or we call global in order to have access to it.
    global $db;
    $sql = "SELECT * FROM member ";
    $sql .= "ORDER BY member_name_last ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_latest_members() {
    global $db;
    $sql = "SELECT * FROM member ";
    $sql .= "ORDER BY member_join DESC ";
    $sql .= "LIMIT 3";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function count_all_members() {
    global $db;
    $sql = "SELECT COUNT(*) FROM member ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
    $count = $row[0];
    return $count;
  }

  function find_member_by_id($memberID) {
    global $db;

    $sql = "SELECT * FROM member ";
    $sql .= "WHERE member_id='" . $memberID . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $member = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $member; // Returns an assoc. array of an individual record
  }

  function find_member_by_name(){
    global $db;
    $sql = 'SELECT CONCAT(member_name_first," ",member_name_last) as "Name" ';
    $sql .= "FROM member ";
    $sql .= "ORDER BY member_name_last ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result; // Returns the whole table output as an array
  }

  function insert_member($member) {
    global $db;

    $sql = "INSERT INTO member ";
    $sql .= "(member_name_first, member_name_last, member_email, member_join, member_comments) ";
    $sql .= "VALUES (";
    $sql .= "'" . $member['member_name_first'] . "',";
    $sql .= "'" . $member['member_name_last'] . "',";
    $sql .= "'" . $member['member_email'] . "',";
    $sql .= "'" . $member['member_join'] . "',";
    $sql .= "'" . $member['member_comments'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if($result) :
      return true;
    else :
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    endif;
  }

  function update_member($member) {
    global $db;
    $sql = "UPDATE member SET ";
    $sql .= "member_name_first='" . $member['member_name_first'] . "', ";
    $sql .= "member_name_last='" . $member['member_name_last'] . "', ";
    $sql .= "member_email='" . $member['member_email'] . "', ";
    $sql .= "member_join='" . $member['member_join'] . "', ";
    $sql .= "member_comments='" . $member['member_comments'] . "' ";
    $sql .= "WHERE member_id='" . $member['member_id'] . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    if($result) :
      return true;
    else:
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    endif;
  }

  function delete_member($memberID) {
    global $db;
    $sql = "DELETE FROM member ";
    $sql .= "WHERE member_id='" . $memberID . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result) :
      return true;
    else :
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    endif;
  }

  function find_all_agendas() {
    global $db;
    $sql = "SELECT DATE_FORMAT(meeting_date, '%M %d, %Y') as 'date', agenda_id FROM agendas ";
    $sql .= "ORDER BY meeting_date DESC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function count_all_agendas() {
    global $db;
    $sql = "SELECT COUNT(*) FROM agendas ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
    $count = $row[0];
    return $count;
  }

  function find_agenda_by_id($agendaID) {
    global $db;
    $sql = "SELECT * FROM agendas ";
    $sql .= "WHERE agenda_id='" . $agendaID . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $agenda = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $agenda;
  }

  function insert_agenda($agenda) {
    global $db;
    $sql = "INSERT INTO agendas ";
    $sql .= "(meeting_date, toastmaster, invocation_pledge, general_evaluator, grammarian, timer, vote_counter, ah_counter, listener, table_topics_master, speaker_1, evaluator_1, agenda_comments) ";
    $sql .= "VALUES (";
    $sql .= "'" . $agenda['meeting_date'] . "',";
    $sql .= "'" . $agenda['toastmaster'] . "',";
    $sql .= "'" . $agenda['invocation_pledge'] . "',";
    $sql .= "'" . $agenda['general_evaluator'] . "',";
    $sql .= "'" . $agenda['grammarian'] . "',";
    $sql .= "'" . $agenda['timer'] . "',";
    $sql .= "'" . $agenda['vote_counter'] . "',";
    $sql .= "'" . $agenda['ah_counter'] . "',";
    $sql .= "'" . $agenda['listener'] . "',";
    $sql .= "'" . $agenda['table_topics_master'] . "',";
    $sql .= "'" . $agenda['speaker_1'] . "',";
    $sql .= "'" . $agenda['evaluator_1'] . "',";
    $sql .= "'" . $agenda['agenda_comments'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if($result) :
      return true;
    else :
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    endif;
  }

  function update_agenda($agenda) {
    global $db;
    $sql = "UPDATE agendas SET ";
    $sql .= "meeting_date='" . $agenda['meeting_date'] . "', ";
    $sql .= "toastmaster='" . $agenda['toastmaster'] . "', ";
    $sql .= "invocation_pledge='" . $agenda['invocation_pledge'] . "', ";
    $sql .= "general_evaluator='" . $agenda['general_evaluator'] . "', ";
    $sql .= "grammarian='" . $agenda['grammarian'] . "', ";
    $sql .= "timer='" . $agenda['timer'] . "', ";
    $sql .= "ah_counter='" . $agenda['ah_counter'] . "', ";
    $sql .= "listener='" . $agenda['listener'] . "', ";
    $sql .= "table_topics_master='" . $agenda['table_topics_master'] . "', ";
    $sql .= "speaker_1='" . $agenda['speaker_1'] . "', ";
    $sql .= "evaluator_1='" . $agenda['evaluator_1'] . "', ";
    $sql .= "agenda_comments='" . $agenda['agenda-comments'] . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    if($result) :
      return true;
    else:
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    endif;
  }

  function delete_agenda($agendaID) {
    global $db;
    $sql = "DELETE FROM agendas ";
    $sql .= "WHERE agenda_id='" . $agendaID . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result) :
      return true;
    else :
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    endif;
  }

  function find_speaker_roles($memberID){
    global $db;
    $sql = "SELECT meeting_date, agenda_id FROM agendas ";
    $sql .= "WHERE speaker_1 = (SELECT CONCAT(member_name_first,' ',member_name_last) as 'Name' ";
    $sql .= "FROM member WHERE member_id ='". $memberID . "') ";
    $sql .= "ORDER BY meeting_date DESC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_leadership_roles($memberID){
    global $db;
    $sql = "SELECT meeting_date, agenda_id FROM agendas ";
    $sql .= "WHERE speaker_1 != (SELECT CONCAT(member_name_first,' ',member_name_last) as 'Name' ";
    $sql .= "FROM member WHERE member_id ='". $memberID . "') ";
    $sql .= "ORDER BY meeting_date DESC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  // Admins

  // Find all admins, ordered last_name, first_name
  function find_all_admins() {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "ORDER BY last_name ASC, first_name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_admin_by_id($adminID) {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE admin_id='" . mysqli_real_escape_string($db, $adminID) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
  }

  function find_admin_by_username($username) {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='" . mysqli_real_escape_string($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
  }

  function insert_admin($admin) {
    global $db;

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO admins ";
    $sql .= "(first_name, last_name, email, username, hashed_password) ";
    $sql .= "VALUES (";
    $sql .= "'" . mysqli_real_escape_string($db, $admin['first_name']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $admin['last_name']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $admin['email']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $admin['username']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $hashed_password) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_admin($admin) {
    global $db;

    // If password was sent, then its required
    $password_sent = !is_blank($admin['password']);

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "UPDATE admins SET ";
    $sql .= "first_name='" . mysqli_real_escape_string($db, $admin['first_name']) . "', ";
    $sql .= "last_name='" . mysqli_real_escape_string($db, $admin['last_name']) . "', ";
    $sql .= "email='" . mysqli_real_escape_string($db, $admin['email']) . "', ";
    // If password was sent, then update the hashed password
    if($password_sent) {
      $sql .= "hashed_password='" . mysqli_real_escape_string($db, $hashed_password) . "', ";
    }
    $sql .= "username='" . mysqli_real_escape_string($db, $admin['username']) . "' ";
    $sql .= "WHERE admin_id='" . mysqli_real_escape_string($db, $admin['admin_id']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_admin($admin) {
    global $db;

    $sql = "DELETE FROM admins ";
    $sql .= "WHERE admin_id='" . mysqli_real_escape_string($db, $admin['id']) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }


?>
