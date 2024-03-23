<?php

session_start();

require_once("../../../../db.php");

$nome = trim($_POST['nome']);
$cognome = trim($_POST['cognome']);
$password_cifrata = md5($_POST['password']);

$select_nome = "SELECT nome FROM utente WHERE nome like ?";
if ($stmt_nome = $db_connection->prepare($select_nome)) {
    $stmt_nome->bind_param("s", $nome);
    if ($stmt_nome->execute()) {
        $result_nome = $stmt_nome->get_result();
        if ($result_nome->num_rows > 0) {
            //accesso esseguito

            $_SESSION['username'] = $nome;
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


$stmt_nome->close();
$db_connection->close();
