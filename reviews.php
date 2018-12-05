<?php
    $page_title = "Reviews";
    include("header.php");
?>

<?php

    if(isset($_GET['id'])){
        $location_id = $_GET['id'];

        // connection.php connects to database.
        include("connection.php");

        $sql_select = "SELECT loc.name AS name, loc.street_address AS address, loc.zip_code AS zip, rev.date AS date, rev.rating AS rating, rev.review AS review, user.username AS username 
                        FROM location AS loc NATURAL JOIN review AS rev INNER JOIN registered_user AS user ON user.user_id = rev.user_id
                        WHERE loc.location_id = " . $location_id . " ORDER BY date DESC";
        
        $result = mysqli_query($connection, $sql_select);

        if (mysqli_num_rows($result) != 0){ // checks if location has reviews.
            $row = mysqli_fetch_assoc($result);
            echo "<h3>" . $row['name'] . " Reviews</h3>\n";
            echo "<p>" . $row['address'] . " Fredericksburg, VA, " . $row['zip'] . "</p>\n";
            echo "<ul>";
            echo "<li>" . $row['username'] . "<br>" . $row['date'] . "<br>";
                $rating = $row['rating'];
                while($rating != 0){
                    echo "*";
                    $rating--;
                }

                $review = $row['review'];

                if (!empty($review)){
                    echo "<br>" . $review . "</li>\n";
                }
                else{
                    echo "<br>No review provided. </li>\n";
                }
            while ($row = mysqli_fetch_assoc($result)){
                echo "<li>" . $row['username'] . "<br>" . $row['date'] . "<br>";
                $rating = $row['rating'];
                while($rating != 0){
                    echo "*";
                    $rating--;
                }

                $review = $row['review'];

                if (!empty($review)){
                    echo "<br>" . $review . "</li>\n";
                }
                else{
                    echo "<br>No review provided. </li>\n";
                }
                
            }
            echo "</ul>";
        }
    }
?>

<?php
    include("footer.php");
?>