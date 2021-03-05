
<link rel="stylesheet" type="text/css" href="../assets/css/style-registration.css">

<?php
//link to return back to logged in page
echo "<h1><a href='logged_in.php'>Return to my account</a> </h1>";

//user session - logged in
session_start();
//connect to DB
include('dbconn.php');
//sets default(dummy) values
$activityID = 0;
$customerID = 0;
$number_of_tickets = 0;

// Checks for integer values only
if(array_key_exists('activityID', $_REQUEST )){
    $activityID = intval($_REQUEST['activityID']);
}
else {echo "No activity id!<br />";}
 
echo "Activity code: $activityID <br />";


if(array_key_exists('customerID', $_REQUEST )){
    $customerID = intval($_REQUEST['customerID']);
}

else { echo "No customer id!<br />";}
 
//pulls selected activity and customer ID from the session through a prepared statement
if ($activityID){
	$sql = "SELECT * FROM activities, customers WHERE activityID= ? AND customerID= ?";  //
	if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ii", $activityID, $customerID,);
        mysqli_stmt_execute($stmt);
		$queryresult = mysqli_stmt_get_result($stmt);
	}

	else {echo "Could not prepare statement";}

   // fetch activityID, description and customer ID
    if ($queryresult) {
        if ($currentrow = mysqli_fetch_assoc($queryresult)) {
            $activityID =   $currentrow['activityID'];
            $description = $currentrow['description'];
            $customerID = $currentrow['customerID'];
            $price = $currentrow['price'];
            
            echo "Description: $description <br />";
            if(array_key_exists('number_of_tickets', $_REQUEST )){
    $number_of_tickets = intval($_REQUEST['$number_of_tickets']);
}
else {echo "Select number of tickets required below<br />";}
//get activity ID, customer ID and nr of tickets to update database table booked activities
            echo "<form action=\"updater.php\" method=\"get\"> <br />
                <p> Activity ID <p/>
                <input type=\"text\" name=\"activityID\" value=\"$activityID\"readonly />
                <p> Customer ID <p/>
                <input type=\"text\" name=\"customerID\" value=\"$customerID\"readonly />
                <p> Price per Ticket <p/>
                <input type=\"text\" name=\"price\" value=\"$price\"readonly />
                <p> Number of Tickets <p/>
                <input type=\"number\" name=\"number_of_tickets\" value=\"$number_of_tickets\" />
                <input type=\"submit\" value=\"Book Activity\" />
                <br />
                </form>";
   }

    } 
    else { echo "<p>Activity ID:$activityID is not in the database</p>";}
}
?>
