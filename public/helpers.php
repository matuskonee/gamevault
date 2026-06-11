<?php
// Helper function to escape HTML
function esc($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

// Helper function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Helper function to check if user is admin
function isAdmin() {
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'];
}

// Helper function to get current user
function getCurrentUser() {
    return $_SESSION['username'] ?? null;
}

// Helper function to display alert
function displayAlert($message, $type = 'info') {
    return "<div class='alert alert-{$type}' role='alert'>{$message}</div>";
}
