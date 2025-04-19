<?php
use Core\Session;

view('registration/hotel_create.view.php', [
    'errors' => Session::get('errors')
]);