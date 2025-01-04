<?php
class Model
{
    private $db;
    public function __construct()
    {
        define("USER","root");
        define("PASS","");
        $this->db = new PDO("mysql:host=localhost; dbname=univmanager", USER, PASS);
    }
    
    public function getAllEtudiants()
    {
        $query = "select * from etudiant";
        $prepQuery = $this->db->prepare($query);
        $prepQuery->execute();
        return $prepQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /* ajouter fonction d'ajout d'un profil */
    public function AddUser($user){
        $query=$this->db->prepare("Insert into utilisateur values(?,?,?)");
        $query->execute($user);
    }
    public function AddAdmin($user){
        $query=$this->db->prepare("insert into admin values(?,?,?)");
        $query->execute($user);
    }

    public function AddStudent($user){
        $query=$this->db->prepare("insert into etudiant values(?,?,?,?,?,?)");
        $query->execute($user);
    }
    public function AddProfessor($user){
        $query=$this->db->prepare("insert into professeur values(?,?,?,?) ");
        $query->execute($user);
    }
    public function Statut($log,$pass):string{

        $query = $this->db->prepare("SELECT type FROM utilisateur WHERE login = :login AND password = :password");
        $query->bindParam(':login', $log, PDO::PARAM_STR);
        $query->bindParam(':password', $pass, PDO::PARAM_STR);
        $query->execute();
        $type = $query->fetch(PDO::FETCH_ASSOC);
        $statut = $query->fetchColumn();

        return $statut;
    }

    public function GetNoteStudent($student)
    {
    $query = $this->db->prepare("
        SELECT c.titre AS course, p.nom AS nom, p.prenom AS prenom, n.note AS note , n.date AS date, st.departement AS departement, st.filiere AS filiere, st.classe AS classe
        FROM note AS n
        INNER JOIN professeur AS p ON n.prof = p.login
        INNER JOIN cours AS c ON n.cours = c.id
        INNER JOIN etudiant AS st ON n.etudiant= st.login
        WHERE n.etudiant = :login
    ");
    $query->bindParam(':login', $student, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

    public function GetInfoStudent($stud){

        $query=$this->db->prepare("SELECT nom,prenom,departement,filiere,classe FROM etudiant where login= :login");
        $query->bindParam(':login',$stud,PDO::PARAM_STR );
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}
?>