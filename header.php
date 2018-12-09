<!DOCTYPE HTML>

<html>
    <head>
        <title><?php echo $page_title; ?></title> 
        <meta lang="en-US">
        <meta name="author" content="Team Gold">
        <!--<meta name="description" content=".">-->
        <link rel="stylesheet" href="./styles.css">
    </head>
    <?php session_start(); ?>

    <body>
    <div class="header">
    <ul>
        <li><a href="index.php">Finding Fun in Fredericksburg</a></li>
        <li><a href="search.php">search</a></li>
        <?php 
        if(isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"]){
            echo "<li><a href='account.php'>account</a></li>
            <li><a href='logout.php'>log out</a></li>";
        }
        else {
            echo "<li><a href='login.php'>log in</a></li>";
        }?>
    </ul>
    </div>
    <div class="content">