<!-- logout page !-->
<?php
session_start();
if(array_key_exists('username', $_SESSION )){
    $username = $_SESSION['username'];
    session_unset();
    session_destroy();// kill session
}
else
	   {echo "<p>Error logging out!</p>";} 
//redirect to login page
header('Location: login.php');

?>


