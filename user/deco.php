<?php
require_once "../config/init.php";

session_destroy();

header("Location: ../connexion.php");
exit;