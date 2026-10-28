<?php

header('Content-Type:application/json');

require_once('../../_config/cnx.php');
sql_autoload_register(function($class){
    require_once('../../classes/'.$class.'.php');
});

$message = "";
$success = false;

// VALIDATION
$date   = trim($_POST['date']);
$amount = trim($_POST['amount']);
$catId = $_POST['catId'];
$typeId = $_POST['typeId'];

if(empty($date)){
    $message = "Veuillez entrer une date";
}elseif(empty($amount) || is_numeric($amount) || $amount <= 0){
    $message = "Veuillez entrer un montant";
}elseif(empty($catId)){
    $message = "Veuillez choisir une cathegorie";
}elseif(empty($typeId)){
    $message = "Veuillez choisir un type";
}else{
    $banque = new Banque(null, $date, $amount, $catId, $typeId);
    $manager = new BanqueManager($cnx);
    $retour = $manager->createTransaction($banque);

    if($retour === false){
        $message = "Une erreur est survenue lors de l'insertion";
    }else{
        $message = "Insertion réussie";
        $success = true;
    }
}

// RETOUR JSON
echo json_encode([
    'success' => $success,
    'message' => $message
]);

