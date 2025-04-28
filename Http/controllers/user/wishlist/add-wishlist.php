<?php

use Core\Session;

// Expecting JSON POST { locationid: 123 }
$request = json_decode(file_get_contents('php://input'), true);

$locationId = $request['locationid'] ?? null;

if ($locationId === null) {
    echo json_encode(['success' => false, 'message' => 'Invalid location ID']);
    exit;
}

$wishlist = Session::get('wishlist', []);

// If location already in wishlist, remove it (toggle)
if (in_array($locationId, $wishlist)) {
    $wishlist = array_diff($wishlist, [$locationId]);
    $action = 'removed';
} else {
    $wishlist[] = $locationId;
    $action = 'added';
}

Session::put('wishlist', $wishlist);

echo json_encode([
    'success' => true,
    'action' => $action
]);
