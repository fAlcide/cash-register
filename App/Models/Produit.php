<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Produit extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM Produit');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getById($id)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM Produit WHERE id = ' . $id);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
