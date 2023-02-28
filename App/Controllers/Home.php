<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Produit as ModelsProduit;
use App\Models\User as ModelsUser;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    private $produit;
    private $users;

    function __construct() {
        $this->produit = new ModelsProduit();
        $this->users = new ModelsUser();
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        
        $produits = $this->produit->getAll();
        $users = $this->users->getAll();
        View::render('Home/index.php', 
        ["produits" => $produits,
        "users"=>$users]
    );
    }

    public function getProduitByIdAction()
    {
        
        $id = $_GET['id'];
        $produit = $this->produit->getById($id);
        echo json_encode($produit);
    }
}
