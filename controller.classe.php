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

    #L'action de login et sign-up
    public function loginSignUpAction()
    {
        include 'views/login.signup.view.php';
    }

    public function AddUserAction(){

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $hasehedPassword = hash('sha256', $_POST['pswd']);
        $profil=array($_POST['email'],$hasehedPassword,$_POST['statut'], null, $nom, $prenom);
        $this->m->AddUser($profil);
        $statut=$_POST['statut'];

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['photo']['tmp_name'];
            $fileType = $_FILES['photo']['type'];
            $newFileName = $nom . '_' . $prenom . '.jpg';
            $uploadFileDir = __DIR__ . '/Imgs/';
            $destPath = $uploadFileDir . $newFileName;

        }

        switch ($statut) {
            case 'ADMIN':
                echo "Administrateur ajouté avec succès.";
                break;
            case 'PROF':
                $prof=array($_POST['email'],$_POST['departement']);
                $this->m->AddProfessor($prof);
                echo "Professeur ajouté avec succes";
                break;

            case 'STUD':
                $student=array($_POST['email'],$_POST['departement'],$_POST['filiere'],$_POST['classe']);
                $this->m->AddStudent($student);
                $message = "Étudiant ajouté avec succès.";
                break;
    }

    header('location: controller.classe.php?action=showAllProfiles');
}


    public function showProfiles(){
        $hasehedPassword = hash('sha256',$_POST['pswd']);
        $profil=array($_POST['email'],$hasehedPassword);
        $log=$_POST['email'];
        echo $hasehedPassword;
        $stat=$this->m->Statut($log,$hasehedPassword);
        switch($stat){

            /*On va faire une redirection vers une vue d'affichage selon chaque profil*/
            case 'ADMIN':
                header('location: controller.classe.php?action=showAllProfiles');
                break;            
            case 'STUD':
                header('location: controller.classe.php?action=StudentInfos&log=' .$log);
                    /* A partir de showInfo il va etre redirigee vers soit showNotes soit Show Test selon ce qu'il va choisir */
                break;
            case 'PROF':
                 /**/
        }
    }

    # Admin actions
    public function showAllProfilesAction()
    {
        $etudiants = $this->m->getUsers('ALL', array("type" => "'STUD'"));
        $professeurs = $this->m->getUsers('ALL', array("type" => "'PROF'"));
        $admins = $this->m->getUsers('ALL', array("type" => "'ADMIN'"));
        
        $styles = array('list&Slider.css');
        $scripts = array('slider.js');
        $content = 'views/admin/showAllProfiles.view.php';
        include 'views/base.view.php';
    }

    public function createAcountAction()
    {
        include 'views/admin/createacount.view.php';
    }

    public function showAllOfType()
    {
        $styles = array('list&Slider.css');
        $content = 'views/admin/showAllOfType.view.php';
        include 'views/base.view.php';
    }

    #Student actions
    public function showEtudiantInfosAction()
    {
        $log = $_GET["log"];
        $result=$this->m->GetInfoStudent($log);
        $styles = array('StyleInfos.css');
        $content='views/etudiant/showInfos.view.php';
        include 'views/base.view.php';
    }
    public function showGradesEtudiantAction(){
        $var1 = $_GET['var1'];
        $result=$this->m->GetNoteStudent($var1);
        $styles=array('styletable.css');
        $content = 'views/etudiant/showNotes.view.php';
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
            case 'home': $this->loginSignUpAction(); break;
            case 'loginSignUp': $this->loginSignUpAction(); break;
            case 'AddUser':$this->AddUserAction();break;
            case 'show':$this->showProfiles();break;
            
            #Admin views action
            case 'showAllProfiles': $this->showAllProfilesAction(); break;
            case 'showAllOfType': $this->showAllOfType(); break;
            case 'createAcount': $this->createAcountAction();break;

            #Student views actions
            case 'StudentInfos': $this->showEtudiantInfosAction();break;
            case'GradesStudent' :$this->showGradesEtudiantAction();break;

        }
    }
}

$c = new Controller();
$c->action();
?>