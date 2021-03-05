<!-- updates database with booked activities for customers -->
<?php

include('dbconn.php');
 // set default values
$activityID = 0;  
$customerID = 0;   
$number_of_tickets = 0;             
 
// Checks for integer only
if(array_key_exists('activityID', $_REQUEST )){  //an error if key is not there
    $activityID = intval($_REQUEST['activityID']); //make sure integer only
}
else {echo "No Activ id!,<br />";}

if(array_key_exists('customerID', $_REQUEST )){  //an error if key is not there
    $customerID = intval($_REQUEST['customerID']); //make sure integer only
}
else { echo "No cust ID!,<br />";}

if(array_key_exists('number_of_tickets', $_REQUEST )){  //an error if key is not there
  $number_of_tickets = intval($_REQUEST['number_of_tickets']); //make sure integer only
}

else {echo "No tickets selected!,<br />";}

$errors = array(); 
//if number of tickets equal zero, display error
if (($number_of_tickets<=0)) { array_push($errors, "Please select nr of tickets"); }

// if zero errors, continue to update DB with booked activities
if (count($errors) == 0) {

//update DB booked activities
$sql = "INSERT INTO booked_activities (activityID, customerID, number_of_tickets) VALUES  (?, ?, ?)";
if($stmt = mysqli_prepare($conn, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "iii", $activityID, $customerID, $number_of_tickets);
    $queryresult = mysqli_stmt_execute($stmt); //returns boolean
}

else {
    echo "Could not prepare statement";
    echo "<h1><a href='index.php'>Return to home page</a> </h1>";}

if ($queryresult) 
{ echo "<h1>You have successfully made $queryresult booking! </h1>";
echo "<h1><a href='logged_in.php'>Return to my account</a> </h1>";}

else { echo "<h1>Booking failed! Check that booking does not already exist!</h1>";
     echo "<h1><a href='logged_in.php'>Return to my account</a> </h1>";}
 }

?>