<?php
header("Access-Control-Allow-Origin: *");

require("functions.php");

if (isset($_GET['text'])) {
    require("vertaling.php");
} else if (isset($_POST['woord']) and isset($_POST['vertaling']) and isset($_POST['functie']) and isset($_POST['apart'])) {
    require("woorden.php");
}
