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
<form class="form-horizontal" method="post" action="">
  <input type="hidden" name="exe" value="register" />
  <div class="control-group">
    <label class="control-label">Username</label>
    <div class="controls">
      <input type="text" name="username" placeholder="Username"<?php if(isset($_POST['username'])){echo " value=\"".$_POST['username']."\"";} ?>>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Password</label>
    <div class="controls">
      <input type="password" name="password1" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Confirm Password</label>
    <div class="controls">
      <input type="password" name="password2" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Repository Name</label>
    <div class="controls">
      <input type="text" name="repo_name" value="<?php echo (isset($_POST['repo_name'])?$_POST['repo_name']:"GitHub Tycoon Game"); ?>">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Register</button>
    </div>
  </div>
</form>
  <?php
}
?>
