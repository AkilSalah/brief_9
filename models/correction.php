<?php 
class correction {
    private $db ;
    private $id_question ;
    private $id_reponse ;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function setId_question($id_question) {
        $this->id_question = $id_question;
    }
    
    public function setId_reponse($id_reponse) {
        $this->id_reponse = $id_reponse;
    }
    
    public function getId_question() {
        return $this->id_question;
    }
    
    public function getId_reponse() {
        return $this->id_reponse;
    }
    public function getCorrect() {
        $idQuestion = $this->getId_question();
        $idReponse = $this->getId_reponse();
        $sqlCorrect = "SELECT correction FROM questions WHERE id_question = :id_question AND id_reponse = :id_reponse";
        $queryCorrect = $this->db->prepare($sqlCorrect);
        $queryCorrect->bindParam(':id_question', $idQuestion);
        $queryCorrect->bindParam(':id_reponse', $idReponse);
        $queryCorrect->execute();
        $correct = $queryCorrect->fetch(PDO::FETCH_ASSOC);
        return $correct;
    }
    
}


require ('../config/db.php');

$correction = new correction($con);

echo $correction->getCorrect();



?>