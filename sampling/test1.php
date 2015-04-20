<?php

$options = [
    'cost' => 11,
];
// Get the password from post
$passwordFromPost = "securetoken";

$hash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);

var_dump($hash);

//$passwordFromPost = $_POST['password'];
$hashedPasswordFromDB = $hash;

if (password_verify($passwordFromPost, $hashedPasswordFromDB)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}