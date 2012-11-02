<?php

function login_form(){
  ?>
  <div>
    <form action="" method="POST">
      <input type="hidden" id="exe" name="exe" value="login" />
      <div>Username:</div>
      <div><input type="text" class="" id="username" name="username" value="" /></div>
      <div>Password</div>
      <div><input type="password" class="" id="password" name="password" value="" /></div>
      <div><input type="submit" class="" id="login" name="login" value="Login" /></div>
    </form>
    <form action="" method="POST">
     <input type="hidden" id="page" name="page" value="register" />
     <div><input type="submit" id="register" name="register" value="Register Here" /></div>
    </form>
  </div>
  <?php
}

function register_form(){
  ?>
  <div>
    <form action="" method="POST">
      <input type="hidden" id="exe" name="exe" value="register" />
      <div>Username:</div>
      <div><input type="text" class="" id="username" name="username" value="" /></div>
      <div>Password</div>
      <div><input type="password" class="" id="password" name="password" value="" /></div>
      <div>Retype Password:</div>
      <div><input type="password" class="" id="password2" name="password2" value="" /></div>      
      <div><input type="submit" class="" id="login" name="login" value="Register" /></div>
    </form>
  </div>
  <?php
}
?>
