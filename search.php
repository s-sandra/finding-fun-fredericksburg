<?php
    $page_title = "Search";
    include("header.php");
?>

<form method="post" action="search-results.php" id="searchform">
    <input type="checkbox" name="food" value="food">Food
    <input type="checkbox" name="entertainment" value="entertainment">Entertainment
    <input type="checkbox" name="recreation" value="recreation">Recreation<br>
    <input type="text" name="query">
    <input type="submit" name="submit" value="search">
</form>

<?php
    include("footer.php");
?>