<?php
session_start();

function isconnect() {
    return isset($_SESSION['user_name']);
}