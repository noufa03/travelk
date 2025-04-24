<?php

// Destroy session
session_start();
session_unset();
session_destroy();

// Optional: delete session cookie
setcookie(session_name(), '', time() - 3600, '/');

// Redirect to login page
header('Location: /areaadmin/login');
exit;