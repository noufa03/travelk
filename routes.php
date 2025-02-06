<?php

$router->get('/', 'user/home.php');
$router->get('/discover', 'user/discover.php');
$router->get('/about', 'user/about.php');
$router->get('/register', 'user/register.php')->only('guest');
$router->get('/stays', 'user/home/stays.php');
$router->get('/places', 'user/home/places.php');
$router->get('/restaurants', 'user/home/restaurants.php');
$router->get('/shops', 'user/home/shops.php');
$router->get('/rent', 'user/home/rent.php');


$router->get('/profile', 'user/index.php')->only('auth');
$router->get('/planning', 'user/planning.php');

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
$router->get('/mymenus','restaurant/Menus/index.php')->only('restuarant');
$router->get('/categories','restaurant/Menus/category.php')->only('restuarant');
$router->get('/menu','restaurant/Menus/menus.show.php')->only('restuarant');
$router->get('/menu/edit','restaurant/Menus/menus.edit.php')->only('restuarant');
$router->get('/menu/add','restaurant/Menus/menus.add.php')->only('restuarant');
$router->post('/menu/add','restaurant/Menus/menus.store.php')->only('restuarant');
$router->post('/menu/update','restaurant/Menus/menus.update.php')->only('restuarant');
$router->delete('/menu/delete','restaurant/Menus/menus.destroy.php')->only('restuarant');




//profile
$router->get('/profile','profile/rest_show.php')->only('restuarant');

//table
$router->get('/tables','restaurant/table/index.php')->only('restuarant');
$router->get('/tables/Add','restaurant/table/table.add.php')->only('restuarant');
$router->post('/tables/Add','restaurant/table/table.store.php')->only('restuarant');
$router->get('/tables/edit','restaurant/table/table.edit.php')->only('restuarant');
$router->patch('/tables/update','restaurant/table/table.update.php')->only('restuarant');
$router->delete('/tables/delete','restaurant/table/table.destroy.php')->only('restuarant');
//dashboard
$router->get('/dashboard_rest','restaurant/dashboard/index.php')->only('restuarant');
$router->get('/dashboard_car','rental/dashboard/index.php')->only('car');
$router->get('/reservations','restaurant/reservations/index.php')->only('restuarant');





// offers
$router->get('/myoffers','restaurant/offers/offers.php')->only('restuarant');
$router->get('/myoffers/add','restaurant/offers/offers.add.php')->only('restuarant');
$router->post('/myoffers/add','restaurant/offers/offer-store.php')->only('restuarant');
$router->get('/offers/edit','restaurant/offers/offer-edit.php')->only('restuarant');

//reviews
$router->get('/myreviews_rest','restaurant/reviews/reviews.php')->only('restuarant');
$router->get('/myreviews_car','rental/reviews/reviews.php')->only('car');

//user_side restaurant

$router->get("/restaurants",'restaurant/user_side/find_rest.php');


//details

$router->get("/details_rest",'restaurant/Details/details.create.php');
$router->post("/details_rest",'restaurant/Details/details.store.php');
$router->post("/details_rest/update",'restaurant/Details/details.update.php')->only('restuarant');;
$router->get("/details_rest/edit",'restaurant/Details/details.edit.php');

// notifications


$router->get("/notifications",'restaurant/notifications/index.php')->only('restuarant');

//hotel routes
$router->get("/dashboard_hotel",'hotel/index.php');
$router->get("/accommodation_hotel",'hotel/accommodation.php');
$router->get("/dining_hotel",'hotel/dining.php');
$router->get("/others_hotel",'hotel/others.php');
$router->get("/reports_hotel",'hotel/reports.php');

$router->get("/testHotel", 'hotel/test.php');