<?php
@session_start();
session_destroy();
header("location: ./../../../Login/Login.php");
?>