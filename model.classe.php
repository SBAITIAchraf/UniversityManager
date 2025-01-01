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
}
?>