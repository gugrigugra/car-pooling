<?php

session_start();

require_once("../../../../db.php");

$giudizio = $_POST['giudizio'];
$voto = $_POST['voto'];
$nome_ricevente = $_POST['riceventeNome'];
$cognome_ricevente = $_POST['riceventeCognome'];
//echo $nome_ricevente . " " . $cognome_ricevente;

$select_ricevente = "SELECT id FROM utente WHERE 'nome' LIKE $nome_ricevente AND cognome LIKE $cognome_ricevente";
$result_ricevente = $db_connection->query($select_ricevente);
$select_scrittore = "SELECT id FROM utente WHERE nome LIKE $_SESSION[username]";
$result_scrittore = $db_connection->query($select_scrittore);

if (!$result_ricevente && !$result_scrittore) {
    echo "Risultati trovati: 0";
} else {

    echo "Risultati trovati";
    $sql = "INSERT INTO recensione (giudizio, voto, id_utente_ricevente, id_utente_scrittore) VALUES ('$giudizio', '$voto', '$select_ricevente', '$select_scrittore')";
    if ($db_connection->multi_query($sql) === TRUE) {
        echo "Inserimento riuscito";
        header("Location: ../../../../index.php");
    } else {
        echo "Errore nella compilazione";
    }
}
