<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Facture as ModelsFacture;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class FactureControler extends \Core\Controller
{

    private $facture;

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $factures = $this->facture->getAll();
        View::render('Facture/index.php', 
            ["factures" => $factures]
        );
    }
    
    function __construct() {
        $this->facture = new ModelsFacture();
    }

    public function creerFactureAction(){
        $listeProduitsQte = $_POST["produits"];
        $id_client = $_POST["id_client"];
        $paiement = $_POST["paiement"];

        $this->facture->creerFacture($id_client, $paiement, $listeProduitsQte);
    }
}
