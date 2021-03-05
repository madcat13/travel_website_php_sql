<link rel="stylesheet" type="text/css" href="../assets/css/css_logged_in.css">
<div id=position>

<!-- connect to DB !-->
   <?php
      include "dbconn.php";
      //dispaly customer details if login has been successful
      session_start();
      if (array_key_exists('username', $_SESSION)) 
      { 
        $username = $_SESSION['username'];
        echo "<div id=details><p><h3>Welcome to booking page $username!<h3/><br></div> </p>";
      } 
      else 
        { echo "Error logging in!";}
    ?>

</div>
<!-- link to logout !-->
<div id=logout>
   <br />
   <a href="logout.php">Logout</a>
   <br />    
</div>
<br/>
<br/>

<?php
   $data = $username;
   //create a template
   $sql = "SELECT * FROM customers WHERE username = ?;";
   //create a prepared statement
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql))

   { echo "SQL statement failed!<br>";} 

   else {
         mysqli_stmt_bind_param($stmt, "s", $data);
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         //fetches customer details if query successful
         if ($row = mysqli_fetch_assoc($result)) 
          {
            $customerID = $row['customerID'];
            $customer_forename = $row['customer_forename'];
            $customer_surname = $row['customer_surname'];
            //print customer info pulled from DB
             echo "<div id=details>Your details:
                    <br/>Customer ID:
                    $customerID <br/>
                    Name:
                    $customer_forename <br/>
                    Surname:
                    $customer_surname <br/></div>";
          } 

       else 
        { echo "<p>customer  ID:$customerID is not in the database</p>";}
   
       $data = $customerID;
       $sql = "SELECT * FROM booked_activities WHERE customerID = ?;";
       //prepare prepared statement
       $stmt = mysqli_stmt_init($conn);
   
       if (!mysqli_stmt_prepare($stmt, $sql)) 
       {echo "SQL statement failed!<br>";} 

       else 
       {
           mysqli_stmt_bind_param($stmt, "s", $data);
           mysqli_stmt_execute($stmt);
           $result = mysqli_stmt_get_result($stmt);
           //fetches customer details
           if ($row = mysqli_fetch_assoc($result)) 
           {
               $customerID = $row['customerID'];
               $activityID = $row['activityID'];
   
               echo "<div id=details>My bookings:
                      <br/>Customer ID:
                       $customerID <br/>
                       Activity id:
                       $activityID <br/>
                     </div>";
           }
            
          else 
            { echo "<p>You have no active bookings! </p>";}
       
       }
   }
?>



<?php
   echo "<div id=details><h3>Click on the activity to make a booking</h3></div>";
   $sql = "SELECT * FROM activities";
   $queryresult = mysqli_query($conn, $sql); //Generate link to activities
   if ($queryresult) 
   {
       while ($currentrow = mysqli_fetch_assoc($queryresult)) 
       {
           $activityID = $currentrow['activityID'];
           $activity_name = $currentrow['activity_name'];
           $price = $currentrow['price']; 
           //passes through variables-activityId and logged in customerID
           echo "<div id=activities><h2><a  href=\"update.php?activityID=$activityID&customerID=$customerID\">$activity_name</a><h2><br><p>price ISK:$price<p><br></div>";
       }
   }
   ?>