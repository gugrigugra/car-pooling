<?php

session_start();

require_once("../../../../db.php");

$nome = trim($_POST['nome']);
$cognome = trim($_POST['cognome']);
$password_cifrata = md5($_POST['password']);

$select_nome_cognome = "SELECT nome, cognome, password FROM utente WHERE nome like ? AND cognome like ? AND password like ?";
if ($stmt_nome_cognome = $db_connection->prepare($select_nome_cognome)) {
    $stmt_nome_cognome->bind_param("sss", $nome, $cognome, $password_cifrata);
    if ($stmt_nome_cognome->execute()) {
        $result_nome_cognome = $stmt_nome_cognome->get_result();
        if ($result_nome_cognome->num_rows > 0) {
            //accesso esseguito
            header("Location: ../../../../index.php");
            exit;
        } else {
            //credenziali non corrette
            echo "Credenziali non corrette";
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
$stmt_nome_cognome->close();
$db_connection->close();
