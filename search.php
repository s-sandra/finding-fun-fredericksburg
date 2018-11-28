<?php
    $page_title = "Search";
    include("header.php");
?>

<form method="post" action="search.php?results" id="searchform">
    <input type="checkbox" name="category_list[]" value="food">Food
    <input type="checkbox" name="category_list[]" value="entertainment">Entertainment
    <input type="checkbox" name="category_list[]" value="recreation">Recreation<br>
    <input type="text" name="query">
    <input type="submit" name="submit" value="search">
</form>

<?php
    if(isset($_GET['results'])){
        $category = "nothing";
    }
?>

<?php
    include("footer.php");
?>