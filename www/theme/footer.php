        </div> <!-- /row -->
      </div> <!-- /container -->
    </div> <!-- /wrap -->

    <div id="footer">
      <div class="container">
        <p class="muted credit">
          This game is brought to you by <a target="_blank" href="http://josefnpat.com">josefnpat</a>
            <a href="mailto:seppi@josefnpat.com"><i class="icon-envelope"></i></a>
            <a target="_blank" href="https://github.com/josefnpat"><i class="icon-github"></i></a>
            <a target="_blank" href="https://twitter.com/josefnpat"><i class="icon-twitter"></i></a>
          and
          <a target="_blank" href="http://peterrstanley.com/">peterrstanley</a>
            <a target="_blank" href="https://github.com/peterrstanley"><i class="icon-github"></i></a>
            <a target="_blank" href="https://twitter.com/peterrstanley"><i class="icon-twitter"></i></a>
            <a target="_blank" href="https://www.facebook.com/peterrstanley"><i class="icon-facebook"></i></a>
          .
          git-<?php echo `git log --pretty=%h -1`; ?> &mdash;
          v<?php echo `git log --pretty=format:'' | wc -l`; ?>
        </p>
<?php
        if (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == "on") {
          echo "<p class='muted credit'>https &mdash; on</p>";
        } else {
          echo "<p class='muted credit'><a href='https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?page=$page'>Visit the https (self signed) version of this site.</a></p>";
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