<?php
include ('../inc/pdo.php');
include ('../inc/function.php');

// declare succès en faux et pas d'erreurs
$succes = false;
$error = array();


// faille xxs
$pseudo = trim(strip_tags(($_POST['pseudo'])));
$email = trim(strip_tags(($_POST['email'])));
$password = trim(strip_tags(($_POST['password'])));
$password2 = trim(strip_tags(($_POST['password2'])));

if(empty($pseudo)){
    $error['empty_pseudo'] = 'Veuillez entrer un pseudo';
} else if (empty($email)){
    $error['empty_email'] = 'Veuillez entrer un email';
} else if (empty($password)){
    $error['$empty_$password'] = 'Veuillez entrer un mot de passe ';
} else if (empty($password2)){
    $error['empty_$password2'] = 'Veuillez entrer un mot de passe de confirmation';
}


if(count($error) == 0){
    $sql = "INSERT INTO user (email, pseudo, password) VALUES (?, ?, ?)";
    $query = $dbh->prepare($sql);
    $query->execute([$email, $pseudo, sha1($password)]);
    $success = true;
}


$data = array(
    'success' => $succes,
    'error' => $error
);
showJson($data);

