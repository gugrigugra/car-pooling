<?php
session_start();
require_once("../../../db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ricerca viaggio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .viaggio {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .viaggio:last-child {
            border-bottom: none;
        }

        .viaggio p {
            margin: 5px 0;
        }

        .viaggio .partenza {
            font-weight: bold;
            color: #007bff;
        }

        .viaggio .destinazione {
            font-weight: bold;
            color: #28a745;
        }

        .viaggio .dettagli {
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Ricerca viaggio</h2>
        <?php
        $capoluoghi_italiani = array(
            "Abruzzo" => "L'Aquila",
            "Basilicata" => "Potenza",
            "Calabria" => "Catanzaro",
            "Campania" => "Napoli",
            "Emilia-Romagna" => "Bologna",
            "Friuli-Venezia Giulia" => "Trieste",
            "Lazio" => "Roma",
            "Liguria" => "Genova",
            "Lombardia" => "Milano",
            "Marche" => "Ancona",
            "Molise" => "Campobasso",
            "Piemonte" => "Torino",
            "Puglia" => "Bari",
            "Sardegna" => "Cagliari",
            "Sicilia" => "Palermo",
            "Toscana" => "Firenze",
            "Trentino-Alto Adige" => "Trento",
            "Umbria" => "Perugia",
            "Valle d'Aosta" => "Aosta",
            "Veneto" => "Venezia"
        );

        $data = $_POST['data'];
        $passeggeri = $_POST['passeggeri'];

        $sql = "SELECT * FROM viaggio WHERE numero_posti_disponibili >= ?";

        if ($stmt = $db_connection->prepare($sql)) {
            $stmt->bind_param("s", $passeggeri);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $regione_casuale = array_rand($capoluoghi_italiani);

                        // Ottieni il capoluogo corrispondente alla regione casuale
                        $capoluogo_casuale = $capoluoghi_italiani[$regione_casuale];
                        echo "<div class='viaggio'>";
                        echo "<p>Partenza: <span class='partenza'>$capoluogo_casuale</span></p>";
                        $regione_casuale = array_rand($capoluoghi_italiani);

                        // Ottieni il capoluogo corrispondente alla regione casuale
                        $capoluogo_casuale = $capoluoghi_italiani[$regione_casuale];
                        echo "<p>Destinazione: <span class='destinazione'>$capoluogo_casuale</span></p>";
                        echo "<p class='dettagli'>Passeggeri: " . $row['numero_posti_disponibili'] . "</p>";
                        echo "<p class='dettagli'>Prezzo a persona: " . $row['prezzo_passeggero'] . "</p>";
                        echo "<p class='dettagli'>ID utente che offre il viaggio: " . $row['id_utente'] . "</p>";
                        
                        echo "</div>";
                    }
                } else {
                    echo "La ricerca non ha portato risultati";
                }
            } else {
                echo "Errore nell'esecuzione della query";
            }
            $stmt->close();
        } else {
            echo "Errore nella preparazione dell'istruzione SQL: " . $db_connection->error;
        }

        $db_connection->close();
        ?>
    </div>
</body>

</html>