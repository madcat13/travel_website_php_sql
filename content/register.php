<!-- registration page -->
<?php 
   //include register_DB.php to connect to DB and save new user details in DB
   include('register_DB.php') ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>User Registration</title>
      <link rel="stylesheet" type="text/css" href="../assets/css/style-registration.css">
   </head>
   <body>
    <!-- registration form- gets customer input, check for errors -->
      <div class="header">
         <h2>Please fill out the registration form</h2>
      </div>
      <form method="post" action="register.php">
         <!-- throw error if input is missing -->
         <?php include('errors.php'); ?>
         <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" >
         </div>
      <form method="post" action="register.php">
         <div class="input-group">
            <label>Name</label>
            <input type="text" name="customer_forename" >
         </div>
      <form method="post" action="register.php">
         <div class="input-group">
            <label>Surname</label>
            <input type="text" name="customer_surname" >
         </div>
      <form method="post" action="register.php">
         <div class="input-group">
            <label>Postcode</label>
            <input type="text" name="customer_postcode" >
         </div>
      <form method="post" action="register.php">
         <div class="input-group">
            <label>First Line of Address</label>
            <input type="text" name="customer_address1" >
         </div>
      <form method="post" action="register.php">
         <div class="input-group">
            <label>Second Line of Address</label>
            <input type="text" name="customer_address2" >
         </div>
      <form method="post" action="register.php">
         <div class="input-group">
            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" >
         </div>
         <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
         </div>
         <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password_2">
         </div>
         <div class="input-group">
            <button target="_blank" type="submit" class="button" name="reg_user" >Register</button>
         </div>
        <!-- link for customers who have already registered -->
         <p>
            Already hold an account? <a href="login.php">Sign in </a>
         </p>
      </form>
   </body>
</html>