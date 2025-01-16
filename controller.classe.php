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
        session_start();
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
        {
            switch($_SESSION['statut']){

                /*On va faire une redirection vers une vue d'affichage selon chaque profil*/
                case 'ADMIN':
                    header('location: controller.classe.php?action=showAllProfiles');
                    break;            
                case 'STUD':
                    header('location: controller.classe.php?action=StudentInfos&log=' .$_SESSION['login']);
                        /* A partir de showInfo il va etre redirigee vers soit showNotes soit Show Test selon ce qu'il va choisir */
                    break;
                case 'PROF':
                    header('location: controller.classe.php?action=Showcoursprof&log=' .$_SESSION['login']);
                    break;
            }
        }
        else
        {
            header("Location: controller.classe.php?action=loginSignUp");
        }
    }

    #L'action de login et sign-up
    public function loginSignUpAction()
    {
        if (isset($_GET['warning'])) $warning = $_GET['warning'];
        include 'views/login.signup.view.php';
    }

    public function logoutAction()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: controller.classe.php?action=loginSignUp");
    }

    public function resetPassworFormAction()
    {
        if (isset($_GET['warning'])) $warning = $_GET['warning'];
        include 'views/reset.password.php';
    }
    public function resetPassworAction()
    {
        session_start();
        $pswrd1 = $_POST["pswd1"];
        $pswrd2 = $_POST["pswd2"];
        if ($pswrd1 != $pswrd2)
        {
            $warning = "Passwords don't match eachother!";
            header("Location: controller.classe.php?action=resetPasswordForm&warning=" .$warning);
        }
        else
        {
            $log = $_SESSION['login'];
            $hasehedPassword = hash('sha256',  $pswrd1);
            $this->m->ChangePassword($log, $hasehedPassword);
            $warning = "Password rest successfully";
            header("Location: controller.classe.php?action=loginSignUp&warning=" .$warning);

        }
    }

    public function AddUserAction(){
        $st = ['ADMIN'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $log = $_POST['email'];

        $hasehedPassword = hash('sha256', $_POST['pswd']);
        $statut=$_POST['statut'];
        $photoName = null;

        
        if (isset($_FILES['photo'])and $_FILES['photo']['name'] != '') {
            $targetDir = "Imgs/";
            $fileTmpPath = $_FILES['photo']['tmp_name'];
            $newFileName = $log . '.' . strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
            $destPath = $targetDir . $newFileName;

            move_uploaded_file($fileTmpPath, $destPath);
            if (isset($newFileName)) $photoName = $newFileName;
            
            
        }
        
        $profil=array($_POST['email'],$hasehedPassword,$_POST['statut'], $photoName, $nom, $prenom);
        $add = $this->m->AddUser($profil);
        if ($add ==true)
        {
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
        else
        {
            $warning = "Email est déja pris";
            header("Location: controller.classe.php?action=createAcount&warning=" .$warning);
        }
}


    public function showProfiles(){
        $hasehedPassword = hash('sha256',$_POST['pswd']);
        $profil=array($_POST['email'],$hasehedPassword);
        $log=$_POST['email'];
        $stat=$this->m->Statut($log,$hasehedPassword);
        if ($stat == false)
        {
            $warning = "Password or Email incorrect!";
            header("Location: controller.classe.php?action=loginSignUp&warning=" .$warning);
        }
        else
        {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['login'] = $log;
            $_SESSION['statut'] = $stat;

            $_SESSION['last_activity'] = time();
            $_SESSION['expire_time'] = 1800;

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
                    header('location: controller.classe.php?action=Showcoursprof&log=' .$log);
                    break;
            }
        }
    }

    # Admin actions
    public function showAllProfilesAction()
    {
        $st = ['ADMIN'];
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
        $st = ['ADMIN'];
        if (isset($_GET['warning'])) $warning = $_GET['warning'];
        include 'views/admin/createacount.view.php';
    }

    public function showAllOfType()
    {
        $st = ['ADMIN'];
        $type = $_GET['type'];
        $users = $this->m->getUsers($type);
        $styles = array('list&Slider.css');
        $content = 'views/admin/showAllOfType.view.php';
        include 'views/base.view.php';
    }

    #Student actions
    public function showEtudiantInfosAction()
    {
        $st = ['STUD'];
        $log = $_GET["log"];
        $result=$this->m->GetInfoStudent($log);
        $styles = array('StyleInfos.css');
        $content='views/etudiant/showInfos.view.php';
        include 'views/base.view.php';
    }
    public function showGradesEtudiantAction(){
        $st = ['STUD'];
        $var1 = $_GET['var1'];
        $result=$this->m->GetNoteStudent($var1);
        $styles=array('styletable.css');
        $content = 'views/etudiant/showNotes.view.php';
        include 'views/base.view.php';
    }

    
    public function showProfInfosAction()
    {
        $st = ['ADMIN'];
        $log = $_GET["log"];
        $result=$this->m->GetInfoProf($log);
        $styles = array('StyleInfos.css');
        $content='views/admin/showInfoProf.php';
        include 'views/base.view.php';
    }

    public function showAdminInfosAction()
    {
        $st = ['ADMIN'];
        $log = $_GET["log"];
        $result=$this->m->GetInfoAdmin($log);
        $styles = array('StyleInfos.css');
        $content='views/admin/showInfoAdmin.php';
        include 'views/base.view.php';
    }
    public function showAllStudofprof() {
        $st = ['PROF'];
        $log = $_GET['prof_log'];
        $cour= $_GET['course_titre'];
        $cour_id = $_GET['course_id'];
        $etudiants=$this->m->Studentincourse($cour);
        $styles = array('list&Slider.css');
        $scripts = array('slider.js');  
        $content='views/prof/showStudents.view.php';
        include 'views/base.view.php';

    }



    public function InsertMark(){
        $st = ['PROF'];
        $prof =$_GET['prof_log'];
        $course = $_GET['course_titre'];
        $etudiant=$_GET['student_log'];
        $styles = array('stylenote.css');  
        $content = 'views/prof/insertNotes.view.php';
        include 'views/base.view.php';
        
    }

    public function saveMark(){
    $st = ['PROF'];
    $studentLog = $_POST['student_log']; 
    $profLog = $_POST['prof_log'];           
    $note = $_POST['note'];  
    $cours= $_POST['cours'];       


    $result = $this->m->insertNote($studentLog, $profLog, $note,$cours);

    if ($result) {                                                                                                       
        header("Location: controller.classe.php?action=AllStudent&prof_log=" . urlencode($profLog) . "&course_titre=" . urlencode($cours) . "&success=1");

    }

    }

    public function ShowCourses(){
        $st = ['PROF'];
        $log=$_GET['log'];
        $courses=$this->m->GetcoursesProf($log);
        $styles = array('list&Slider.css');
        $scripts = array('slider.js'); 
        $content = 'views/prof/showcourses.php';
        include 'views/base.view.php';
    }


    public function showAllStuds()
    {
        $st = ['PROF'];
        $log = $_GET['prof'];
        $cours_id = $_GET['cours_id'];
        $cours_titre = $_GET['course_titre'];
        $etudiants = $this->m->getUsers('STUD');
        $styles = array('list&Slider.css');
        $content = 'views/prof/showAllStudents.php';
        include 'views/base.view.php';
    }

    public function initialiserNoteAction()
    {
        $prof = $_GET['prof'];
        $etudiant = $_GET['etudiant'];
        $cours_id = $_GET['cours_id'];
        $cours_titre = $_GET['cours_titre'];
        $this->m->creerNote($prof, $etudiant, $cours_id);
        header("Location: controller.classe.php?action=AllStudent&prof_log=" . urlencode($prof) . "&course_titre=" . urlencode($cours_titre). "&course_id=" .urlencode($cours_id) . "&success=1");
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
            case 'loginSignUp': $this->loginSignUpAction(); break;
            case 'logout': $this->logoutAction();break;
            case 'AddUser':$this->AddUserAction();break;
            case 'show':$this->showProfiles();break;
            case 'resetPassword':$this->resetPassworAction();break;
            case 'resetPasswordForm':$this->resetPassworFormAction();break;

            #Admin views action
            case 'showAllProfiles': $this->showAllProfilesAction(); break;
            case 'showAllOfType': $this->showAllOfType(); break;
            case 'createAcount': $this->createAcountAction();break;
            case 'showProfInfos': $this->showProfInfosAction();break;
            case 'showAdminInfos': $this->showAdminInfosAction();break;

            #Student views actions
            case 'StudentInfos': $this->showEtudiantInfosAction();break;
            case'GradesStudent' :$this->showGradesEtudiantAction();break;
             #Prof views action
            case 'Showcoursprof' : $this->ShowCourses();break;
            case 'AllStudent':$this->showAllStudofprof();break;
            case 'InsertMarks': $this->InsertMark();break;
            case 'SaveNote': $this->saveMark();break;
            case 'ShowAllStudents': $this->showAllStuds();break;
            case 'initialiser': $this->initialiserNoteAction();break;

        }
    }
}

$c = new Controller();
$c->action();
?>