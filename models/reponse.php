<?php
class Reponse {
    private $db;
    private $id_question;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getId_question() {
        return $this->id_question;
    }
    

    public function setId_question($id_question) {
        $this->id_question = $id_question;
    }
    
    public function selectResponse() {
        $idQuestion = $this->getId_question();
        $correctResponse = $this->correctResponse();
        $sqlResponses = "SELECT reponse FROM reponses WHERE id_question = :id_question";
        $queryResponses = $this->db->prepare($sqlResponses);
        $queryResponses->bindParam(':id_question', $idQuestion);
        $queryResponses->execute();
        $responses = $queryResponses->fetchAll(PDO::FETCH_ASSOC);

        $formattedResponses = [];
        foreach ($responses as $response) {
            $formattedResponses[] = [
                'reponse' => $response['reponse'],
                'correct' => $response['reponse'] == $correctResponse,
            ];
        }

        return $formattedResponses;
    }

    public function correctResponse() {
        $idQuestion = $this->getId_question();
        $sql = "SELECT reponse FROM questions JOIN reponses ON reponses.id_reponse = questions.id_reponse WHERE questions.id_question = :id_question";
        $correctResponseQuery = $this->db->prepare($sql);
        $correctResponseQuery->bindParam(':id_question', $idQuestion);
        $correctResponseQuery->execute();
    
        $correctResponse = $correctResponseQuery->fetch(PDO::FETCH_ASSOC);
            return $correctResponse['reponse'];
        
    }
    
}

// require_once("../config/db.php");

// $id_question = 2;

// $reponse = new Reponse($con);
// $reponse->setId_question($id_question);

// $formattedResponses = $reponse->selectResponse();

// var_dump($formattedResponses);
?>
