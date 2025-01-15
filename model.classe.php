<?php
class Model
{
    public $db;
    public function __construct()
    {
        define("USER","root");
        define("PASS","");
        $this->db = new PDO("mysql:host=localhost; dbname=univmanager", USER, PASS);
    }
    
    public function getUsers($type = "ALL" ,$filter = null)
    {
        $table = "";
        if ($type == "ALL")
        {
            $table = "utilisateur";
        }
        elseif ($type == "STUD")
        {
            $table = "etudiantfullinfo";
        }
        elseif ($type == "PROF")
        {
            $table = "professeurfullinfo";
        }
        elseif ($type == "ADMIN")
        {
            $table = "utilisateur";
            $filter = ['type' => "'ADMIN'"];
        }
        if ($filter == null)
        {
            $query = "select * from " .$table;
            $prepQuery = $this->db->prepare($query);
            $prepQuery->execute();
            return $prepQuery->fetchAll(PDO::FETCH_ASSOC);
        }
        # Fair select avec des un filtre
        else
        {
            $query_filter = "";
            $counter = 0;

            foreach($filter as $colum => $value)
            {
                if ($counter != 0) $query_filter .= " and ";
                $query_filter .= $colum . "=" .$value;
                $counter += 1;
            }

            $query = "select * from " .$table ." where " .$query_filter;
            return $this->db->query($query, PDO::FETCH_ASSOC);
        }
    }

    /* ajouter fonction d'ajout d'un profil */
    public function AddUser($user){
        $query=$this->db->prepare("Insert into utilisateur values(?,?,?, ?, ?, ?)");
        $query->execute($user);
    }

    public function AddStudent($user){
        $query=$this->db->prepare("insert into etudiant values(?,?,?,?)");
        $query->execute($user);
    }
    public function AddProfessor($user){
        $query=$this->db->prepare("insert into professeur values(?,?) ");
        $query->execute($user);
    }

    public function ChangePassword($log, $password)
    {
        $query = "UPDATE utilisateur SET password='" .$password ."' WHERE login='" .$log ."'";
        $this->db->query($query);
    }

    public function Statut($log,$pass):string{

        $query = $this->db->prepare("SELECT type FROM utilisateur WHERE login = :login AND password = :password");
        $query->bindParam(':login', $log, PDO::PARAM_STR);
        $query->bindParam(':password', $pass, PDO::PARAM_STR);
        $query->execute();
        $type = $query->fetch();
        if (!$type) return false;
        return $type[0];
    }

    public function GetNoteStudent($student)
    {
    $query = $this->db->prepare("
        SELECT c.titre AS course, p.nom AS nom, p.prenom AS prenom, n.note AS note , n.date AS date, st.departement AS departement, st.filiere AS filiere, st.classe AS classe
        FROM note AS n
        INNER JOIN professeurfullinfo AS p ON n.prof = p.login
        INNER JOIN cours AS c ON n.cours = c.id
        INNER JOIN etudiantfullinfo AS st ON n.etudiant= st.login
        WHERE n.etudiant = :login
    ");
    $query->bindParam(':login', $student, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

    public function GetInfoStudent($stud){

        $query=$this->db->prepare("SELECT * FROM etudiantfullinfo where login= :login");
        $query->bindParam(':login',$stud,PDO::PARAM_STR );
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetInfoProf($stud){

        $query=$this->db->prepare("SELECT * FROM professeurfullinfo where login= :login");
        $query->bindParam(':login',$stud,PDO::PARAM_STR );
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function GetInfoAdmin($stud){

        $query=$this->db->prepare("SELECT * FROM utilisateur where login= :login");
        $query->bindParam(':login',$stud,PDO::PARAM_STR );
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertNote($studentLog, $profLog, $note,$cours){
        try {
            $query = $this->db->prepare("UPDATE note
            SET note.note = :note
            WHERE note.prof = :prof
              AND note.cours = (SELECT cours.id FROM cours WHERE cours.titre = :courseTitle)
              AND note.etudiant = :student;");
    
            $query->bindParam(':courseTitle', $cours, PDO::PARAM_STR);
            $query->bindParam(':student', $studentLog, PDO::PARAM_STR);
            $query->bindParam(':prof', $profLog, PDO::PARAM_STR);
            $query->bindParam(':note', $note, PDO::PARAM_STR);
    
            return $query->execute(); // Retourne true si l'insertion réussit, false sinon
        } catch (PDOException $e) {
            // Gérer les erreurs (par exemple, journalisation)
            error_log("Erreur lors de l'insertion de la note : " . $e->getMessage());
            return false;
        }
    
    }
    
            public function GetcoursesProf($prof){
                $query = $this->db->prepare(
                    "SELECT titre FROM cours
                     WHERE prof = :prof"
                );
                $query->bindParam(':prof', $prof, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
        
            }
    
            public function Studentincourse($cours){
                $query = $this->db->prepare(
                    "SELECT etudiant AS login,nom,prenom,photo_profile FROM utilisateur,note AS n,cours AS c WHERE n.cours=c.id AND utilisateur.login=n.etudiant AND c.titre=:cours"
                );
                $query->bindParam(':cours', $cours, PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
    
    }
?>