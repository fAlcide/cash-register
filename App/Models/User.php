<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get all the users as an associative array
     *
     */
    public static function createUser()
    {
        $db = static::getDB();
        $db->exec('INSERT INTO Users(nom, prenom, droits) VALUES("Adlani", "Ibrahim", "0");');
    }
}
