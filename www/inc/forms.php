<?php

function login_form(){
  ?>
<h2>Login</h2>
<form class="form-horizontal hero-center" method="post" action="">
  <input type="hidden" name="exe" value="login" />
  <div class="control-group">
    <label class="control-label">Username</label>
    <div class="controls">
      <input type="text" name="username" placeholder="Username"<?php if(isset($_POST['username'])){echo " value=\"".$_POST['username']."\"";} ?> />
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

function setting_form(){
  global $user;
  ?>
<h2>Settings</h2>
<form class="form-horizontal hero-center" method="POST" action="">
  <input type="hidden" id="exe" name="exe" value="settings-update" />
  <div class="control-group">
    <label class="control-label">Repo Name:</label>
    <div class="controls">
      <input type="text" id="repo_name" name="repo_name" value="<?php echo (isset($_POST['repo_name'])?$_POST['repo_name']:$user->data['repo_name']); ?>" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Current Password:</label>
    <div class="controls">
      <input type="password" id="cur_password" name="cur_password" value="" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">New Password:</label>
    <div class="controls">
      <input type="password" id="new_password1" name="new_password1" value="" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Repeat New Password:</label>
    <div class="controls">
      <input type="password" id="new_password2" name="new_password2" value="" />
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>
  <?php
}
