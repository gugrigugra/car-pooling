<?php

session_start();
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Siamo - Car Pooling</title>
    <link rel="stylesheet" href="static/css/style.css">
</head>

<body>
    <header>
        <h1>Chi Siamo</h1>
        <nav>
            <a href="index.php">Home</a>
            <?php if (isset($_SESSION['logged_in'])): ?>
                <a href="logout.php">Logout</a>
            <?php endif; ?>
        </nav>
    </header>

    <section class="about-us">
        <h2>Benvenuti in Car Pooling</h2>
        <p>Siamo una piattaforma di car-pooling che mira a ridurre il traffico stradale, i costi di viaggio e l'impatto
            ambientale promuovendo la condivisione delle auto.</p>
        <p>La nostra missione è connettere persone che condividono viaggi in modo sicuro, efficiente ed ecologico.</p>
        <h3>Obiettivi Principali</h3>
        <ul>
            <li>Promuovere la condivisione dei viaggi per ridurre il traffico stradale.</li>
            <li>Ridurre l'inquinamento atmosferico e l'impatto ambientale legato all'uso eccessivo di veicoli privati.
            </li>
            <li>Fornire un'opzione economica e conveniente per gli spostamenti quotidiani e i viaggi occasionali.</li>
        </ul>
        <h3>Contatti</h3>
        <p>Se hai domande, suggerimenti o vuoi collaborare con noi, contattaci:</p>
        <ul>
            <li>Email: info@carpooling.com</li>
            <li>Telefono: +39 0123 456789</li>
        </ul>
    </section>

    <footer>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>

</html>