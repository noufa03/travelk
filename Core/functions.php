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
 
    $normalizedReview = strtolower($review);


    foreach ($prohibitedWords as $word) {
        if (strpos($normalizedReview, strtolower($word)) !== false) {
       
            return "This review contains inappropriate content and cannot be posted.";
        }
    }


    return $review;
}


function authUser(){
    $email = $_SESSION['user']['email'];
    return User::findByEmail($email);
    
    }


function public_dir_files($directory) {

    $photo_dir = BASE_PATH .'public'. str_replace(DIRECTORY_SEPARATOR, '/', $directory);

    if (!is_dir($photo_dir)) {
        return [];
    }
    $files = glob($photo_dir .  DIRECTORY_SEPARATOR . '*');
    
    $files = array_filter($files, 'is_file');

    return $files; 
}

function public_dir_files_rest($directory) {
    $photo_dir = BASE_PATH .'public'. str_replace('/', DIRECTORY_SEPARATOR, $directory);
    if (!is_dir($photo_dir)) {
        return [];
    }
    $files = glob($photo_dir . '*');
    $files = array_filter($files, 'is_file');

    return $files; 
}


function filename($path) {
    $filename = basename($path);
    return $filename;
}


function extractResturantPath($fullPath) {
    $parts = explode('/', $fullPath);
    if (count($parts) >= 2) {
        return $parts[0] . '/' . $parts[1] . '/';
    }
    return '';
}


function getDirectoryFiles($basePath, $directory) {
    $fullPath = $basePath . $directory;
    $files = [];
    if (is_dir($fullPath)) {
        $scan = scandir($fullPath);
        foreach ($scan as $file) {
            if ($file !== '.' && $file !== '..' && !is_dir($fullPath . '/' . $file)) {
                $files[] = $directory . '/' . $file;
            }
        }
    }
    return $files;
}

function parseIds($input) {
    if (is_array($input)) {
        $input = reset($input); 
    }
    $input = trim($input, '[]');

    if (empty($input)) {
        return [];
    }

    return array_map('intval', explode(',', $input));
}


