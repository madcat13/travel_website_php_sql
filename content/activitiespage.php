<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset ="utf-8">
      <title>Activities page</title>
      <!--allows the edge of website to follow the edge of the device, //scales content in device- allows the website to be responsive -->
      <meta name ="viewpoint" content="width=device-width, inital-scale=1.0">
      <link rel ="stylesheet" href="../assets/css/style.css">
   </head>
   <body>
      <div class="home1">
         <header><a href="index.php">Home</a></header>
      </div>
      <div class="home1">
         <header>
            <?php 
               // the search bar
               include 'header.php';
               ?>
            <form action ="search.php" method="POST">
               <input type ="text" name= "search" placeholder="Search">
               <button type="submit" name= "submit-search">Search</button>
            </form>
            <?php
               $sql= "SELECT * FROM activities";
               $result = mysqli_query($conn, $sql);
               $queryResults = mysqli_num_rows($result);
               
               if ($queryResults > 0) {
                   while ($row = mysqli_fetch_assoc($result)){
                       
                   }
               }
               
               
               ?>
         </header>
      </div>
      <center>
         <div id="banner">Things to do </div>
      </center>
      <div id="navbar">
         <nav>
            <ul>
               <li> Culture</li>
               <li> Events</li>
               <li> Transport</li>
               <li> Eat and Drink</li>
               <li><a href="register.php">Book Activity</a></li>
               <li>Weather</li>
            </ul>
         </nav>
      </div>
      <img class ="img-welcome" src ="../assets/images/mountain.jpg" alt ="Welcome">
      <div class="wrapper">
         <div class ="container1">
            <div class = "item2">
               <div class = "item2text">
                  <?php
                     // pulls activities info from database for specific activity
                     $sql= "SELECT * FROM activities WHERE activity_name = 'City Tour'";
                     
                     $queryresult = mysqli_query($conn, $sql);
                     
                     if ($queryresult)  {
                         while  ($currentrow = mysqli_fetch_assoc($queryresult)) {   
                             $activity_name = $currentrow['activity_name'];
                             $description = $currentrow['description'];
                             $location = $currentrow['location'];
                             $price = $currentrow['price'];
                         echo "<h2>$activity_name</h2>";
                         echo "<p>$description</p>";
                         echo "<p>Location:$location</p>";
                         echo "<p>Price:$price ISK</p>";
                         }
                     }
                     
                     ?>
                  <img class= photo2 src=../assets/images/city_tour.jfif alt="City" width="50" height="50">
               </div>
               <!-- closes item2text  div -->
            </div>
            <!-- closes item2  div -->
            <div class = "item2">
               <div class = "item2text">
                  <?php
                     $sql= "SELECT * FROM activities WHERE activity_name = 'Whale Watching'";
                     
                     $queryresult = mysqli_query($conn, $sql);
                     
                     if ($queryresult)  {
                         while  ($currentrow = mysqli_fetch_assoc($queryresult)) {   
                           $activity_name = $currentrow['activity_name'];
                             $description = $currentrow['description'];
                             $location = $currentrow['location'];
                             $price = $currentrow['price'];
                         echo "<h2>$activity_name</h2>";
                         echo "<p>$description</p>";
                         echo "<p>Location:$location</p>";
                         echo "<p>Price:$price ISK</p>";
                         }
                     }
                     
                     ?>
                  <img class= photo2 src=../assets/images/whale2.jfif alt="Whale" width="50" height="50">
               </div>
               <!-- closes item2text  div -->
            </div>
            <!-- closes item2  div -->
            <div class = "item2">
               <div class = "item2text">
                  <?php
                     $sql= "SELECT * FROM activities WHERE activity_name = 'Discover Geysers'";
                     
                     $queryresult = mysqli_query($conn, $sql);
                     
                     if ($queryresult)  {
                         while  ($currentrow = mysqli_fetch_assoc($queryresult)) {   
                             $activity_name = $currentrow['activity_name'];
                             $description = $currentrow['description'];
                             $location = $currentrow['location'];
                             $price = $currentrow['price'];
                         echo "<h2>$activity_name</h2>";
                         echo "<p>$description</p>";
                         echo "<p>Location:$location</p>";
                         echo "<p>Price:$price ISK</p>";
                         }
                     }
                     
                     ?>
                  <img class= photo2 src=../assets/images/geyser.jfif alt="Geyser" width="50" height="50">
               </div>
               <!-- closes item2text  div -->
            </div>
            <!-- closes item2  div -->
         </div>
         <!-- closes container1  div -->
         <div class ="container2">
            <div class = "item2">
               <div class = "item2text">
                  <?php
                     $sql= "SELECT * FROM activities WHERE activity_name = 'Northern Lights'";
                     
                     $queryresult = mysqli_query($conn, $sql);
                     
                     if ($queryresult)  {
                         while  ($currentrow = mysqli_fetch_assoc($queryresult)) {   
                           $activity_name = $currentrow['activity_name'];
                             $description = $currentrow['description'];
                             $location = $currentrow['location'];
                             $price = $currentrow['price'];
                         echo "<h2>$activity_name</h2>";
                         echo "<p>$description</p>";
                         echo "<p>Location:$location</p>";
                         echo "<p>Price:$price ISK</p>";
                         }
                     }
                     
                     ?>
                  <img class= photo2 src=../assets/images/northern_l2.jfif alt="Northern" width="50" height="50">
               </div>
               <!-- closes item2text  div -->
            </div>
            <!-- closes item2  div -->
            <div class = "item2">
               <div class = "item2text">
                  <?php
                     $sql= "SELECT * FROM activities WHERE activity_name = 'Hot Spring Spa'";
                     
                     $queryresult = mysqli_query($conn, $sql);
                     
                     if ($queryresult)  {
                         while  ($currentrow = mysqli_fetch_assoc($queryresult)) {   
                             $activity_name = $currentrow['activity_name'];
                             $description = $currentrow['description'];
                             $location = $currentrow['location'];
                             $price = $currentrow['price'];
                         echo "<h2>$activity_name</h2>";
                         echo "<p>$description</p>";
                         echo "<p>Location:$location</p>";
                         echo "<p>Price:$price ISK</p>";
                         }
                     }
                     
                     ?>
                  <img class= photo2 src=../assets/images/spa2.jfif alt="Spa" width="50" height="50">
               </div>
               <!-- closes item2text  div -->
            </div>
            <!-- closes item2  div -->
            <div class = "item2">
               <div class = "item2text">
                  <?php
                     $sql= "SELECT * FROM activities WHERE activity_name = 'Icelandic Volcano Experience'";
                     
                     $queryresult = mysqli_query($conn, $sql);
                     
                     if ($queryresult)  {
                         while  ($currentrow = mysqli_fetch_assoc($queryresult)) {   
                             $activity_name = $currentrow['activity_name'];
                             $description = $currentrow['description'];
                             $location = $currentrow['location'];
                             $price = $currentrow['price'];
                         echo "<h2>$activity_name</h2>";
                         echo "<p>$description</p>";
                         echo "<p>Location:$location</p>";
                         echo "<p>Price:$price ISK</p>";
                         }
                     }
                     
                     ?>
                  <img class= photo2 src=../assets/images/volcano.jfif alt="Volcano" width="50" height="50">
               </div>
               <!-- closes item2text  div -->
            </div>
            <!-- closes item2  div -->
         </div>
         <!-- closes container2  div -->
      </div>
      <!-- closes wrapper  div -->
      <div id="footer1">
         <center>
            <ul id= "footer-list">
               <li>Contacts</li>
               <li>Legal </li>
               <li>Complaints </li>
               <li>Media </li>
               <li>Advertise </li>
               <li>Funding</li>
            </ul>
         </center>
      </div>
   </body>
</html>