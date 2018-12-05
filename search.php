<?php
    $page_title = "Search";
    include("header.php");
?>

<form method="post" action="search.php?results" id="searchform">
    <input type="checkbox" name="category_list[]" value="food"><label>Food</label>
    <input type="checkbox" name="category_list[]" value="entertainment"><label>Entertainment</label>
    <input type="checkbox" name="category_list[]" value="recreation"><label>Recreation</label><br>
    <input type="checkbox" name="category_list[]" value="attractions"><label>Attractions</label><br>
    <input type="checkbox" name="category_list[]" value="shopping"><label>Shopping</label><br>
    <input type="text" name="query">
    <input type="submit" name="submit" value="search">
</form>

<?php
    // checks to see if user hit submit and passed results as get super global.
    if(isset($_GET['results'])){

        $categories = "";
    
         // checks to see if user clicked on a category
        if (!empty($_POST['category_list'])){
            $categories = "cat.name IN (";
            $category_list = implode(" OR ", $_POST['category_list']);
            $lastElement = end($_POST['category_list'] );
            foreach($_POST['category_list'] as $category){
                $categories = $categories . " '" . $category . "'";
                if($category != $lastElement){
                     $categories = $categories . ", ";
                }
            }
            $categories = $categories . ")";
        }
    
        $sql_select = "";
        $search = $_POST['query'];

        // if the user entered a search phrase.
        if(!empty($search) || !empty($categories) ){

            if (!empty($search)){
                $sql_select = "SELECT ROUND(AVG(rev.rating)) AS avg, loc.location_id AS id, loc.description AS description, loc.name AS name, loc.street_address AS address, loc.zip_code AS zip 
                                FROM location AS loc NATURAL JOIN location_category AS loc_cat INNER JOIN category AS cat ON loc_cat.category_id = cat.category_id 
                                INNER JOIN review as rev ON loc.location_id = rev.location_id
                                WHERE loc.name LIKE ? OR loc.description LIKE ? GROUP BY rev.location_id ORDER BY avg DESC";
                
                if (!empty($categories)){
                    $sql_select = $sql_select . " AND " . $categories;
                }
            }
            else {
                $sql_select = "SELECT ROUND(AVG(rev.rating)) AS avg, loc.location_id AS id, loc.description AS description, loc.name AS name, loc.street_address AS address, loc.zip_code AS zip, cat.name AS category 
                            FROM location AS loc NATURAL JOIN location_category AS loc_cat INNER JOIN category AS cat
                            ON loc_cat.category_id = cat.category_id 
                            INNER JOIN review as rev ON loc.location_id = rev.location_id
                            WHERE " . $categories . " GROUP BY rev.location_id ORDER BY avg DESC";
            }

        }

        if (!empty($sql_select)) {

            // connection.php connects to database.
            include("connection.php");

            if(!empty($search)){
                if ($prepared = mysqli_prepare($connection, $sql_select)){
                    // s stands for string. Replaces ? in select statement with search variable.
                    echo "<h3>Search results for '" . $search . "'</h3>\n";
                    $search = "%" . $search . "%";
                    mysqli_stmt_bind_param($prepared, "ss", $search, $search);
                    mysqli_stmt_execute($prepared);
				    $result = mysqli_stmt_get_result($prepared);
                }
            }
            else{
                $result = mysqli_query($connection, $sql_select);
                echo "<h3>Search results for '" . $category_list . "'</h3>\n";
            }
                
            echo "<ul>";

			// Prints out search results as unordered list items.
			while ($row = mysqli_fetch_assoc($result)) {

                if (!empty($row['name'])){ // checks if result returned any locations.
                    echo "<li>" . $row['name'] . " | Average rating: " . $row['avg'] . " stars<br>" . $row['address'] . " Fredericksburg, VA, " . $row['zip'] . "<br>" . $row['description'] . "</li>\n";
                    if(isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"]){
                        echo "<a href='rate.php'>rate</a>"; // links to rate form if user is logged in.
                    }
                    echo "<a href=reviews.php?id=" . $row['id'] . ">see reviews</a></li>"; // links to reviews for that search result.
                }
            }
                
            echo "</ul>";
        }
        else {
            echo "<p>Please enter a search phrase or choose a category.</p>";
        }
    }
?>

<?php
    include("footer.php");
?>