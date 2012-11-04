<?php

function login_form(){
  ?>
<h2>Login</h2>
<form class="form-horizontal hero-center" method="post" action="">
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
<h2>Register</h2>
<form class="form-horizontal hero-center" method="post" action="">
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
<h2>Logout</h2>
<form class="form-horizontal hero-center" method="POST" action="">
  <h4>Are you sure you want to log out?</h4>
  <input type="hidden" name="exe" value="logout" />
  <div class="control-group">
    <label class="control-label"></label>
    <div class="controls">
      <button class="btn btn-danger" type="submit">I'm Sure!</button>
    </div>
  </div>
</form>
  <?php
}