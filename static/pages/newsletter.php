<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iscriviti alla Newsletter - Car Pooling</title>
    <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>
    <header>
        <h1>Iscriviti alla Newsletter</h1>
        <nav>
            <a href="index.php">Home</a>
            <?php if (isset($_SESSION['logged_in'])) : ?>
                <a href="logout.php">Logout</a>
            <?php endif; ?>
        </nav>
    </header>

    <section class="newsletter">
        <h2>Rimani aggiornato sui nostri servizi e offerte</h2>
        <form action="#" method="post">
            <label for="email">Indirizzo Email:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="invia">
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>
</html>
