<?php
use Core\Session;

view('registration/admin_create.view.php', [
    'errors' => Session::get('errors')
]);