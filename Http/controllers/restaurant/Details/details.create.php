

<?php

use Core\App;
use Core\Database;
use Core\Session;


$db = App::resolve(Database::class);
$user = authUser();

$userid = $user['userid'];

$districtCities = [
    "Ampara" => ["Ampara Town", "Dehiattakandiya", "Uhana"],
    "Anuradhapura" => ["Anuradhapura Town", "Kekirawa", "Eppawala"],
    "Badulla" => ["Badulla Town", "Bandarawela", "Welimada"],
    "Batticaloa" => ["Batticaloa Town", "Eravur", "Valachchenai"],
    "Colombo" => ["Colombo 1", "Colombo 2", "Colombo 3"],
    "Galle" => ["Galle Town", "Hikkaduwa", "Ambalangoda"],
    "Gampaha" => ["Gampaha Town", "Negombo", "Wattala"],
    "Hambantota" => ["Hambantota Town", "Tissamaharama", "Tangalle"],
    "Jaffna" => ["Jaffna Town", "Point Pedro", "Chavakachcheri"],
    "Kalutara" => ["Kalutara Town", "Beruwala", "Panadura"],
    "Kandy" => ["Kandy Town", "Peradeniya", "Katugastota"],
    "Kegalle" => ["Kegalle Town", "Warakapola", "Mawanella"],
    "Kilinochchi" => ["Kilinochchi Town", "Pallai", "Paranthan"],
    "Kurunegala" => ["Kurunegala Town", "Polgahawela", "Pannala"],
    "Mannar" => ["Mannar Town", "Pesalai", "Murunkan"],
    "Matale" => ["Matale Town", "Dambulla", "Sigiriya"],
    "Matara" => ["Matara Town", "Weligama", "Deniyaya"],
    "Monaragala" => ["Monaragala Town", "Wellawaya", "Bibile"],
    "Mullaitivu" => ["Mullaitivu Town", "Oddusuddan", "Puthukudiyiruppu"],
    "NuwaraEliya" => ["Nuwara Eliya Town", "Hatton", "Talawakele"],
    "Polonnaruwa" => ["Polonnaruwa Town", "Hingurakgoda", "Medirigiriya"],
    "Puttalam" => ["Puttalam Town", "Chilaw", "Wennappuwa"],
    "Ratnapura" => ["Ratnapura Town", "Balangoda", "Eheliyagoda"],
    "Trincomalee" => ["Trincomalee Town", "Kinniya", "Muttur"],
    "Vavuniya" => ["Vavuniya Town", "Cheddikulam", "Nedunkeni"]
];
$detailsID = $userid;

$pageis = 'add page';

view("restaurant/Details/details.create.view.php", [
    'heading' => 'My details',
    'districtCities' => $districtCities,
    'detailsID' => $detailsID,
    'pageis' => $pageis,
    'errors'=>Session::get('errors')


]);
