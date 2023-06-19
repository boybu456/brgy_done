<?php
session_start();

session_unset();
session_destroy();

header("location: brg1.php");
?>