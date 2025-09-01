<?php
if (session_status() === PHP_SESSION_ACTIVE) {
    session_unset();
    session_destroy();
}