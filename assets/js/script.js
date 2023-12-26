
// const questionElement = document.getElementById("question");
// const answerButton = document.getElementById("answer-buttons");
// const nextButton = document.getElementById("next-btn");

// let currentQuestionIndex = 0;
// let score = 0;

// function startQuiz() {
//     currentQuestionIndex = 0;
//     score = 0;
//     nextButton.innerHTML = "Next";
//     showQuestion();
// }

// function showQuestion() {
//     resetState();
//     let currentQuestion = Questions[currentQuestionIndex];
//     let questionNo = currentQuestionIndex + 1;
//     questionElement.innerHTML = questionNo + ". " + currentQuestion.question_text;

//     currentQuestion.reponses.forEach(reponse => {
//         const button = document.createElement("button");
//         button.innerText = reponse.reponse;
//         button.classList.add("btn");
//         answerButton.appendChild(button);

//         if (reponse.correct) {
//             button.dataset.correct = 'true'; // Correction ici
//         }

//         button.addEventListener("click", selectReponse);
//     });
// }


// function resetState() {
//     nextButton.style.display = 'none';
//     while (answerButton.firstChild) {
//         answerButton.removeChild(answerButton.firstChild);
//     }
// }

// function selectReponse(event) {
//     const selectedButton = event.target;
//     const isCorrect = selectedButton.dataset.correct === 'true';
    
//     if (isCorrect) {
//         selectedButton.classList.add("correct");
//         score++;
//     } else {
//         selectedButton.classList.add("incorrect");
//     }

//     Array.from(answerButton.children).forEach(button => {
//         if (button.dataset.correct === 'true') {
//             button.classList.add("correct");
//         }
//         button.disabled = true;
//     });

//     nextButton.style.display = 'block';
// }

// function showScore() {
//     resetState();
//     questionElement.innerHTML = "Score : " + score + " out of " + Questions.length + " !!";
//     nextButton.innerHTML = "Play Again";
//     nextButton.style.display = 'block';
// }

// function handleNextButton() {
//     currentQuestionIndex++;
//     if (currentQuestionIndex < Questions.length) {
//         showQuestion();
//     } else {
//         showScore();
//     }
// }

// nextButton.addEventListener("click", () => {
//     if (currentQuestionIndex < Questions.length) {
//         handleNextButton();
//     } else {
//         startQuiz();
//     }
// });

// console.log(Questions);

// startQuiz();



// // const questionElement = document.getElementById("question");
// // const answerButton = document.getElementById("answer-buttons");
// // const nextButton = document.getElementById("next-btn");

// // let currentQuestionIndex = 0;
// // let score = 0;

// // function startQuiz() {
// //     currentQuestionIndex = 0;
// //     score = 0;
// //     nextButton.innerHTML = "Next";
// //     showQuestion();
// // }

// // function showQuestion() {
// //     resetState();
// //     let currentQuestion = Questions[currentQuestionIndex];
// //     let questionNo = currentQuestionIndex + 1;
// //     questionElement.innerHTML = questionNo + ". " + currentQuestion.question_text;

// //     currentQuestion.reponses.forEach(reponse => {
// //         const button = document.createElement("button");
// //         button.innerText = reponse.reponse;
// //         button.classList.add("btn");
// //         answerButton.appendChild(button);

// //         if (reponse.correct) {
// //             button.dataset.correct = reponse.correct;
// //         }

// //         button.addEventListener("click", selectReponse);
// //     });
// // }

// // function resetState() {
// //     nextButton.style.display = 'none';
// //     while (answerButton.firstChild) {
// //         answerButton.removeChild(answerButton.firstChild);
// //     }
// // }

// // function selectReponse(event) {
// //     const selectedButton = event.target;
// //     const isCorrect = selectedButton.dataset.correct === 'true';
    
// //     if (isCorrect) {
// //         selectedButton.classList.add("correct");
// //         score++;
// //     } else {
// //         selectedButton.classList.add("incorrect");
// //     }

// //     Array.from(answerButton.children).forEach(button => {
// //         if (button.dataset.correct === 'true') {
// //             button.classList.add("correct");
// //         }
// //         button.disabled = true;
// //     });

// //     nextButton.style.display = 'block';
// // }

// // function showScore() {
// //     resetState();
// //     questionElement.innerHTML = "Score : " + score + " out of " + Questions.length + " !!";
// //     nextButton.innerHTML = "Play Again";
// //     nextButton.style.display = 'block';
// // }

// // function handleNextButton() {
// //     currentQuestionIndex++;
// //     if (currentQuestionIndex < Questions.length) {
// //         showQuestion();
// //     } else {
// //         showScore();
// //     }
// // }

// // nextButton.addEventListener("click", () => {
// //     if (currentQuestionIndex < Questions.length) {
// //         handleNextButton();
// //     } else {
// //         startQuiz();
// //     }
// // });

// // console.log(Questions);

// // startQuiz();



