<!DOCTYPE html>
<html>
<head>
<title></title>
</head>

<body bgcolor="lightblue">

<?php
    $page_title = "Log In";
    include("header.php");
?>


    <form action="login.php" method"post">
    <table border="2" align="center" bgcolor="white">
    <tr>
    <td colspan="2" align="center">LOGIN</td>
    </tr>

    

    <tr>
    <td>Password:</td>
    <td><input type="password" name="password"></td>
    </tr>

    <tr>
    <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
    </tr>

    <tr>
    <td colspan="2" align="center"><A HREF="finding-fun-fredericksburg/register.php">REGISTER HERE</A></td>
    </tr>

    </table>
    </form>

<?php

if(!empty( $_POST)){
    if(isset($_POST['username']) && isset($_POST['password'])){
        include("credentials.php");
        include("connection.php");
        
        //username and password global variables
        $user = $_POST['username'];
        $pass = $_POST['password'];

        //connection to database
        $conn = new mysql_connect($host, $username, $password, $dbname);
        $stmt = $connection->prepare("SELECT * FROM registered_user WHERE usernam = '$user'");
        $stmt->execute();
        $result = $stmt->get_result();
            $usern = $result->fetch_object();
        //verify the password
        if(password_verify($_POST['password'], $usern->password)){
            $_SESSION['user_id']=$USER->ID;
        }
    }

}
?>





<?php
    include("footer.php");
?>

</body>
</html>