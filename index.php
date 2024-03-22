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
        <?php if (!isset($_SESSION['username'])) : ?>
            <nav>
                <a href="static/pages/area_riservata/login.html">Accedi</a>
                <a href="static/pages/area_riservata/registrazione.html">Registrati</a>

            </nav>
        <?php else : ?>
            <a href="static/pages/area_riservata/logout.php">Logout</a>

            <a href="static/pages/area_riservata/inserisciRecensioni.html">Inserisci recensione</a>
            <a href="static/pages/area_riservata/visualizzaRecensioni.php">Visualizza recensioni</a>
            <a href="">Pubblica passaggio</a>
            <!--
                mostrare pagina di inserimento recensioni - fatto
                pagina visualizzazione recensioni
                fare pagina di login
                pubblica un passaggio.
                prima di poter pubblicare un pasaggio, bisogna controllare che la patentenon sia ancora valida
                nel momento che pubblica un passaggio registrare la macchina
                nella pagina home inserire un form per la ricerca di un viaggio (partenza da, arrivo a, data, passeggeri)
                nella pagina di visualizzazione viaggi mettere l'utente che offre il viaggio, con la sua valutazione in stelle
                sempre nella pagina di visualizzazione inserire pulsante "fai la richiesta".
                questo passagigo verrà accettato in modo casuale. 
                
            -->
        <?php endif; ?>

        <a href="static/pages/newsletter.php">Newsletter</a>
        <a href="static/pages/chiSiamo.php">Chi Siamo</a>

    </header>

    <!-- Contenuto della home page
            mettere un form per la ricerca di un viaggio
-->

    <footer>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>

</html>