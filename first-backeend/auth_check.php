<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location:../front-end/auth.php");
    exit();
} ?>