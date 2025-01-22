<?php

use Core\Response;
use Core\App;
use Core\Database;


function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}

function handleInappropriateReview($review, $prohibitedWords) {
    // Normalize the review for comparison
    $normalizedReview = strtolower($review);

    // Check for prohibited words
    foreach ($prohibitedWords as $word) {
        if (strpos($normalizedReview, strtolower($word)) !== false) {
            // If inappropriate content is found, return a flag
            return "This review contains inappropriate content and cannot be posted.";
        }
    }

    // If no inappropriate content is found, return the original review
    return $review;
}

//current userid
function authUser(){

    $db = App::resolve(Database::class);
    $email = $_SESSION['user']['email'];
// remember to add double qutos while using pgsql
    $user = $db->query('select * from users where "email"=:email', [
        'email'=>$email
    ])->find();
 
   return $user;


}