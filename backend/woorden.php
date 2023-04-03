<?php

if ($_POST['apart'] != "") {
    $sql = "INSERT INTO aanmelding (woord, vertaling, functie, apart, Sterk)
    VALUES ('" . $_POST['woord'] . "', '" . $_POST['vertaling'] . "', '" . $_POST['functie'] . "', '" . $_POST['apart'] . "', NULL)";
} else {
    $sql = "INSERT INTO aanmelding (woord, vertaling, functie, apart, Sterk)
    VALUES ('" . $_POST['woord'] . "', '" . $_POST['vertaling'] . "', '" . $_POST['functie'] . "', NULL, NULL)";
    //INSERT INTO aanmelding (id, woord, vertaling, functie, apart, Sterk) VALUES (NULL, 'koken', 'cook', 'werkwoord', NULL, NULL)
}
$conn = conn();
$result = $conn->query($sql);
if ($result === TRUE) {
    echo "Woord succesvol toegevoegd ";
} else {
    echo "Fout bij woord toevoegen: " . $conn->error;
}

$conn->close();
