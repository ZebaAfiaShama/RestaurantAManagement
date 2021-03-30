<?php 
//Start the Session
session_start();



// Create constant to store Non repeating values
define('SITEURL', 'http://localhost/git/RestaurantManagement/Restaurant/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'restaurant');
$conn=mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD ) or die (mysqli_error()); //database connection
$db_select =mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting database

?>