<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$user = authUser();
$userid=$user['userid'];


//profile

if(isset($_FILES['profile_picture']['name']) && !empty($_FILES['profile_picture']['name'])){
            $fileTmp=$_FILES['profile_picture']['tmp_name'];//old path
            //dd($fileTmp);// "/tmp/phpJvfKJu"
            $filename=$_FILES['profile_picture']['name'];
            $filenameCops=explode('.',$filename);//explode the file name
            $fileExtension=end($filenameCops);//extension eka gaththa
            
            $profile=md5(time().$filename);//make a new file name
            $profile=$profile.".".$fileExtension;
            
            $targetdir=base_path("/public/rental/folder$userid/profile/");
            
            $targetFile=$targetdir.$profile;//new path
            
            move_uploaded_file($fileTmp,$targetFile);
            $uploadedimg='rental/folder'.$userid.'/profile/'.$profile;
           


}
else{

//old img exist 
$uploadedimg =(!empty($_POST['profile_picture']))?$_POST['profile_picture']:'no'; // Keep existing if not updated
$uploadedimg=isset($uploadedimg)?$uploadedimg:'';
}
$errors=[];

if (empty($_FILES['profile_picture']['name']) && empty($uploadedimg)) {
    $errors['profile_picture'] = '**Please upload a profile picture.';
}

if (empty($_POST['payment_methods'])) {
    $errors['payment_methods'] = '**Please select a payment method (Yes or No).';
}

if (empty($_POST['vehicle_type'])) {
    $errors['vehicle_type'] = '**Vehicle type is required.';
}

if (empty($_POST['vehicle_model'])) {
    $errors['vehicle_model'] = '**Vehicle model is required.';
}

if (empty($_POST['street_address'])) {
    $errors['street_address'] = '**Street address cannot be left blank.';
}

if (empty($_POST['city'])) {
    $errors['city'] = '**City is required.';
}

if (empty($_POST['district'])) {
    $errors['district'] = '**Please select a district.';
}

if (!Validator::isValidgooglemapurl($_POST['google_map_link'])) {
    $errors['google_map_link'] = '**Please provide a valid Google Maps link to your location.';
}

if (count($errors)) {
    return view('rental/details/details.create.view.php', [
        'heading' => 'Profile',
        'errors' => $errors,
        'uploadedimg'=>$uploadedimg,
       
        
    ]);
    
}

$district = $db->query('
    SELECT districtid 
    FROM districts 
    WHERE district = :district', [
    'district' => $_POST['district']
])->find();
$districtid=isset($district['districtid'])?$district['districtid']:NULL;

$driver_user = $db->query('INSERT INTO driver_details (
    "id", "payment_methods","vehicle_type","vehicle_model","profile_picture","street_address","city","districtid","google_map_link"
    ) VALUES (:id,:payment_methods, 
       :vehicle_type, :vehicle_model,:profile,:street_address,:city,:districtid,:google_map_link
    )',[
    
       'id'=>$userid,
       'payment_methods' => ($_POST['payment_methods'] == 'yes') ? "credit,debit,cash" : "cash",
        'vehicle_type' => $_POST['vehicle_type'],
        'vehicle_model' => $_POST['vehicle_model'],
        'profile' => $uploadedimg,
        'street_address' => $_POST['street_address'],
        'city'=> $_POST['city'],
        'districtid'=>$districtid,
        'google_map_link'=>$_POST['google_map_link']
      ]
);
header('location: /dashboard_rental');
exit();
