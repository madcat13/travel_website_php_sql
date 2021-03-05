<!-- server page -->
<!-- updates DB with new user info -->
<?php
session_start(); 

//declare 'dummy' variables
$username = "";
$customer_forename = "";
$customer_surname = "";
$customer_postcode = "";
$customer_address1 = "";
$customer_address2 = "";
$date_of_birth = "";
$password_1 = "";
$errors = array(); 

// connect to the database
include 'dbconn.php';

// user registration
if (isset($_POST['reg_user'])) 
{
        // get input from form, check that input value is string
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $customer_forename = mysqli_real_escape_string($conn,$_POST['customer_forename']);
        $customer_surname = mysqli_real_escape_string($conn,$_POST['customer_surname']);
        $customer_postcode = mysqli_real_escape_string($conn,$_POST['customer_postcode']);
        $customer_address1 = mysqli_real_escape_string($conn,$_POST['customer_address1']);
        $customer_address2 = mysqli_real_escape_string($conn,$_POST['customer_address2']);
        $date_of_birth = mysqli_real_escape_string($conn,$_POST['date_of_birth']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        // validate form
        // if values are missing, error message is displayed
    if (empty($username))
      { array_push($errors, "Username is required"); }

    if (empty($customer_forename)) 
      { array_push($errors, "Name is required"); }

    if (empty($customer_surname))
      { array_push($errors, "Surname is required"); }

    if (empty($customer_postcode))
      { array_push($errors, "Postcode is required"); }

    if (empty($customer_address1))
      { array_push($errors, "Please enter first line of your address"); }

    if (empty($customer_address2)) 
      { array_push($errors, "Please enter second line of your address"); }

    if (empty($customer_address2)) 
      { array_push($errors, "Please enter your date of birth"); }

    if (empty($password_1)) 
      { array_push($errors, "Password is required"); }

    //if passwords don't match display error
    if ($password_1 != $password_2) 
      { array_push($errors, "Passwords do not match"); }
      
    // make sure that customer has not already registered by checking username in the database
    $user_check_query = "SELECT * FROM customers WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $customer = mysqli_fetch_assoc($result);
    
    if ($customer) 
    { // if customer username already exists throw an error
      if ($customer['username'] === $username) 
      { array_push($errors, "Username already exists"); }
            // if customer doesn't enter username
      if ($customer['username'] === "") 
      { array_push($errors, "Username needed!"); }

    }
}

    // Complete registration if there are no errors and username field has been filled
    if (count($errors) == 0 and $username==True) 
    {//encrypt the password with sha1 prior to updating database
    	$password = sha1($password_1);
    	$query = "INSERT INTO customers (username, password_hash, customer_forename, customer_surname, customer_postcode, customer_address1, customer_address2, date_of_birth) 
    			  VALUES('$username', '$password','$customer_forename', '$customer_surname',
             '$customer_postcode', '$customer_address1', '$customer_address2', '$date_of_birth')";
       //get variables from the current session     
    	mysqli_query($conn, $query);
    	$_SESSION['username'] = $username;
      $_SESSION['customer_forename'] = $customer_forename;
      $_SESSION['customer_surname'] = $customer_surname;
      $_SESSION['customer_postcode'] = $customer_postcode;
      $_SESSION['customer_address1'] = $customer_address1;
      $_SESSION['customer_address2'] = $customer_address2;
      $_SESSION['date_of_birth'] = $date_of_birth;
      //redirect customer to login page after successful registration
      header('Location: login_after_reg.php'); 
    }

?>
<!-- link back to home page -->
<p>
      <a href="index.php">Home</a>
</p>
