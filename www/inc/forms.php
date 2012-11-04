<?php

function login_form(){
  ?>
<form class="form-horizontal" method="post" action="">
  <input type="hidden" name="exe" value="login" />
  <div class="control-group">
    <label class="control-label">Username</label>
    <div class="controls">
      <input type="text" name="username" placeholder="Username" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Password</label>
    <div class="controls">
      <input type="password" name="password" placeholder="Password" />
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>
  </div>
</form>
  <?php
}

function register_form(){
  ?>
<form class="form-horizontal" method="post" action="">
  <input type="hidden" name="exe" value="register" />
  <div class="control-group">
    <label class="control-label">Username</label>
    <div class="controls">
      <input type="text" name="username" placeholder="Username"<?php if(isset($_POST['username'])){echo " value=\"".$_POST['username']."\"";} ?> />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Password</label>
    <div class="controls">
      <input type="password" name="password1" placeholder="Password" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Confirm Password</label>
    <div class="controls">
      <input type="password" name="password2" placeholder="Password" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Repository Name</label>
    <div class="controls">
      <input type="text" name="repo_name" value="<?php echo (isset($_POST['repo_name'])?$_POST['repo_name']:"GitHub Tycoon Game"); ?>" />
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

function logout_form(){
  ?>
<h4>Are you sure you want to log out?</h4>
<form method="POST" action="">
  <input type="hidden" name="exe" value="logout" />
  <button class="btn btn-danger" type="submit">I'm Sure!</button>
</form>
  <?php
}