<!DOCTYPE html>
<html lang="en">
      <div class="home1">
         <left>
            <header><a href="index.php">Home</a></header>
         </left>
      </div>
      <!-- include header to get search terms !-->
      <?php
         include 'header.php';
         ?>
      <link rel ="stylesheet" href="../assets/css/search.css">
      <div id=search>
         <?php
            if (isset($_POST['submit-search'])) 
            {
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                //sql search query
                $sql = "SELECT * FROM activities WHERE activity_name
                LIKE '%$search%' OR description
                LIKE '%$search%' OR location LIKE '%$search%'";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);
                echo "<h3>Click below to view results</br>
                Number of results:".$queryResult."</h3>";
                // if search results greater than 0, display the page with the matched results
                if($queryResult > 0) 
                {
                    while($row = mysqli_fetch_assoc($result))
                    { 
                        echo "<a href='activitiespage.php?title=".$row['activity_name']."&description=".$row['description']."'</a>
                            <h3>".$row['activity_name']."</h3>
                            <p>".$row['description']."</p>
                            <p>".$row['location']."</p>
                            ";
                    }
                }
            
                else 
                {
                    echo "No results!";
                }
            }
            ?>
   </div>
</html>