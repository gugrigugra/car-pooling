<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina di pubblicazione</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            /* Imposta la larghezza desiderata */
            max-width: 400px;
            /* Imposta la larghezza massima */
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input[type="date"],
        input[type="number"],
        input[type="checkbox"],
        input[type="text"],
        input[type="submit"] {
            margin-bottom: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
            /* Imposta la larghezza al 100% */
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Pubblica un viaggio</h2>


        <form action="processi/inserimentoViaggio.php" method="post">
            <label for="data_inizio">Data inizio</label>
            <input type="date" name="data_inizio" id="data_inizio" required>
            <br>
            <label for="data_fine">Data fine</label>
            <input type="date" name="data_fine" id="data_fine" required>
            <br>
            <label for="numero_soste">Numero soste</label>
            <input type="number" name="numero_soste" id="numero_soste" required>
            <br>
            <label for="aperto">Aperto</label>
            <div>
                <input type="radio" id="aperto_si" name="aperto" value="si" required>
                <label for="aperto_si">Si</label>
            </div>
            <div>
                <input type="radio" id="aperto_no" name="aperto" value="no">
                <label for="aperto_no">No</label>
            </div>

            <br>
            <label for="prezzo_passeggero">Prezzo passeggero</label>
            <input type="number" name="prezzo_passeggero" id="prezzo_passeggero" required>
            <br>
            <label for="animali">Animali</label>
            <div>
                <input type="radio" id="animali_si" name="animali" value="si" required>
                <label for="animali_si">Si</label>
            </div>
            <div>
                <input type="radio" id="animali_no" name="animali" value="no">
                <label for="animali_no">No</label>
            </div>

            <br>
            <label for="bagaglio">bagaglio</label>
            <div>
                <input type="radio" id="bagaglio_si" name="bagaglio" value="si" required>
                <label for="bagaglio_si">Si</label>
            </div>
            <div>
                <input type="radio" id="bagaglio_no" name="bagaglio" value="no">
                <label for="bagaglio_no">No</label>
            </div>

            <br>
            <label for="fumatori">fumatori</label>
            <div>
                <input type="radio" id="fumatori_si" name="fumatori" value="si" required>
                <label for="fumatori_si">Si</label>
            </div>
            <div>
                <input type="radio" id="fumatori_no" name="fumatori" value="no">
                <label for="fumatori_no">No</label>
            </div>

            <br>
            <label for="numero_posti_disponibili">Numero posti disponibili</label>
            <input type="number" name="numero_posti_disponibili" id="numero_posti_disponibili" required>
            <br>
            <label for="numeroPatente">Numero di patente</label>
            <input type="number" name="numeroPatente" id="numeroPatente" required>
            <br><br>
            <input type="submit" value="Pubblica">
        </form>

    </div>

</body>

</html>