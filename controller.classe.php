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
        include 'views/showAllEtudiant.view.php';
        include 'views/base.view.php';
    }   

    public function AddUser(){
        $profil=array($_POST['email'],$_POST['pswd'],$_POST['statut']);
        $prof=array($_POST['email'],$_POST['nom'],$_POST['prenom'],$_POST['departement']);
        $admin=array($_POST['email'],$_POST['nom'],$_POST['prenom']);
        $student=array($_POST['email'],$_POST['nom'],$_POST['prenom'],$_POST['departement'],$_POST['filiere'],$_POST['classe']);

        $this->m->AddUser($profil);

        $statut=$_POST['statut'];

        switch ($statut) {
            case 'ADMIN':
                $this->m->AddAdmin($admin);
                echo "Administrateur ajouté avec succès.";
                break;
            case 'PROF':
                $this->m->AddProfessor($prof);
                echo "Professeur ajouté avec succes";
                break;

            case 'STUD':
                $this->m->AddStudent($student);
                $message = "Étudiant ajouté avec succès.";
                break;
    }
            header('location:controller.class.php');
}


    public function showProfiles(){

        $profil=array($_POST['email'],$_POST['pswd']);
        $log=$_POST['email'];
        $pass=$_POST['pswd'];
        $stat=$this->m->Statut($log,$pass);
        switch($stat){

            /*On va faire une redirection vers une vue d'affichage selon chaque profil*/
            case 'ADMIN':
                /**/              
            case 'STUD':
                /**/
            case 'PROF':
                 /**/
        }
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
            case 'Addprofil':$this->AddUser();break;
            case 'show':$this->showProfiles();break;
            case 'showAllEtudiants': $this->showAllEtudiantActiuon(); break;
        }
    }
}

$c = new Controller();
$c->action();
?>