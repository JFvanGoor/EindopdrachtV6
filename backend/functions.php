<?php

function conn() {
    // Declareer variabelen
    $servername = "localhost";
    $username = "root";
    $password = "usbw";
    $database = "aanmelding";

// Maak verbinding
    $conn = new mysqli($servername, $username, $password, $database);

// Controleer of verbinding is gelukt
    if ($conn->connect_error) {
        die("Connectie mislukt: " . $conn->connect_error);
    }	
    return($conn);
}

function sqlTranslationRequest($i) {
    //de query
    $sql = "SELECT vertaling FROM aanmelding WHERE woord = '". $i ."' LIMIT 0 , 30";
    $result = conn()->query($sql);
    $row = $result -> fetch_assoc();
    if (print_r($row["vertaling"]) != 1) {
        return print_r($row["vertaling"]);
    } else {
        return(null);
    }
}

function sqlTranslationSterk($i, $k) {
    //de query
    if ($i[count($i) - 2] . $i[count($i) - 1] != "en") {
        $sql = "SELECT vertaling FROM aanmelding WHERE Sterk = '". $k ."en' LIMIT 0 , 30";
    } else {
        $sql = "SELECT vertaling FROM aanmelding WHERE Sterk = '". $k ."' LIMIT 0 , 30";
    }
    $result = conn()->query($sql);

    $row = $result -> fetch_assoc();
    if (print_r($row["vertaling"]) != 1) {
        return print_r($row["vertaling"]);
    } else {
        return(null);
    }
}