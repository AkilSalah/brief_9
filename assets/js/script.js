        const correction =document.getElementById('correction');
        const title =document.querySelector('.bienvenue')
        const themeElement = document.getElementById("theme");
        const questionElement = document.getElementById("question");
        const answerButton = document.getElementById("answer-buttons");
        const nextButton = document.getElementById("next-btn");
        const questionE = document.getElementById("questionE");
        const answerE = document.getElementById("answerE");
        const explication = document.getElementById("explication");


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
          themeElement.innerText =" Question theme : " + currentQuestion.theme;
          questionElement.innerHTML = questionNo + ". " + currentQuestion.question_text;

          Array.from(answerButton.children).forEach(button => {
              button.removeEventListener("click", selectReponse);
          });

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

          console.log("Current Question:", currentQuestion);
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
            if (score >= 7) {
            title.innerHTML = "Congratulations sir " + "<?php echo $_SESSION['NickName']; ?>";
            questionElement.innerHTML = "Score: " + score + " out of " + array.length + " !!";
            themeElement.innerText = "";
            } else {
            title.innerHTML = "Bad work sir " + "<?php echo $_SESSION['NickName']; ?>";
            questionElement.innerHTML = "Your score: " + score + " out of " + array.length + " !!";
            themeElement.innerText = "Try to answer at least seven questions to win";
            correction.style.display = 'block';
            

        }
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
            console.log("Current Index:", currentQuestionIndex);

        });

        function startQuiz() {
            currentQuestionIndex = 0;
            score = 0;
            nextButton.innerHTML = "Next";
            showQuestion();
        }

        correction.addEventListener("click", () => {
             window.location.href = "../views/correction.php";

        });

        function explainQuestion(){
           



        }
    