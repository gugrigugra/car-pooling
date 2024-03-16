<?php
session_start();

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Pooling home page</title>
    <link rel="stylesheet" href="static/css/style.css">
</head>

<body>
    <header>
        <h1>Benvenuto su Car Pooling</h1>
        <?php if (!isset ($_SESSION['username'])): ?>
            <nav>
                <a href="login.php">Accedi</a>
                <a href="static/pages/accesso/registrazione.html">Registrati</a>

            </nav>
        <?php else: ?>
            <a href="logout.php">Logout</a>
        <?php endif; ?>

        <a href="static/pages/newsletter.php">Newsletter</a>
        <a href="static/pages/chiSiamo.php">Chi Siamo</a>

    </header>

    <!-- Contenuto della home page
            mettere un immagine di sfondo?
            mettere un form per la ricerca di un viaggio?
-->

    <footer>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>

</html>

