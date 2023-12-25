<?php
session_start();
include("../config/db.php");

// // Récupérer les questions une fois
// $question->selectQuestions();
// $quiz = $question->getQuestionsAsJSON();

// // Décoder le JSON pour obtenir un tableau associatif
// $questions = json_decode($quiz, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Quiz</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/quiz.css'>
</head>
<body>
    <div class="app">
        <h1 class="bienvenue">Bienvenue, <?php echo $_SESSION['NickName']; ?>, à Akil's Quiz !</h1>
        <div class="quiz">
            <h2 id="question"></h2>
            <div id="answer-buttons"></div>
            <button id="next-btn" onclick="handleNextButton()">Next</button>
        </div>
    </div>
    <script>
        const questionElement = document.getElementById("question");
        const answerButton = document.getElementById("answer-buttons");
        const nextButton = document.getElementById("next-btn");

        let array = [];
        let currentQuestionIndex = 0;
        let score = 0;

        window.onload = () => {
            let xml = new XMLHttpRequest();

            xml.onreadystatechange = () => {
                if (xml.readyState === 4 && xml.status === 200) {
                    array = JSON.parse(xml.responseText);
                    showQuestion();
                }
            };

            xml.open("GET", "../models/quizC.php", true);
            xml.send();
        }

        function showQuestion() {
            resetState();
            let currentQuestion = array[currentQuestionIndex];
            let questionNo = currentQuestionIndex + 1;
            questionElement.innerHTML = questionNo + ". " + currentQuestion.question_text;

            currentQuestion.reponses.forEach(reponse => {
                const button = document.createElement("button");
                button.innerText = reponse.reponse;
                button.classList.add("btn");
                answerButton.appendChild(button);

                if (reponse.correct) {
                    button.dataset.correct = 'true';
                }

                button.addEventListener("click", selectReponse);
            });
        }

        function resetState() {
            nextButton.style.display = 'none';
            while (answerButton.firstChild) {
                answerButton.removeChild(answerButton.firstChild);
            }
        }

        function selectReponse(event) {
            const selectedButton = event.target;
            const isCorrect = selectedButton.dataset.correct === 'true';

            if (isCorrect) {
                selectedButton.classList.add("correct");
                score++;
            } else {
                selectedButton.classList.add("incorrect");
            }

            Array.from(answerButton.children).forEach(button => {
                if (button.dataset.correct === 'true') {
                    button.classList.add("correct");
                }
                button.disabled = true;
            });

            nextButton.style.display = 'block';
        }

        function showScore() {
            resetState();
            questionElement.innerHTML = "Score : " + score + " out of " + array.length + " !!";
            nextButton.innerHTML = "Play Again";
            nextButton.style.display = 'block';
        }

        function handleNextButton() {
            currentQuestionIndex++;
            if (currentQuestionIndex < array.length) {
                showQuestion();
            } else {
                showScore();
            }
        }

        nextButton.addEventListener("click", () => {
            if (currentQuestionIndex < array.length) {
                handleNextButton();
            } else {
                startQuiz();
            }
        });

        function startQuiz() {
            currentQuestionIndex = 0;
            score = 0;
            nextButton.innerHTML = "Next";
            showQuestion();
        }
    </script>
</body>
</html>
