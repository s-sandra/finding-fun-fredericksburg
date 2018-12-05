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

<form action="register.php" method"post">
  <table border="2" align="center">
<tr>
<td colspan="2" alight="center">REGISTER</td>
</tr>

<tr>
<td>Full Name:</td>
<td><input type = "text" name = "name"></td>
</tr>

<tr>
<td>Username:</td>
<td><input type = "text" name = "username"></td>
</tr>

<tr>
<td>Password:</td>
<td><input type = "text" name = "password"></td>
</tr>
  
<tr>
<td>Choose a security question:</td>
<td><input type = "radio" name = "secquestion1">What is your favorite song?</td> <!---- users choose security questions from list of security questions in security_question table.--->
</tr>
  
<tr>
<td>Answer:</td>
<td><input type = "text" name = "answer"></td>
</tr>

<td colspan="2" align="center"><input type="submit" value="Submit"></td>
</tr>
</table>
</form>


<?php
include "credentials.php";
include "connection.php";
?>

<?php
include("footer.php");
?>

</body>
</html>