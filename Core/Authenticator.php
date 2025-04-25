<?php

namespace Core;


class Authenticator
{
    public function attempt($email, $password)
    {//authenticate the user by the email and password
        $user = App::resolve(Database::class)//resolves the database instance from the container
            ->query('select * from users where email = :email', [
                'email' => $email
            ])->find();//find the user by their email

        if ($user) {
            if (password_verify($password, $user['password'])) {// use password_verify built in function  secure comparison with hashed password
                $this->login([
                    'email' => $email,
                    'role' => $user['role'],
                ]);//if the credentials are correct logged in the user by storing data in the session

                return true;//auth success
            }
        }

        return false;//auth fail
    }

    public function login($user)//takes an array with email and role
    {
        $db = App::resolve(Database::class);

//set the both in the session
        $_SESSION['user'] = [
            'email' => $user['email'],
            'role' => $user['role'],


        ];


// changes the sessionid  on login
        session_regenerate_id(true);
    }

    public function logout()
    {//logs the user out using destory method in the session
        Session::destroy();
    }
}
