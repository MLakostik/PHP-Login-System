<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "/config/functions.php");
session_destroy();
header("Location: " . get_base_url() .  "/project/login-system/login-demo");
?>