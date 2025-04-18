<?php


view('session/reset_password/forget_password.view.php', [
    'errors' => $_SESSION['_flash']['errors'] ?? [],
]);