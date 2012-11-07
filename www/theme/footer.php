        </div> <!-- /row -->
      </div> <!-- /container -->
    </div> <!-- /wrap -->

    <div id="footer">
      <div class="container">
        <p class="muted credit">
          This game is brought to you by <a href="https://github.com/josefnpat">josefnpat</a> and <a href="https://github.com/peterrstanley">peterrstanley</a>.
          git-<?php echo `git log --pretty=%h -1`; ?> &mdash;
          v<?php echo `git log --pretty=format:'' | wc -l`; ?>
        </p>
<?php
        if (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == "on") {
          echo "<p class='muted credit'>https &mdash; on</p>";
        } else {
          echo "<p class='muted credit'><a href='https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."'>Visit the https (self signed) version of this site.</a></p>";
        }
?>
      </div>
    </div>

    <!-- Le javascript
    ================================================== -->
    <!--
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap-transition.js"></script>
    <script src="bootstrap/js/bootstrap-alert.js"></script>
    <script src="bootstrap/js/bootstrap-modal.js"></script>
    <script src="bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="bootstrap/js/bootstrap-tab.js"></script>
    <script src="bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="bootstrap/js/bootstrap-popover.js"></script>
    <script src="bootstrap/js/bootstrap-button.js"></script>
    <script src="bootstrap/js/bootstrap-collapse.js"></script>
    <script src="bootstrap/js/bootstrap-carousel.js"></script>
    <script src="bootstrap/js/bootstrap-typeahead.js"></script>
    -->
  </body>
</html>