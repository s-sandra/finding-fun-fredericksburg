<!DOCTYPE html>
<html>
<head>
<title></title>
</head>

<body>

<?php
    $page_title = "Log In";
    include("header.php");
?>


    <form action="login.php" method"post">
    <table border="2" align="center">
    <tr>
    <td colspan="2" align="center">LOGIN</td>
    </tr>

    

    <tr>
    <td>Username:</td>
    <td><input type="username" name="username"></td>
    </tr>

    <tr>
    <td>Password:</td>
    <td><input type="password" name="password"></td>
    </tr>

    <tr>
    <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
    </tr>

    <tr>
    <td colspan="2" align="center">Not a member? <A HREF="register.php">Register here.</A></td>
    </tr>

    </table>
    </form>

<?php

if(!empty( $_POST)){
    if(isset($_POST['username']) && isset($_POST['password'])){
        include("credentials.php");
        
        //username and password global variables
        $user = $_POST['username'];
        $pass = $_POST['password'];

        //connection to database
        include("connection.php");
        $stmt = $connection->prepare("SELECT * FROM registered_user WHERE username = '$user'");
        $stmt->execute();
        $result = $stmt->get_result();
            $usern = $result->fetch_object();
        //verify the password
        if(password_verify($_POST['password'], $usern->password)){
            $_SESSION['user_id']=$USER->ID;
            $_SESSION['LoggedIn'] = True;
        }
    }

}
?>





<?php
    include("footer.php");
?>

</body>
</html>