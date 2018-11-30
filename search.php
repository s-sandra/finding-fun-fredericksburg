<?php
    $page_title = "Search";
    include("header.php");
?>

<form method="post" action="search.php?results" id="searchform">
    <input type="checkbox" name="category_list[]" value="food"><label>Food</label>
    <input type="checkbox" name="category_list[]" value="entertainment"><label>Entertainment</label>
    <input type="checkbox" name="category_list[]" value="recreation"><label>Recreation</label><br>
    <input type="text" name="query">
    <input type="submit" name="submit" value="search">
</form>

<?php
    // checks to see if user hit submit and passed results as get super global.
    if(isset($_GET['results'])){

        // checks to see if user entered search phrase.
        $search = $_POST['query'];
        if(!empty($search)){
            $categories = "";
    
            // checks to see if user clicked on a category
            if (!empty($_POST['category_list'])){
                $categories = "category IN [";
                $lastElement = end($_POST['category_list'] );
                foreach($_POST['category_list'] as $category){
                    $categories = $categories . " '" . $category . "'";
                    if($category != $lastElement){
                        $categories = $categories . ", ";
                    }
                }
                $categories = $categories . "];";
            }
    
            // connection.php connects to database.
            include("connection.php");
            $sql_select = "SELECT loc.name AS name, loc.street_address AS address, loc.zip_code AS zip FROM location AS loc 
                            NATURAL JOIN location_category AS loc_cat INNER JOIN category AS cat
                            ON loc_cat.category_id = cat.category_id " . $categories;
            
            $sql_select = $sql_select . "WHERE loc.name LIKE ?";
            if (!empty($categories)){
                $sql_select = $sql_select . " AND " . $categories;
            }

            if ($prepared = mysqli_prepare($connection, $sql_select)){
                
                // s stands for string. Replaces ? in select statement with search variable.
				mysqli_stmt_bind_param($prepared, "s", $search);
				
				mysqli_stmt_execute($prepared);
				$result = mysqli_stmt_get_result($prepared);
                
                echo "<h3>Search results for '" . $search . "'</h3>\n";
                echo "<ul>";

				// Prints out search results as unordered list items.
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<li>" . $row["name"] . " | Average rating: <br>" . $row['address'] . " Fredericksburg, VA, " . $row['zip'] . "</li>\n";
                }
                
                echo "</ul>";
            }
        }
        else {
            echo "<p>Please enter a search phrase.</p>";
        }
    }
?>

<?php
    include("footer.php");
?>