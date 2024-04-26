<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/users/login.css">

<div class="login-box">
   <center><h2>Enter login credentials</h2></center>
<?php flash('register_success'); ?>
  <form id="login-form" action="<?php echo URLROOT; ?>/users/login" method="POST">
    <div class="user-box">
    <input required="" type="text" id="email" name="email" class="custom-input <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                <span class="error-message"><?php echo $data['email_err']; ?></span>
      <label for="email">Email Address</label>
    </div>
    <div class="user-box">
    <input required="" type="password" id="password" name="password" class="custom-input <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                <span class="error-message"><?php echo $data['password_err']; ?></span>
      <label for="password">Password</label>
    </div><center>
    <a onclick="document.getElementById('login-form').submit();">
           LOGIN
       <span></span>
    </a></center>
  </form>
</div>
<div class="login-footer">
<?php require APPROOT . '/views/inc/footer.php'; ?>
</div>
