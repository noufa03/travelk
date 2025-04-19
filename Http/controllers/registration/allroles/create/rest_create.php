<?php



use Core\Session;


view('registration/rest_create.view.php', [
    'errors' => Session::get('errors')
]);