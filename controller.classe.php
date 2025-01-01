<?php
require 'model.classe.php';
class Controller
{
    private $m;
    public function __construct()
    {
        $this->m = new Model();
    }

    #l'action qui renvoie vers la page home
    public function homeAction()
    {
        include 'views/base.view.php';
    }

    public function showAllEtudiantActiuon()
    {
        $etudiants = $this->m->getAllEtudiants();
        $content = 'views/showAllEtudiant.view.php';
        include 'views/base.view.php';
    }
    #La fonction qui controlle toutes les actions
    public function action()
    {
        $action = "home";
        if (isset($_GET['action']))
        {
            $action = $_GET['action'];
        }
        switch( $action )
        {
            case 'home': $this->homeAction(); break;
            case 'showAllEtudiants': $this->showAllEtudiantActiuon(); break;
        }
    }
}
$c = new Controller();
$c->action();
?>