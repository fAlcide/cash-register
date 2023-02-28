<?php

namespace App\Controllers;

use App\Models\User as ModelsUser;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class UserControler extends \Core\Controller
{

    private $user;

    function __construct() {
        $this->user = new ModelsUser();
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $test = $this->user->getAll();
        View::render('Users/index.php', 
            ["users" => $test]
        );
    }

    /**
     * Show the create page
     *
     * @return void
     */
    public function createUserAction(){
        $this->user->createUser();
    }
}
