<?php
require 'model.classe.php';
class Controller
{
    private $m;
    public function __construct()
    {
        $this->m = new Model();
    }

    #l'action qui envoie vers la page home
    public function homeAction()
    {
        include 'view.classe.php';
    }

    #La fonction qui controlle toutes les actions
    public function action()
    {
        $action = "home";
        switch( $action )
        {
            case "home": $this->homeAction(); break;
        }
    }
}
$c = new Controller();
$c->action();
?>