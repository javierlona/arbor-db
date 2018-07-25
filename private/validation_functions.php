<!-- Insert Validation Functions Here -->
<?php
function is_blank($value) {
  return !isset($value) || trim($value) === '';
}
?>
