<?php

require_once("../../../../db.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$password = $_POST["password"];
$password = md5($password);
$cognome = $_POST["cognome"];

$_SESSION['username'] = $email;
$_SESSION['password'] = $password;

//dobbiamo inserire nella tabella utenti i dati dell'utente

$email=filter_var($email, FILTER_SANITIZE_EMAIL);

$sql = 'INSERT INTO utenti (nome, cognome, email, password) VALUES ("'.$nome.'", "'.$cognome.'", "'.$email.'", "'.$password.'")';

if ($sql) {
    header("Location: ../../../../index.php");
} else {
    echo "Errore nella registrazione";
}