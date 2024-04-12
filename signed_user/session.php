<?php
// TODO here must be a login and password as i think
session_start();

if (isset($_SESSION["userid"]) && $_SESSION["userid"] === true) {
    header("location: welcome.php");
    exit;
}