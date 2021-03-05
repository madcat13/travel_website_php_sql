<!-- login page -->
<p>
   <a href="index.php">Return to Home page</a>
</p>
<!-- connects to database -->
<?php
   include("dbconn.php");
   ?>
<link rel ="stylesheet" href="../assets/css/login_css.css">
<h2 align="center">You have been successfully registered! <br />Please log in below</h2>
<!-- connects to 'dologin' to authenticate registered users  -->
<form method= "post" action = "dologin.php">
   <div class="input-group">
      Username:
      <input type= "text" name="username" /><br />
      Password:
      <input type= "password" name="password_hash" />
      <input type="submit" value="Login" class="button" />
   </div>
</form>