<?php

$_SESSION["POST"] = $_POST;


$arrayFluxIndex = [
    'Jeux Olympiques' => 0,
    'Sports de combat' => 1,
    'Sports us' => 2,
    'Handball' =>3,
    'Volley' => 4
];



if(count($_SESSION['POST']['cat']) != 3){
    echo "veuillez selectionner 3 cases";
}
