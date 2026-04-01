<?php
session_start();

function isconnect() {
    return isset($_SESSION["connection"]) && $_SESSION["connection"] === true;
}