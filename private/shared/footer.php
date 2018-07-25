<footer id="footer">
  <p>Copyright Arbor TM Database, &copy; <?php echo date('Y'); ?></p>
</footer>
  </div>
</div>
</div>


  <script>CKEDITOR.replace( 'editor1' );</script>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="<?php echo WWW_ROOT; ?>/js/bootstrap.min.js"></script>

</body>
</html>
<?php
  db_disconnect($db);
?>
