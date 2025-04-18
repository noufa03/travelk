<?php

use Core\Response;
use Models\User;


function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

// function urlIs($value)
// {
//     return $_SERVER['REQUEST_URI'] === $value;
// }

function urlIs($value) {
    return strtok($_SERVER['REQUEST_URI'], '?') === $value;
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
    $email = $_SESSION['user']['email'];
    return User::findByEmail($email);
    
    }

function public_dir_files($directory) {
    $photo_dir = BASE_PATH .'public'. str_replace('/', DIRECTORY_SEPARATOR, $directory);
    // dd($photo_dir);
    // dd(is_dir($photo_dir));
    if (!is_dir($photo_dir)) {
        // dd($photo_dir);
        return [];
    }
    $files = glob($photo_dir .  DIRECTORY_SEPARATOR . '*');
    $files = array_filter($files, 'is_file');
    // dd($files);


    return $files; 
}

function filename($path) {
    $filename = basename($path);
    return $filename;
}
