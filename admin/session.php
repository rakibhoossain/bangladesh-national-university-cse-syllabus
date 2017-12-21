<?php
session_start();
if (!isset($_SESSION['xbpqwe'])) {
    header('Location: login.php');
    exit(0);
}
?>