<?php
    $page_title = "Search";
    include("header.php");
?>

<form method="post" action="search-results.php" id="searchform">
    <input type="text" name="query">
    <input type="radio" name="food" value="food">Food
    <input type="radio" name="entertainment" value="entertainment">Entertainment
    <input type="radio" name="recreation" value="recreation">Recreation
    <input type="submit" name="submit" value="search">
</form>

<?php
    include("footer.php");
?>