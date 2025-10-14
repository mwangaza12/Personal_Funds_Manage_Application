<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function check_session() {
    if (!isset($_SESSION['username'])) {
        header("Location: /login");
        exit();
    }
}
