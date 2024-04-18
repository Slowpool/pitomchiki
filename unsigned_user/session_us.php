<?php
session_start();

if (isset($_SESSION["pet_nickname"]) && $_SESSION["pet_nickname"] === true) {
    header("location: profile_us.php");
    exit;
}