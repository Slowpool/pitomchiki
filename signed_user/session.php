<?php
// TODO here must be a login and password as i think
session_start();

if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
    header("location: profile_s.php");
    exit;
}