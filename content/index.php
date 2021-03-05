
<!-- index page (Home) !-->
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset ="utf-8">
      <title>Welcome to Reykjavik</title>
      <!-- allows the edge of website to follow the edge of the device, //scales content in device- allows the website to be responsive !-->
      <meta name ="viewpoint" content="width=device-width, inital-scale=1.0">
      <link rel ="stylesheet" href="../assets/css/style.css">
   </head>
   <body>
      <div class="home1">
         <header><a href="index.php">Home</a></header>
      </div>
      <div class="home1">
         <header>
            <!-- header for the search bar !-->
            <?php 
               include 'header.php';
               ?>
            <form action ="search.php" method="POST">
               <input type ="text" name= "search" placeholder="Search">
               <button type="submit" name= "submit-search">Search</button>
            </form>
            <!-- search bar- searches for activities !-->
            <?php
               $sql= "SELECT * FROM activities";
               $result = mysqli_query($conn, $sql);
               $queryResults = mysqli_num_rows($result);
               if ($queryResults > 0) 
               {
                   while ($row = mysqli_fetch_assoc($result)){ }
               }
               ?>
         </header>
      </div>
      <center>
         <div id="banner">Welcome to Reykjavik! </div>
      </center>
      <div id="navbar">
         <nav>
            <ul>
               <li> About Reykjavik </li>
               <li> What to see</li>
               <li> <a href="activitiespage.php">Activities </a></li>
               <li> Eat and drink</li>
               <li> Search</li>
               <li> <a href="login.php">Login </a></li>
            </ul>
         </nav>
      </div>
      <img class ="img-welcome" src ="../assets/images/reyk2.jpg" alt ="Welcome">
      <div class="wrapper">
         <div class ="container1">
            <div class = "item1">
               <div class = "item1text">
                  <h2>The Sun Voyager</h2>
                  <p>The striking landmark was created by Icelandic sculptor Jon Gunnar Arnason.It is a dream boat and an ode to the sun. It represents the promise of undiscovered territory, a dream of hope and freedom. </p>
                  <img class= photo1 src=../assets/images/voyager2.jpg alt="Voyager" width="50" height="50">
               </div>
               <!-- closes item1text  div -->
            </div>
            <!-- closes item1  div -->
            <div class = "item2">
               <div class = "item2text">
                  <h2>Hallgrimskirkja Church</h2>
                  <p>The soaring modernist church was designed to resemble the basalt lava flows found in Iceland‘s natural landscape.</p>
                  <img class= photo2 src=../assets/images/church_grey.jpg alt="Hallgrimskirkja Church" width="50" height="50">
               </div>
               <!-- closes item2text  div -->
            </div>
            <!-- closes item2  div -->
         </div>
         <!-- closes container1  div -->
         <div class ="container2">
            <div class = "item2">
               <div class = "item2text">
                  <h2>The land of fire and ice</h2>
                  <p>Iceland is a sparsely populated country with one of the most geologically and volcanically active landscapes in the world, perfect for capturing some of the most striking landscape images on Earth.</p>
                  <img class= photo2 src=../assets/images/ice_fire2.jpg alt="The land of fire and ice" width="50" height="50">
               </div>
               <!-- closes item2text  div -->
            </div>
            <!-- closes item2  div -->
            <div class = "item2">
               <div class = "item2text">
                  <h2>Folklore</h2>
                  <p>Full of elves, trolls and “hidden people,” the folk tales of Iceland are made all the more fascinating because a majority of the population of 300,000 actually believes in them.</p>
                  <img class= photo2 src=../assets/images/elves.jpg alt="Folklore" width="50" height="50">
               </div>
               <!-- closes item2text  div -->
            </div>
            <!-- closes item2  div -->
            <div class = "item2">
               <div class = "item2text">
                  <h2>Icelandic Quisine</h2>
                  <p>Most restaurants in Iceland serve ‘fish of the day’ and the country is dotted with numerous seafood restaurants. Hákarl, or fermented shark, is the national dish of Iceland.</p>
                  <img class= photo2 src=../assets/images/fish.jfif alt="Fish" width="50" height="50">
               </div>
               <!-- closes item2text  div -->
            </div>
            <!-- closes item2  div -->
         </div>
         <!-- closes container2  div -->
      </div>
      <!-- closes wrapper  div -->
      <div id="footer1">
            <ul id= "footer-list">
               <li>Contacts</li>
               <li>Legal </li>
               <li>Complaints </li>
               <li>Media </li>
               <li>Advertise </li>
               <li>Funding</li>
            </ul>
      </div>
   </body>
</html>