<?php

//include constants.php for SITEURL
include('../config/constants.php');
//1.Destroy the SESSION
session_destroy(); //unsets $_SESSION['user']

//2.REdirect to login page
header('location:'.SITEURL.'/admin/login.php');
?>