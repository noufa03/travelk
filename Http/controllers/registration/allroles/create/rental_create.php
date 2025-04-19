<?php
use Core\Session;

view('registration/rental_create.view.php', [
    'errors' => Session::get('errors')
]);