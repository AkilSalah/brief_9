<?php
class Question {
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

    public function selectQuestions() {
        $sqlQuestion = "SELECT * FROM questions ORDER BY RAND()";
        $queryQuestion = $this->db->prepare($sqlQuestion);
        $queryQuestion->execute();
        $questions = $queryQuestion->fetchAll(PDO::FETCH_ASSOC);

        $formattedQuestions = [];
        foreach ($questions as $question) {
            $reponse = new Reponse($this->db);
            $reponse->setId_question($question['id_question']);
            
            $formattedQuestion = [
                'question_text' => $question['question'],
                'reponses' => $reponse->selectResponse()
            ];
            $formattedQuestions[] = $formattedQuestion;
        }

        return $formattedQuestions;
    }

    public function getQuestionsAsJSON() {
        $formattedQuestions = $this->selectQuestions();
        return json_encode($formattedQuestions);
    }
}


require ('../config/db.php');
$question = new Question($con);
echo $question->getQuestionsAsJSON();



?>
