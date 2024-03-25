<?php

session_start();


require_once("../../../../db.php");

// Ottieni i valori inviati dal form
$data_inizio = $_POST["data_inizio"];
$data_fine = $_POST["data_fine"];
$numero_soste = $_POST["numero_soste"];
$aperto = $_POST["aperto"];
$prezzo_passeggero = $_POST["prezzo_passeggero"];
$animali = $_POST["animali"];
$bagaglio = $_POST["bagaglio"];
$fumatori = $_POST["fumatori"];
$numero_posti_disponibili = $_POST["numero_posti_disponibili"];
$numero_patente = $_POST["numero_patente"];

if ($stmt = $db_connection->prepare($sql)) {
    // Associa il parametro e setta il tipo di dato
    $stmt->bind_param("s", $numeroPatente);

    // Esegui la query
    if ($stmt->execute()) {
        // Ottieni il risultato della query
        $result = $stmt->get_result();

        // Verifica se esiste un utente con il numero di patente fornito
        if ($result->num_rows == 1) {
            // Ottieni la data di scadenza della patente
            $row = $result->fetch_assoc();
            $dataScadenza = $row['data_scadenza_patente'];

            // Confronta la data di scadenza con la data odierna
            $dataOdierna = date("Y-m-d");
            if ($dataScadenza < $dataOdierna) {
                echo "Errore: La patente è scaduta.";
            } else {
                echo "Ok";
            }
        } else {
            echo "Errore: Numero di patente non trovato.";
        }
    } else {
        echo "Errore nell'esecuzione della query";
    }

    // Chiudi lo statement
    $stmt->close();
} else {
    echo "Errore nella preparazione della query";
}

// Chiudi la connessione al database
$db_connection->close();
