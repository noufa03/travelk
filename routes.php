<?php

$router->get('/', 'user/home.php');
$router->get('/trip-planner', 'user/discover.php');
$router->get('/register', 'user/register.php')->only('guest');
$router->get('/stays', 'user/home/stays.php');
$router->get('/places', 'user/home/places.php');
$router->get('/resturents', 'user/home/restaurants.php');
$router->get('/shops', 'user/home/shops.php');
$router->get('/rent', 'user/home/rent.php');
$router->get('/review', 'user/profile/reviews/reviews.php')->only('traveler');
$router->delete('/review/delete', 'user/profile/reviews/reviews.delete.php')->only('traveler');

$router->get('/auth-check', 'user/auth-check.php');
$router->get('/profile', 'user/index.php')->only('traveler');
$router->get('/planning', 'user/planning/plan.php')->only('traveler');
$router->get('/planning/place', 'user/planning/placeplan.php')->only('traveler');
$router->post('/planning/place', 'user/planning/placeplan.php')->only('traveler');
$router->get('/planning/stay', 'user/planning/stayplan.php')->only('traveler');
$router->post('/planning/stay', 'user/planning/stayplan.php')->only('traveler');
$router->get('/planning/rest', 'user/planning/restplan.php')->only('traveler');
$router->post('/planning/rest', 'user/planning/restplan.php')->only('traveler');
$router->post('/planning/trip', 'user/planning/tripplan.php')->only('traveler');
$router->post('/planning/trip/plan', 'user/planning/trip/create.php')->only('traveler');
$router->post('/planning/trip/rent', 'user/planning/trip/store.php')->only('traveler');
// $router->post('/planning/trip_review', 'user/planning/trip/trip_review.php')->only('traveler');

$router->get('/resturent', 'user/locations/rest.show.php');
$router->post('/resturent', 'user/locations/reviews/rest.create.php');
$router->get('/hotel', 'user/locations/hotel.show.php');
$router->get('/place', 'user/locations/place.show.php');

// $router->get('/about', 'about.php');
// $router->get('/contact', 'contact.php');
// $router->get('/notes', 'notes/index.php')->only('auth');
// $router->get('/note', 'notes/show.php');
// $router->delete('/note', 'notes/destroy.php');
// $router->get('/note/edit', 'notes/edit.php');
// $router->patch('/note', 'notes/update.php');
// $router->get('/notes/create', 'notes/create.php');
// $router->post('/notes', 'notes/store.php');

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
$router->post('/tables/filter','restaurant/table/filter.php')->only('restuarant');
$router->get('/tables/edit','restaurant/table/table.edit.php')->only('restuarant');
$router->patch('/tables/update','restaurant/table/table.update.php')->only('restuarant');
$router->delete('/tables/delete','restaurant/table/table.destroy.php')->only('restuarant');
//dashboard
$router->get('/dashboard_rest','restaurant/dashboard/index.php')->only('restuarant');
$router->get('/dashboard_rental','rental/dashboard/index.php')->only('rental');
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
$router->delete('/offers/delete','restaurant/offers/offers-destroy.php')->only('restuarant');

//reviews
$router->get('/myreviews_rest','restaurant/reviews/reviews.php')->only('restuarant');
$router->post('/myreviews_rest/updateflag','restaurant/reviews/reviewupdateflag.php')->only('restuarant');
$router->post('/myreviews_rest/updateflagstore','restaurant/reviews/reviewupdateflagStore.php')->only('restuarant');

$router->post('/myreviews_rest/updatepublish','restaurant/reviews/reviewpublish.php')->only('restuarant');
$router->post('/myreviews_rest/updatepublishstore','restaurant/reviews/reviewpublishStore.php')->only('restuarant');
$router->get('/myreviews_rest/reply','restaurant/reviews/reviews.reply.php')->only('restuarant');
$router->post('/myreviews_rest/reply/store','restaurant/reviews/reviews.reply.store.php')->only('restuarant');

//cuisine review
$router->get('/myreviews_rest/reply/cuisinereview','restaurant/reviews/reviews.reply.cuisinereview.php')->only('restuarant');
$router->post('/myreviews_rest/reply/cuisinereview/store','restaurant/reviews/reviews.reply.cuisinereview.store.php')->only('restuarant');

$router->get('/myreviews_car','rental/reviews/reviews.php')->only('rental');




//details

$router->get("/details_rest",'restaurant/Details/details.create.php');
$router->post("/details_rest",'restaurant/Details/details.store.php');
$router->get("/details_rest/edit",'restaurant/Details/details.edit.php');

//main admin

$router->get('/admin', 'admin/index.php');

$router->get('/admin/login', 'admin/logging/admin.login.php');
$router->get('/areaadmin/login', 'admin/logging/areaadmin.login.php');
$router->post('/areaadmin/login', 'admin/logging/areaadmin.verification.php');
$router->get('/areaadmin/logout', 'admin/logging/areaadmin.logout.php');

$router->get('/admin/places', 'admin/places/show.php');
$router->get('/admin/places/create', 'admin/places/create.php');
$router->post('/admin/places', 'admin/places/store.php');
$router->get('/admin/places/edit', 'admin/places/edit.php');
$router->patch('/admin/places/update', 'admin/places/update.php');
$router->delete('/admin/places/delete', 'admin/places/destroy.php');

$router->get('/admin/restaurants', 'admin/restaurants/show.php');

$router->get('/admin/accommodation', 'admin/accommodation/show.php');

$router->get('/admin/notifications', 'admin/notifications/show.php');
$router->get('/admin/notifications/create', 'admin/notifications/create.php');
$router->post('/admin/notifications', 'admin/notifications/store.php');
$router->get('/admin/notifications/edit', 'admin/notifications/edit.php');
$router->patch('/admin/notifications/update', 'admin/notifications/update.php');
$router->delete('/admin/notifications/delete', 'admin/notifications/destroy.php');
$router->get('/admin/notifications/deleted', 'admin/notifications/deleted.php');

$router->get('/admin/areaadmins', 'admin/areaadmins/show.php');
$router->get('/admin/areaadmins/profile', 'admin/areaadmins/profile.php');

$router->get('/recruitments', 'admin/areaadmins/recruit.php');
$router->post('/recruitments', 'admin/areaadmins/store.php');

$router->get('/admin/applications', 'admin/areaadmins/applications.php');
$router->get('/admin/applications/allrejected', 'admin/areaadmins/allrejected.php');
$router->get('/admin/applications/application', 'admin/areaadmins/application.php');
$router->post('/admin/applications/application/accept', 'admin/areaadmins/accept.php');
$router->post('/admin/applications/application/reject', 'admin/areaadmins/reject.php');

$router->get('/admin/areaadmins/rejected/profile', 'admin/areaadmins/rejected_profile.php');

$router->get('/admin/districts', 'admin/districts/show.php');

//area admin

$router->get('/areaadmin', '/areaadmin/index.php');

$router->get('/areaadmin/places', 'areaadmin/places/show.php');
$router->get('/areaadmin/places/create', 'areaadmin/places/create.php');
$router->post('/areaadmin/places', 'areaadmin/places/store.php');
$router->get('/areaadmin/places/edit', 'areaadmin/places/edit.php');
$router->patch('/areaadmin/places/update', 'areaadmin/places/update.php');
$router->delete('/areaadmin/places/delete', 'areaadmin/places/destroy.php');

$router->get('/areaadmin/restaurants', 'areaadmin/restaurants/show.php');

$router->get('/areaadmin/notifications', 'areaadmin/notifications/show.php');
$router->get('/areaadmin/notifications/create', 'areaadmin/notifications/create.php');
$router->post('/areaadmin/notifications', 'areaadmin/notifications/store.php');
$router->get('/areaadmin/notifications/edit', 'areaadmin/notifications/edit.php');
$router->patch('/areaadmin/notifications/update', 'areaadmin/notifications/update.php');
$router->delete('/areaadmin/notifications/delete', 'areaadmin/notifications/destroy.php');
$router->get('/areaadmin/notifications/deleted', 'areaadmin/notifications/deleted.php');

//end of admins

$router->patch("/details_rest/update",'restaurant/Details/details.update.php')->only('restuarant');;
$router->get("/details_rest/edit",'restaurant/Details/details.edit.php');
$router->get("/details_rest",'restaurant/Details/details.create.php')->only('restuarant');
$router->post("/details_rest",'restaurant/Details/details.store.php')->only('restuarant');
$router->patch("/details_rest/update",'restaurant/Details/details.update.php')->only('restuarant')->only('restuarant');
$router->get("/details_rest/edit",'restaurant/Details/details.edit.php')->only('restuarant');
$router->delete("/details/img/delete",'restaurant/Details/details.destroy.img.php')->only('restuarant');
$router->patch("/details/profile/photo", 'restaurant/Details/photo/update.php')->only('restuarant');



$router->get("/details_rental",'rental/details/details.create.php')->only('rental');
$router->post("/details_rental",'rental/details/details.store.php')->only('rental');
$router->get("/details_rental/edit",'rental/details/details.edit.php')->only('rental');
$router->post("/details_rental/update",'rental/details/details.update.php')->only('rental');
// notifications


$router->get("/notifications_rest",'restaurant/notifications/index.php')->only('restuarant');
$router->get("/notifications_rental",'rental/notifications/index.php')->only('rental');

// rental
$router->get("/bookings",'rental/bookings/index.php')->only('rental');
$router->patch("/bookings/update",'rental/bookings/bookings.update.php')->only('rental');


//Accommodation routes
//dashboard
$router->get("/dashboard_hotel",'hotel/dashboard/index.php');
$router->get("/edit_hotel", 'hotel/dashboard/edit.php');
$router->post("/edit_hotel", 'hotel/dashboard/edit.php');

//listing
$router->get("/listing_hotel",'hotel/listing/listing.php');
$router->get("/add_listing",'hotel/listing/listing.add.php');
$router->get("/edit_listing", 'hotel/listing/listing.edit.php');
$router->get("/remove_listing", 'hotel/listing/listing.remove.php');
$router->post("/add_listing",'hotel/listing/listing.add.php');
$router->post("/edit_listing", 'hotel/listing/listing.edit.php');
$router->post("/remove_listing", 'hotel/listing/listing.remove.php');

//reviews
$router->get("/review_hotel", 'hotel/review/review.php');
$router->get("/edit_review", 'hotel/review/review.edit.php');
$router->get("/remove_review", 'hotel/review/review.remove.php');
$router->post("/edit_review", 'hotel/review/review.edit.php');
$router->post("/remove_review", 'hotel/review/review.remove.php');

//rooms
$router->get("/room_hotel", 'hotel/room/room.php');
$router->get("/edit_room", 'hotel/room/room.edit.php');
$router->post("/edit_room", 'hotel/room/room.edit.php');




$router->get("/testHotel", 'hotel/test.php');
// faqs
$router->get("/FAQs_rest",'restaurant/faq/index.php')->only('restuarant');
$router->get("/faq/add",'restaurant/faq/faq.add.php')->only('restuarant');
$router->get("/faq/edit",'restaurant/faq/faq.edit.php')->only('restuarant');
$router->patch("/faq/update",'restaurant/faq/faq.update.php')->only('restuarant');
$router->post("/faq/add",'restaurant/faq/faq.store.php')->only('restuarant');
$router->delete('/faq/delete','restaurant/faq/faq.destroy.php')->only('restuarant');
//settings

$router->get("/issues/restaurant","restaurant/issues/index.php")->only('restuarant');
$router->post("/issues/restaurant","restaurant/issues/issues.store.php")->only('restuarant');
$router->delete('/issues/delete','restaurant/issues/issues.destroy.php')->only('restuarant');

// issue of rental
$router->get("/issues/rental","rental/issues/index.php")->only('rental');
$router->post("/issues/rental","rental/issues/issues.store.php")->only('rental');
$router->delete('/issues/rental/delete','rental/issues/issues.destroy.php')->only('rental');

//password

$router->get("/forget_password","session/reset_password/forget_password.php");
$router->post("/forget_password","session/reset_password/send_reset_link_password.php");
$router->get("/reset_password","session/reset_password/reset_password.php");
$router->post("/reset_password","session/reset_password/update_password.php");
