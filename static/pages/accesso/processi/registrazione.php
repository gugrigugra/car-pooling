<?php

session_start();

require_once("../../../../db.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$password = $_POST["password"];
$password = md5($password);
$cognome = $_POST["cognome"];

$_SESSION['username'] = $email;
$_SESSION['password'] = $password;

//dobbiamo inserire nella tabella utenti i dati dell'utente

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

//query per l'inserimento dei dati
$sql = 'INSERT INTO utente (nome, cognome, email, password) VALUES ("' . $nome . '", "' . $cognome . '", "' . $email . '", "' . $password . '")';

if ($db_connection->multi_query($sql) === TRUE) {
    echo "Inserimento riuscito";
    header("Location: ../../../../index.php");
} else {
    echo "Errore durante l'inserimento";
}

// Chiudi la connessione
$db_connection->close();

exit();