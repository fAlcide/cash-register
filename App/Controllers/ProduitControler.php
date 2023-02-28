<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Produit as ModelsProduit;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class ProduitControler extends \Core\Controller
{

    private $produit;

    function __construct() {
        $this->produit = new ModelsProduit();
    }

    public function getProduitByIdAction()
    {
        
        $id = $_GET['id'];
        $produit = $this->produit->getById($id);
        echo json_encode($produit[0]);
    }
}
