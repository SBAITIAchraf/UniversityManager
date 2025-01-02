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
}
?>