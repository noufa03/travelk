<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;
use Http\Forms\RegisterFormAdmin;


use Models\User;

$db = App::resolve(Database::class);


$form = RegisterFormAdmin::validate($attributes = [
    'email' => $_POST['email'] ?? '',
    'password' => $_POST['password'] ?? '',
  
]);


$email=$attributes['email'];
$user=User::findByEmail($email);

$password=$attributes['password'];

 if ($user) {
     $form->error('email', 'email is already taken')
        ->throw();
 } 



    $user = $db->query('INSERT INTO "users(email, password,role)" VALUES"(:email, :password,:role)"', [
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

