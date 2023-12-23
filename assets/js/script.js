function nextQuestion() {
    let btn = document.getElementById("next-btn");
    btn.addEventListener("click", function () {
        let question = document.getElementById("question");
        let xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                question.innerHTML = xhr.responseText;
            }
        };

        xhr.open('GET', 'quiz.php?next_question=true', true);
        xhr.send();
    });
}


