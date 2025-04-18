<?php

$router->get('/', 'user/home.php');
$router->get('/discover', 'user/discover.php');
$router->get('/register', 'user/register.php')->only('guest');
$router->get('/stays', 'user/home/stays.php');
$router->get('/places', 'user/home/places.php');
$router->get('/resturents', 'user/home/restaurants.php');
$router->get('/shops', 'user/home/shops.php');
$router->get('/rent', 'user/home/rent.php');

$router->get('/auth-check', 'user/auth-check.php');
$router->get('/profile', 'user/index.php')->only('auth');
$router->get('/planning', 'user/planning/plan.php');
$router->get('/planning/place', 'user/planning/placeplan.php');
$router->post('/planning/place', 'user/planning/placeplan.php');
$router->post('/planning/stay', 'user/planning/stayplan.php');

$router->get('/resturent', 'user/locations/rest.show.php');
$router->get('/hotel', 'user/locations/hotel.show.php');
$router->get('/place', 'user/locations/place.show.php');

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
$router->post('/category/filter','restaurant/Menus/filter.php')->only('restuarant');
$router->get('/menu','restaurant/Menus/menus.show.php')->only('restuarant');
$router->get('/menu/edit','restaurant/Menus/menus.edit.php')->only('restuarant');
$router->get('/menu/add','restaurant/Menus/menus.add.php')->only('restuarant');
$router->post('/menu/add','restaurant/Menus/menus.store.php')->only('restuarant');
$router->post('/menu/update','restaurant/Menus/menus.update.php')->only('restuarant');
$router->delete('/menu/delete','restaurant/Menus/menus.destroy.php')->only('restuarant');
$router->delete('/menu/delete/image','restaurant/Menus/menus.img-destroy.php')->only('restuarant');




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
$router->get('/dashboard_rental','rental/dashboard/index.php')->only('car');
$router->get('/reservations','restaurant/reservations/index.php')->only('restuarant');
$router->get('/reservations/add','restaurant/reservations/reservations.add.php')->only('restuarant');

$router->post('/reservations/store','restaurant/reservations/reservations.store.php')->only('restuarant');


$router->post('/reservation/update','restaurant/reservations/reservations.update.php')->only('restuarant');
// welcome popup




// offers
$router->get('/myoffers','restaurant/offers/offers.php')->only('restuarant');
$router->get('/myoffers/add','restaurant/offers/offers.add.php')->only('restuarant');
$router->post('/myoffers/add','restaurant/offers/offer-store.php')->only('restuarant');
$router->get('/offers/edit','restaurant/offers/offer-edit.php')->only('restuarant');
$router->patch('/offers/update','restaurant/offers/offer-update.php')->only('restuarant');

//reviews
$router->get('/myreviews_rest','restaurant/reviews/reviews.php')->only('restuarant');
$router->post('/myreviews_rest/updateflag','restaurant/reviews/reviewupdateflag.php')->only('restuarant');
$router->post('/myreviews_rest/updateflagstore','restaurant/reviews/reviewupdateflagStore.php')->only('restuarant');

$router->post('/myreviews_rest/updatepublish','restaurant/reviews/reviewpublish.php')->only('restuarant');
$router->post('/myreviews_rest/updatepublishstore','restaurant/reviews/reviewpublishStore.php')->only('restuarant');

$router->get('/myreviews_car','rental/reviews/reviews.php')->only('car');

//user_side restaurant

$router->get("/restaurants",'restaurant/user_side/find_rest.php');


//details

$router->get("/details_rest",'restaurant/Details/details.create.php');
$router->post("/details_rest",'restaurant/Details/details.store.php');
$router->get("/details_rest/edit",'restaurant/Details/details.edit.php');

$router->get('/admin', 'admin/index.php');

$router->get('/admin/places', 'admin/places/show.php');
$router->get('/admin/places/create', 'admin/places/create.php');
$router->post('/admin/places', 'admin/places/store.php');
$router->get('/admin/places/edit', 'admin/places/edit.php');
$router->patch('/admin/places/update', 'admin/places/update.php');
$router->delete('/admin/places/delete', 'admin/places/destroy.php');

$router->get('/admin/restaurants', 'admin/restaurants/show.php');
$router->get('/admin/restaurants/create', 'admin/restaurants/create.php');
$router->post('/admin/restaurants', 'admin/restaurants/store.php');
$router->get('/admin/restaurants/edit', 'admin/restaurants/edit.php');
$router->patch('/admin/restaurants/update', 'admin/restaurants/update.php');
$router->delete('/admin/restaurants/delete', 'admin/restaurants/destroy.php');

$router->get('/admin/accommodation', 'admin/accommodation/show.php');
$router->get('/admin/accommodation/create', 'admin/accommodation/create.php');
$router->post('/admin/accommodation', 'admin/accommodation/store.php');
$router->get('/admin/accommodation/edit', 'admin/accommodation/edit.php');
$router->patch('/admin/accommodation/update', 'admin/accommodation/update.php');
$router->delete('/admin/accommodation/delete', 'admin/accommodation/destroy.php');

$router->get('/admin/notifications', 'admin/notifications/show.php');
$router->get('/admin/notifications/create', 'admin/notifications/create.php');
$router->post('/admin/notifications', 'admin/notifications/store.php');
$router->get('/admin/notifications/edit', 'admin/notifications/edit.php');
$router->patch('/admin/notifications/update', 'admin/notifications/update.php');
$router->delete('/admin/notifications/delete', 'admin/notifications/destroy.php');
$router->get('/admin/notifications/deleted', 'admin/notifications/deleted.php');

$router->get('/admin/areaadmins', 'admin/areaadmins/show.php');
$router->get('/admin/areaadmins/profile', 'admin/areaadmins/profile.php');


$router->get('/admin/districts', 'admin/districts/show.php');
$router->patch("/details_rest/update",'restaurant/Details/details.update.php')->only('restuarant');;
$router->get("/details_rest/edit",'restaurant/Details/details.edit.php');


$router->get("/details_rental",'rental/details/details.create.php');
$router->post("/details_rental",'rental/details/details.store.php');
$router->get("/details_rental/edit",'rental/details/details.edit.php');
$router->post("/details_rental/update",'rental/details/details.update.php');
// notifications


$router->get("/notifications_rest",'restaurant/notifications/index.php')->only('restuarant');

// rental
$router->get("/bookings",'rental/bookings/index.php');
$router->patch("/bookings/update",'rental/bookings/bookings.update.php');

// faqs
$router->get("/FAQs_rest",'restaurant/faq/index.php');
$router->get("/faq/add",'restaurant/faq/faq.add.php');
$router->get("/faq/edit",'restaurant/faq/faq.edit.php');
$router->patch("/faq/update",'restaurant/faq/faq.update.php');
$router->post("/faq/add",'restaurant/faq/faq.store.php');
$router->delete('/faq/delete','restaurant/faq/faq.destroy.php')->only('restuarant');
//settings

$router->get("/issues/restaurant","restaurant/issues/index.php");
$router->post("/issues/restaurant","restaurant/issues/issues.store.php");
$router->delete('/issues/delete','restaurant/issues/issues.destroy.php')->only('restuarant');

// issue of rental
$router->get("/issues/rental","rental/issues/index.php");
$router->post("/issues/rental","rental/issues/issues.store.php");
$router->delete('/issues/rental/delete','rental/issues/issues.destroy.php');
