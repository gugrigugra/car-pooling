<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "username", "password", "nome_del_tuo_database");

    if ($conn->connect_error) {
        die("Errore di connessione al database: " . $conn->connect_error);
    }

    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO utenti (nome, email, password) VALUES ('$nome', '$email', '$hashed_password')";

    if ($conn->query($query) === TRUE) {
        header("Location: ../../../../../index.php");
    } else {
        echo "Errore nella registrazione: " . $conn->error;
    }

    $conn->close();
}