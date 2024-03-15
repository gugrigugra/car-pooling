<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "username", "password", "nome_del_tuo_database");

    if ($conn->connect_error) {
        die("Errore di connessione al database: " . $conn->connect_error);
    }

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $query = "SELECT id, password FROM utenti WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])) {
            header("Location: ../../../../index.php");
        } else {
            echo "Password errata.";
        }
    } else {
        echo "Utente non trovato.";
    }

    $conn->close();
}
?>