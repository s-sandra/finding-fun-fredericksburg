<!DOCTYPE html>
<html>
<head>
<title></title>
</head>

<body bgcolor=lightblue">

<?php
    $page_title = "Log In";
    include("header.php");
?>

<form action="register.php" method"post">
  <table border="2" align="center" bgcolor="white">
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
<td>Security Question:</td>
<td><input type = "text" name = "secquestion"></td>
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
