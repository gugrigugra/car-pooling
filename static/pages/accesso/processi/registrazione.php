<?php

session_start();

require_once("../../../../db.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$password = md5($_POST["password"]);
$cognome = $_POST["cognome"];
$indirizzo = $_POST['indirizzo'];
$data_nascita = $_POST['data_nascita'];
$luogo_nascita = $_POST['luogo_nascita'];
$numero_patente = $_POST['numero_patente'];
$numero_documento_identita = $_POST['numero_documento_identita'];
$data_scadenza_patente = $_POST['data_scadenza_patente'];
$numero_telefono = $_POST['numero_telefono'];

$immagineTmpName = $_FILES['fotografia']['tmp_name'];

// Leggi il contenuto dell'immagine
$immagineContenuto = file_get_contents($immagineTmpName);

// Escapa i caratteri speciali per la query SQL
$immagineContenuto = $db_connection->real_escape_string($immagineContenuto);

$_SESSION['username'] = $email;
$_SESSION['password'] = $password;

//dobbiamo inserire nella tabella utenti i dati dell'utente

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

//query per l'inserimento dei dati
$sql = "INSERT INTO utente (nome, cognome, indirizzo, data_nascita, luogo_nascita, numero_patente, numero_documento_identita, data_scadenza_patente, numero_telefono, email, password, fotografia) 
        VALUES ('$nome', '$cognome', '$indirizzo', '$data_nascita', '$luogo_nascita', '$numero_patente', '$numero_documento_identita', '$data_scadenza_patente', '$numero_telefono', '$email', '$password', '$immagineContenuto')";

if ($db_connection->multi_query($sql) === TRUE) {
    echo "Inserimento riuscito";
    header("Location: ../../../../index.php");
} else {
    echo "Errore durante l'inserimento";
}

// Chiudi la connessione
$db_connection->close();

exit();
