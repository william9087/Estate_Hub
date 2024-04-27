<?php

include("configure.php");
include("create_table.php");
$connection = mysql_connect($host, $username, $password);
$userName = $_POST["username"];
$password = $_POST["password"];

mysql_select_db("assignment9") or die(mysql_error());
$query = "SELECT username, password FROM users WHERE username=\"$userName\" AND password=\"$password\"";
$num_rows = mysql_num_rows(mysql_query($query));
if ($num_rows != 0) {
    header("Location: main_menu.php");
    die();
} else {
    header("Location: login_failed.html");
}
die();

?>