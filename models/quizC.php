<?php
class quizz {
    private $db;
    private $idQuestion;
    private $question ;
    private $idTheme;
    private $idReponse;

    public function __construct($con){
        $this->db = $con;
    }

    public function getIdQuestion() {
        return $this->idQuestion;
    }
    public function setIdQuestion($idQuestion) {
        $this->idQuestion = $idQuestion;
    }
    public function getQuestion() {
        return $this->question;
    }
    public function setQuestion($question) {
        $this->question = $question;
    }
    public function getIdTheme() {
        return $this->idTheme;
    }
    public function setIdTheme($idTheme) {
        $this->idTheme = $idTheme;
    }
    public function getIdReponse() {
        return $this->idReponse;
    }
    public function setIdReponse($idReponse) {
        $this->idReponse = $idReponse;
    }
    
    public function selectQuestion(){
        $sqlQuestion = "SELECT * FROM questions ORDER BY RAND() LIMIT 1";
        $queryQuestion = $this->db->prepare($sqlQuestion);
        $queryQuestion->execute();
        $question = $queryQuestion->fetch();
        return $question;
    }



}


















?>