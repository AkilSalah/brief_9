<?php 

class theme {
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

    public function getTheme() {
        $idQuestion = $this->getId_question();
        $sqlThemes = "SELECT * FROM themes JOIN questions ON themes.id_theme = questions.id_theme  where id_question = :id_question";
        $queryThemes = $this->db->prepare($sqlThemes);
        $queryThemes->bindParam(':id_question', $idQuestion);
        $queryThemes->execute();
        $themes = $queryThemes->fetch(PDO::FETCH_ASSOC);
        return $themes['theme'];
        
    }
}

?>