<?php
session_start();

// Verifica se l'utente è già autenticato, in tal caso reindirizza alla homepage
if (isset($_SESSION['logged_in'])) {
    header('Location: ../../../../../index.php');
    exit();
}

// Verifica se l'utente ha inviato il modulo di registrazione
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Salva i dati del modulo nella sessione
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];

    // Reindirizza l'utente alla pagina di conferma registrazione
    header('Location: ../../../../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione - Car Pooling</title>
    <link rel="stylesheet" href="../../../../../static/css/style.css">
</head>

<body>
    <header>
        <h1>Registrazione</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="login.php">Accedi</a>
        </nav>
    </header>

    <section class="registration">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Nome Utente:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="invia">
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>

</html>