<?php
session_start();

// Connessione al database
require_once("../../../../db.php");

// Verifica se l'utente è loggato e se ha un'email in sessione
if (isset($_SESSION['username'])) {
    $email = $_SESSION['username'];

    // Query per ottenere l'ID dell'utente con l'email corrispondente
    $sql_id_utente = "SELECT id FROM utente WHERE email like ?";
    if ($stmt_id_utente = $db_connection->prepare($sql_id_utente)) {
        $stmt_id_utente->bind_param("s", $email);
        if ($stmt_id_utente->execute()) {
            $result_id_utente = $stmt_id_utente->get_result();
            if ($result_id_utente->num_rows == 1) {
                $row_id_utente = $result_id_utente->fetch_assoc();
                $id_utente = $row_id_utente['id'];

                // ID del viaggio e stato della prenotazione
                $id_viaggio = $_POST['id_viaggio'];
                $accettata = rand(0, 1);

                if ($accettata == 1) {

                    $accettata = true;
                    // Query per inserire la prenotazione nella tabella prenotazioni
                    $sql_insert_prenotazione = "INSERT INTO prenotazione (accettata, id_viaggio, id_utente) VALUES (?, ?, ?)";
                    if ($stmt_insert_prenotazione = $db_connection->prepare($sql_insert_prenotazione)) {
                        $stmt_insert_prenotazione->bind_param("iii", $accettata, $id_viaggio, $id_utente);
                        if ($stmt_insert_prenotazione->execute()) {
                            $sql_update_prenotato = "UPDATE viaggio SET prenotato = TRUE WHERE id = ?";
                            if ($stmt_prenotato = $db_connection->prepare($sql_update_prenotato)) {
                                $stmt_prenotato->bind_param("i", $id_viaggio);
                                $stmt_prenotato->execute();
                            } else {
                                echo "Errore nella preparazione dell'istruzione SQL per l'aggiornamento del viaggio.";
                            }
                            echo "<script>alert('Prenotazione inserita con successo!');</script>";
                        } else {
                            echo "Errore durante l'inserimento della prenotazione.";
                        }
                    } else {
                        echo "Errore nella preparazione dell'istruzione SQL per l'inserimento della prenotazione.";
                    }
                } else {
                    echo "<script>alert('Prenotazione non accettata.');</script>";
                    //fare altra insert
                }
            } else {
                echo "Errore nell'esecuzione della query per ottenere l'ID dell'utente.";
            }
        } else {
            echo "Errore nella preparazione dell'istruzione SQL per ottenere l'ID dell'utente.";
        }
    } else {
        echo "L'utente non è loggato.";
    }
}



// Chiudi la connessione al database
$db_connection->close();

echo "<script>window.location.href = '../../../../index.php';</script>";
