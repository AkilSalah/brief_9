const title = document.querySelector('.bienvenue');
const themeElement = document.getElementById('theme');
const questionElement = document.getElementById('question');
const answerButton = document.getElementById('answer-buttons');
const nextButton = document.getElementById('next-btn');
const correction = document.getElementById('correction');

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

    xml.open('GET', '../models/quizC.php', true);
    xml.send();
};
    let currentQuestion;

function showQuestion() {
    resetState();
     currentQuestion = array[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;

    themeElement.innerText = ' Question theme : ' + currentQuestion.theme;
    questionElement.innerHTML = questionNo + '. ' + currentQuestion.question_text;

    Array.from(answerButton.children).forEach(button => {
        button.removeEventListener('click', selectReponse);
    });

    currentQuestion.reponses.forEach(reponse => {
        const button = document.createElement('button');
        button.innerText = reponse.reponse;
        button.classList.add('btn');
        answerButton.appendChild(button);

        if (reponse.correct) {
            button.dataset.correct = 'true';
        }

        button.addEventListener('click', selectReponse);
    });

    console.log('Current Question:', currentQuestion);
}

function resetState() {
    nextButton.style.display = 'none';
    while (answerButton.firstChild) {
        answerButton.removeChild(answerButton.firstChild);
    }
}

let questionwrong = [];
function selectReponse(event) {
    const selectedButton = event.target;
    const isCorrect = selectedButton.dataset.correct === 'true';

    if (isCorrect) {
        selectedButton.classList.add('correct');
        score++;
    } else {
        selectedButton.classList.add('incorrect');

        let correctAnswer = Array.from(answerButton.children)
            .find(button => button.dataset.correct === 'true')?.innerText || '';

        let object = {
            question: questionElement.textContent,
            answer: selectedButton.innerText,
            correctAnswer: correctAnswer,
            explanation: currentQuestion.correction
        };

        questionwrong.push(object);
        console.log('Incorrect Responses:', questionwrong);
    }

    Array.from(answerButton.children).forEach(button => {
        if (button.dataset.correct === 'true') {
            button.classList.add('correct');
        }
        button.disabled = true;
    });

    nextButton.style.display = 'block';
}



function showScore() {
    resetState();

    if (score === 10) {
        title.innerHTML = 'Congratulations sir ' + NickName;
        questionElement.innerHTML = 'Score: ' + score + ' out of ' + array.length + '!!';
        themeElement.innerText = '';
    } else if (score >= 7 && score < 10) {
        title.innerHTML = 'Congratulations sir ' + NickName;
        questionElement.innerHTML = 'Score: ' + score + ' out of ' + array.length + ' !!';
        themeElement.innerText = 'See the questions you answered wrong with its explanation';
        correction.style.display = 'block';
    } else {
        title.innerHTML = 'Bad work sir ' + NickName;
        questionElement.innerHTML = 'Your score: ' + score + ' out of ' + array.length + ' !!';
        themeElement.innerText = 'See the questions you answered wrong with its explanation';
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

nextButton.addEventListener('click', () => {
    if (currentQuestionIndex < array.length) {
        handleNextButton();
    } 
    console.log('Current Index:', currentQuestionIndex);
});

function startQuiz() {
    currentQuestionIndex = 0;
    score = 0;
    nextButton.innerHTML = 'Next';
    showQuestion();
}


document.getElementById('correction').addEventListener('click', () => {
    const correction = document.getElementById('correction');
    correction.style.display = 'none';

    const quizDiv = document.querySelector('.quiz');

    for (let i = 0; i < questionwrong.length; i++) {
        var div = document.createElement('div');
        div.classList.add('question-div');
        div.innerHTML = `
            <h2 id="questionE">QUESTION : ${questionwrong[i].question}</h2>
            <div id="answerE">YOUR ANSWER : ${questionwrong[i].answer}</div>
            <p> CORRECT ANSWER : ${questionwrong[i].correctAnswer}</p>
            <p id="explication" >EXPLANATION : ${questionwrong[i].explanation.correction}</p>
            
        `;
        quizDiv.appendChild(div);
    }

    var logoutButton = document.createElement('button');
    logoutButton.id = 'logout';
    logoutButton.textContent = 'Logout';
    quizDiv.appendChild(logoutButton);

    logoutButton.addEventListener('click', function() {
        window.location.href = '../views/nickname.php';
    });
});


