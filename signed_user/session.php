<?php
session_start();

if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
    header("location: profile_s.php");
    exit;
}