<?php
// $router->get('/about', 'about.php');
// $router->get('/contact', 'contact.php');
// $router->get('/notes', 'notes/index.php')->only('auth');
// $router->get('/note', 'notes/show.php');
// $router->delete('/note', 'notes/destroy.php');
// $router->get('/note/edit', 'notes/edit.php');
// $router->patch('/note', 'notes/update.php');
// $router->get('/notes/create', 'notes/create.php');
// $router->post('/notes', 'notes/store.php');

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => []
]);