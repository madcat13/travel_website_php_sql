<!-- login page -->
<!-- redirects to home page -->
   <p>
      <a href="index.php">Return to home page</a>
   </p>
   <!-- connects to database -->
   <?php
      include("dbconn.php");
    ?>

   <link rel ="stylesheet" href="../assets/css/login_css.css">
   <h1 align="center">Please log in to book activities</h1>
   <!-- captures user input(username and password) and connects to 'dologin' to authenticate registered users  -->
   <form method= "post" action = "dologin.php">
      <div class="input-group">
         Username:
         <input type= "text" name="username" /><br />
         Password:
         <input type= "password" name="password_hash" />
         <input type="submit" value="Login" class="button" />
      </div>
      <!-- redirects to 'register' to add new users to database  -->
      <p>
         Not Registered? <a href="register.php">Sign up here</a>
      </p>
   </form>
