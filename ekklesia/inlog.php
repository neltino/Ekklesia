<?php
    session_start();
    $_SESSION["active"] = "active";
    header("location: landing.php");
?>