<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Facture extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT f.id, f.date_creation, ef.etat FROM Facture f JOIN Etat_facture ef ON f.etat = ef.id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public function creerFacture($id_client, $paiement, $listeProduitsQte)
    {
        $db = static::getDB();

        $sql = "INSERT INTO Facture(client, etat) VALUES (?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id_client, $paiement]);

        $id = $db->lastInsertId();
        
        for ($i=0; $i < sizeof($listeProduitsQte); $i++) {
            $query = "INSERT INTO facture_produit VALUES (?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$id, $listeProduitsQte[$i]['name'], $listeProduitsQte[$i]['value']]);
        }

    }
}
