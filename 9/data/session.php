<?php
session_start();
if (!isset($_SESSION["pages_count"])) {
    $_SESSION["pages_count"] = 0;
    $_SESSION["start_time"] = strtotime('now');
    $_SESSION['loggedIn'] = false;
}

$_SESSION["visit_time"] = strtotime('now');
$_SESSION["visit_time"] -=  $_SESSION["start_time"];

$_SESSION["pages_count"]++;