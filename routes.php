<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');

$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');

$router->get('/notes/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');

$router->get('/register_user', 'registration/allroles/create/create.php')->only('guest');
$router->get('/register_rest', 'registration/allroles/create/rest_create.php')->only('guest');
$router->get('/register_hotel', 'registration/allroles/create/hotel_create.php')->only('guest');
$router->get('/register_admin', 'registration/allroles/create/admin_create.php')->only('guest');
$router->get('/register_rental', 'registration/allroles/create/rental_create.php')->only('guest');

$router->post('/register_user', 'registration/allroles/store/store.php')->only('guest');
$router->post('/register_rest', 'registration/allroles/store/rest_store.php')->only('guest');
$router->post('/register_hotel', 'registration/allroles/store/hotel_store.php')->only('guest');
$router->post('/register_admin', 'registration/allroles/store/admin_store.php')->only('guest');
$router->post('/register_rental', 'registration/allroles/store/rental_store.php')->only('guest');
//login
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');

//resturant menu
$router->get('/mymenus','restaurant/Menus/index.php')->only('auth');

$router->get('/menu','restaurant/Menus/menus.show.php')->only('auth');
$router->get('/menu/edit','restaurant/Menus/menus.edit.php')->only('auth');
$router->get('/menu/add','restaurant/Menus/menus.add.php')->only('auth');
$router->post('/menu/add','restaurant/Menus/menus.store.php')->only('auth');



//profile
$router->get('/profile','profile/rest_show.php')->only('auth');

//table
$router->get('/tables','restaurant/table/index.php')->only('auth');

//dashboard
$router->get('/dashboard','restaurant/dashboard/index.php');




// offers
$router->get('/myoffers','restaurant/offers/offers.php');
$router->get('/myoffers/add','restaurant/offers/offers.add.php');
$router->post('/myoffers/add','restaurant/offers/offer-store.php');
$router->get('/offers/edit','restaurant/offers/offer-edit.php');

//reviews
$router->get('/myreviews','restaurant/reviews/reviews.php');