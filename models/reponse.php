<?php 
class response{
    private $db;
    private $response;
    private $idReponse;
    private $idQuestion;

    public function __construct($con){
        $this->db = $con;
    }

    public function getResponse() {
        return $this->response;
    }
    public function setResponse($response) {
        $this->response = $response;
    }
    public function getIdReponse() {
        return $this->idReponse;
    }
    public function setIdReponse($idReponse) {
        $this->idReponse = $idReponse;
    }
    public function getIdQuestion() {
        return $this->idQuestion;
    }
    public function setIdQuestion($idQuestion) {
        $this->idQuestion = $idQuestion;
    }
    
    public function selectResponse(){
        $idQuestion=$this->getIdQuestion();
        $sqlResponses = "SELECT * FROM reponses WHERE id_question = :id_question";
        $queryResponses = $this->db->prepare($sqlResponses);
        $queryResponses->bindParam(':id_question',$idQuestion );
        $queryResponses->execute();
        $responses = $queryResponses->fetchAll();
        return $responses;
    }

    public function correctResponse(){
        $sql = " SELECT * from questions join reponses on reponses.id_reponse = questions.id_reponse ";
        $correctResponses = $this->db->prepare($sql);
        $correctResponses->execute();
        $correctResponses = $correctResponses->fetchAll();
        return $correctResponses;
    }
    











}




















?>