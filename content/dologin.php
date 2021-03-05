<!-- authenticate registered user !-->
<html>
<link rel="stylesheet" type="text/css" href="../assets/css/style-registration.css">
<!-- connect to DB !-->
<?php
include("dbconn.php");
// prevents data insertion of special characters.
$user = htmlspecialchars($_REQUEST['username']);
$pwd =  htmlspecialchars($_REQUEST['password_hash']);

// function to encrypt password 
function check_password($user, $pwd){
    global $conn;
    //encrypts password
    $pass = SHA1($pwd);
    //use prepared statement to prevent SQL injection
    $sql = "SELECT username from customers where username=? AND password_hash=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $user, $pass); 
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $pwdFromDB);

    if (mysqli_stmt_fetch($stmt)) {
        return $pwdFromDB;
    }
    else {
        return false;
    }
}


session_start();
//takes username from REQUEST and puts in a Session
if (array_key_exists('username', $_REQUEST ) && array_key_exists('password_hash', $_REQUEST ) ){
    $ok = check_password($user, $pwd);
    if ($ok) {
        //start session if user authenticated
        $_SESSION['username'] = $_REQUEST['username'];
         echo "Success: Username $user, Password >>$pwd<< OK: >>$ok<< <br />";
        header('Location: logged_in.php');
    }
    else {
         echo "<p>Incorrect Username or Password! Please try again! </p> <br />";
    }
}

?>
<!-- link to return back to login page if login unsuccessful !-->
    <p>
        Return to <a href="login.php">Sign in</a>
    </p>
</html>