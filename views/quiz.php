<?php
session_start();
include("../config/db.php");
$quiz = $question->selectQuestion();

$reponse->setIdQuestion($quiz['id_question']);
$reponses = $reponse->selectResponse();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Quiz</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/quiz.css'>
    <script src='main.js'></script>
</head>
<body>
    <div class="app">
        <h1>Bienvenue, <?php echo $_SESSION['NickName']; ?>, à Akil's Quiz !</h1>
        <div class="quiz">
            <h2 id="question"><?= $quiz['question'] ?></h2>
            <div id="answer">
                <?php foreach ($reponses as $reponse): ?>
                    <button class="btn"><?= $reponse['reponse'] ?></button>
                <?php endforeach; ?>
            </div>
            <button id="next-btn" onclick="nextQuestion()">Next</button>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
