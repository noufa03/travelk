<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
   $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
    exit();
} else {

    $user = $db->query('INSERT INTO users("email", "password","role") VALUES(:email, :password,:role)', [
        'role'=>'admin',
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
     
     
    $lastInsertedId = $db->connection->lastInsertId();

    $areaAdmin = $db->query(
        'INSERT INTO areaadmin (
        "area_adID",
            "first_name", 
            "last_name", 
            "NIC", 
            "linkedIn", 
            "address", 
            "DOB", 
            "con_num", 
            "language_spk_eng", 
            "language_sin", 
            "language_tam", 
            "CV", 
            "profile", 
            "availabilityID", 
            "statusID:
        ) VALUES (
        :id,
            :first_name, 
            :last_name, 
            :NIC, 
            :linkedIn, 
            :address, 
            :DOB, 
            :con_num, 
            :language_spk_eng, 
            :language_sin, 
            :language_tam, 
            :CV, 
            :profile, 
            :availabilityID, 
            :statusID
        )',
        [   'id'=>$lastInsertedId,
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'NIC' => $_POST['NIC'],
            'linkedIn' => $_POST['linkedIn'],
            'address' => $_POST['address'],
            'DOB' => $_POST['DOB'],
            'con_num' => $_POST['con_num'],
            'language_spk_eng' =>isset($_POST['language_spk_eng']) ? 1:0,
            'language_sin' =>isset($_POST['language_sin'])? 1 : 0,
            'language_tam' => isset($_POST['language_tam'])?1:0,
            'CV' => $_POST['CV'],
            'profile' => $_POST['profile'],
            'availabilityID' => $_POST['availabilityID'],
            'statusID' => $_POST['statusID']
        ]
    );
   


   
    

    (new Authenticator)->login(['email' => $email,'role'=>'admin']);

    header('location: /');
    exit();
}
