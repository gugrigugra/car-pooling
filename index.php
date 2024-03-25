<?php
session_start();

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Pooling home page</title>
    <style>
        /* Stile generale */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        nav {
            display: inline-block;
        }

        a {
            color: #fff;
            text-decoration: none;
            margin-left: 10px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        section {
            margin-top: 25px;
            margin-left: 25px;
        }

        /* Stile per il contenitore principale */
        main {
            margin-top: 25px !important;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }



        /* Stile per le etichette */
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        /* Stile per gli input */
        input[type="text"],
        input[type="date"],
        input[type="number"],
        input[type="submit"] {
            width: calc(100% - 24px);
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        /* Stile per il pulsante di invio */
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        /* Stile per il pulsante di invio al passaggio del mouse */
        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Stile per messaggi di errore */
        .error-message {
            color: #ff0000;
            margin-top: 8px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <header>

        <?php if (!isset($_SESSION['username'])) : ?>
            <h1>Accedi o registrati su Car Pooling</h1>
            <nav>
                <a href="static/pages/area_riservata/login.html">Accedi</a>
                <a href="static/pages/area_riservata/registrazione.html">Registrati</a>

            </nav>
        <?php else : ?>
            <h1>Benvenuto su Car Pooling</h1>
            <a href="static/pages/area_riservata/logout.php">Logout</a>

            <a href="static/pages/area_riservata/inserisciRecensioni.html">Inserisci recensione</a>
            <a href="static/pages/area_riservata/visualizzaRecensioni.php">Visualizza recensioni</a>
            <a href="">Pubblica passaggio</a>
            <!--
                mostrare pagina di inserimento recensioni - fatto
                pagina visualizzazione recensioni fatto
                fare pagina di login fatto
                pubblica un passaggio.
                prima di poter pubblicare un pasaggio, bisogna controllare che la patente sia ancora valida
                nel momento che pubblica un passaggio registrare la macchina
                nella pagina home inserire un form per la ricerca di un viaggio (partenza da, arrivo a, data, passeggeri)
                nella pagina di visualizzazione viaggi mettere l'utente che offre il viaggio
                sempre nella pagina di visualizzazione inserire pulsante "fai la richiesta".
                questo passagigo verrà accettato in modo casuale. 
                
            -->
        <?php endif; ?>

        <a href="static/pages/newsletter.php">Newsletter</a>
        <a href="static/pages/chiSiamo.php">Chi Siamo</a>

    </header>

    <main>

        <form action="ricercaViaggio.php" method="post">
            <label for="partenza">Partenza</label>
            <input type="text" name="partenza" id="partenza" required>
            <label for="arrivo">Arrivo</label>
            <input type="text" name="arrivo" id="arrivo" required>
            <label for="data">Data</label>
            <input type="date" name="data" id="data" required>
            <label for="passeggeri">Numero passeggeri</label>
            <input type="number" name="passeggeri" id="passeggeri" required>
            <input type="submit" value="cerca">
        </form>

    </main>

    <footer>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>

</html>