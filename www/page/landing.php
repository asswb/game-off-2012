<form method=POST action="<? echo $_SERVER['PHP_SELF']; ?>">
  <input class="btn btn-primary" type="submit" value="Push this button to call the login exe!" />

  <input type="hidden" name="page" value="login" />
</form>
<? login_form(); ?>
