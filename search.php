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
    if(isset($_GET['results'])){
        if (!empty($_POST['category_list'])){
            $categories = "WHERE category IN [";
            $lastElement = end($_POST['category_list'] );
            foreach($_POST['category_list'] as $category){
                $categories = $categories . " '" . $category . "'";
                if($category != $lastElement){
                    $categories = $categories . ", ";
                }
            }
            $categories = $categories . "];";
        }
    }
?>

<?php
    include("footer.php");
?>