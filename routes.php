<?php

$router->get('/', 'user/home.php');
$router->get('/trip-planner', 'user/discover.php');
$router->get('/register', 'user/register.php')->only('guest');
$router->get('/stays', 'user/home/stays.php');
$router->get('/places', 'user/home/places.php');
$router->get('/resturents', 'user/home/restaurants.php');
$router->get('/shops', 'user/home/shops.php');
$router->get('/rent', 'user/home/rent/rent.php');
$router->post('/book/rental', 'user/home/rent/book.php');
$router->get('/book/rental/details', 'user/home/rent/bookdetails.php');
$router->post('/book/rental/delete', 'user/home/rent/bookdelete.php');
$router->get('/review', 'user/profile/reviews/reviews.php')->only('traveler');
$router->delete('/review/delete', 'user/profile/reviews/reviews.delete.php')->only('traveler');
$router->get('/wishlist', 'user/profile/wishlist.php')->only('traveler');
$router->get('/past-trips', 'user/profile/past-trips.php')->only('traveler');
$router->get('/upcoming-trips', 'user/profile/upcoming-trips.php')->only('traveler');
$router->get('/report-issues', 'user/profile/report-issues.php')->only('traveler');
$router->delete('/trips/delete', 'user/profile/upcoming-trips.delete.php')->only('traveler');
$router->post('/report-issue', 'user/profile/report-issues.store.php')->only('traveler');
$router->post('/wishlist/add', 'user/wishlist/add-wishlist.php')->only('traveler');
$router->post('/planning/add-place', 'user/planning/addplaceplan.php')->only('traveler');

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


//size menu
$router->get('/menu/add/size','restaurant/Menus/sizes/size.add.php')->only('restuarant');
$router->post('/menu/add/size','restaurant/Menus/sizes/size.store.php')->only('restuarant');
$router->get('/menu/edit/size','restaurant/Menus/sizes/size.edit.php')->only('restuarant');
$router->post('/menu/edit/size','restaurant/Menus/sizes/size.update.php')->only('restuarant');
$router->delete('/menu/delete/size','restaurant/Menus/sizes/size.destroy.php')->only('restuarant');
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

//admins

$router->get('/admin/login', 'admin/sessions/create.php')->only('guest');
$router->post('/admin/login', 'admin/sessions/store.php')->only('guest');
$router->delete('/admin/logout', 'admin/sessions/destroy.php');

$router->get('/areaadmin/login', 'areaadmin/sessions/create.php')->only('guest');
$router->get('/areaadmin/setpassword', 'areaadmin/sessions/setpassword.php');
$router->post('/areaadmin/setpassword', 'areaadmin/sessions/confirmpassword.php');
$router->post('/areaadmin/login', 'areaadmin/sessions/store.php')->only('guest');
$router->delete('/areaadmin/logout', 'areaadmin/sessions/destroy.php');

//main admin

$router->get('/admin/profile', 'admin/profile/show.php')->only('admin');

$router->get('/admin/carrentals', 'admin/carrentals/show.php');

$router->get('/admin', 'admin/index.php')->only('admin');
$router->get('/admin/places', 'admin/places/show.php')->only('admin');
$router->get('/admin/places/create', 'admin/places/create.php')->only('admin');
$router->post('/admin/places', 'admin/places/store.php')->only('admin');
$router->get('/admin/places/edit', 'admin/places/edit.php')->only('admin');
$router->patch('/admin/places/update', 'admin/places/update.php')->only('admin');
$router->delete('/admin/places/delete', 'admin/places/destroy.php')->only('admin');
$router->get('/admin/places/search', 'admin/places/search.php')->only('admin');
//$router->get('/admin/places/search', 'admin/places/search.php');

$router->get('/admin/restaurants', 'admin/restaurants/show.php')->only('admin');
$router->get('/admin/restaurants/search', 'admin/restaurants/search.php')->only('admin');

$router->get('/admin/accommodation', 'admin/accommodation/show.php')->only('admin');

$router->get('/admin/notifications', 'admin/notifications/show.php')->only('admin');
$router->get('/admin/notifications/create', 'admin/notifications/create.php')->only('admin');
$router->post('/admin/notifications', 'admin/notifications/store.php')->only('admin');
$router->get('/admin/notifications/edit', 'admin/notifications/edit.php')->only('admin');
$router->patch('/admin/notifications/update', 'admin/notifications/update.php')->only('admin');
$router->delete('/admin/notifications/delete', 'admin/notifications/destroy.php')->only('admin');
$router->get('/admin/notifications/deleted', 'admin/notifications/deleted.php')->only('admin');
$router->get('/admin/notifications/areaadminnotifications', 'admin/notifications/areaadmin.php')->only('admin');

$router->get('/admin/areaadmins', 'admin/areaadmins/show.php')->only('admin');
$router->get('/admin/areaadmins/profile', 'admin/areaadmins/profile.php')->only('admin');
$router->post('/admin/areaadmins/probation/password', 'admin/areaadmins/probationpassword.php');
$router->post('/admin/areaadmins/probation/confirm', 'admin/areaadmins/probationpasswordconfirm.php');

$router->post('/admin/areaadmins/dismiss/password', 'admin/areaadmins/dismisspassword.php');
$router->post('/admin/areaadmins/dismiss/confirm', 'admin/areaadmins/dismisspasswordconfirm.php');
$router->get('/admin/areaadmins/dismissed', 'admin/areaadmins/dismissed.php');


$router->get('/recruitments', 'admin/areaadmins/recruit.php');
$router->post('/recruitments', 'admin/areaadmins/store.php');

$router->get('/admin/applications', 'admin/areaadmins/applications.php')->only('admin');
$router->get('/admin/applications/allrejected', 'admin/areaadmins/allrejected.php')->only('admin');
$router->get('/admin/applications/application', 'admin/areaadmins/application.php')->only('admin');
$router->post('/admin/applications/application/accept', 'admin/areaadmins/accept.php')->only('admin');
$router->post('/admin/applications/application/reject', 'admin/areaadmins/reject.php')->only('admin');

$router->get('/admin/areaadmins/rejected/profile', 'admin/areaadmins/rejected_profile.php')->only('admin');

$router->get('/admin/districts', 'admin/districts/show.php')->only('admin');

//area admin

$router->get('/areaadmin/inquiries', 'areaadmin/inquiries/show.php')->only('areaadmin');
$router->get('/areaadmin/places/search', 'areaadmin/places/search.php')->only('areaadmin');

$router->get('/areaadmin', '/areaadmin/index.php')->only('areaadmin');

$router->get('/areaadmin/places', 'areaadmin/places/show.php')->only('areaadmin');
$router->get('/areaadmin/places/create', 'areaadmin/places/create.php')->only('areaadmin');
$router->post('/areaadmin/places', 'areaadmin/places/store.php')->only('areaadmin');
$router->get('/areaadmin/places/edit', 'areaadmin/places/edit.php')->only('areaadmin');
$router->patch('/areaadmin/places/update', 'areaadmin/places/update.php')->only('areaadmin');
$router->delete('/areaadmin/places/delete', 'areaadmin/places/destroy.php')->only('areaadmin');



$router->get('/areaadmin/restaurants', 'areaadmin/restaurants/show.php')->only('areaadmin');

$router->get('/areaadmin/notifications', 'areaadmin/notifications/show.php')->only('areaadmin');
$router->get('/areaadmin/notifications/create', 'areaadmin/notifications/create.php')->only('areaadmin');
$router->post('/areaadmin/notifications', 'areaadmin/notifications/store.php')->only('areaadmin');
$router->get('/areaadmin/notifications/edit', 'areaadmin/notifications/edit.php')->only('areaadmin');
$router->patch('/areaadmin/notifications/update', 'areaadmin/notifications/update.php')->only('areaadmin');
$router->delete('/areaadmin/notifications/delete', 'areaadmin/notifications/destroy.php')->only('areaadmin');
$router->get('/areaadmin/notifications/deleted', 'areaadmin/notifications/deleted.php')->only('areaadmin');

$router->post('/areaadmin/profile', 'areaadmin/profile/show.php')->only('areaadmin');

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
$router->get("/bookings/update",'rental/bookings/bookings.update.php')->only('rental');


$router->post("/driver/add",'rental/driver/driver.add.php');
$router->patch("/driver/update",'rental/driver/driver.update.php');



//Accommodation routes
//dashboard
$router->get("/dashboard_hotel",'hotel/dashboard/index.php');
$router->get("/edit_hotel", 'hotel/dashboard/edit.php');
$router->post("/edit_hotel", 'hotel/dashboard/edit.php');

//location
$router->get("/edit_location", 'hotel/dashboard/location.edit.php');
$router->post("/edit_location", 'hotel/dashboard/location.edit.php');

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
$router->get("/add_room", 'hotel/room/room.add.php');
$router->post("/add_room", 'hotel/room/room.add.php');




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


//search

$router->get('/search',"restaurant/search/index.php")->only('restuarant');


$router->get('/dd', 'admin/dd.php');

