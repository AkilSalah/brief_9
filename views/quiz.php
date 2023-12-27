<?php
session_start();
include("../config/db.php");
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
        <h1 class="bienvenue">Welcome, <?php echo $_SESSION['NickName']; ?> !</h1>
        <div class="quiz">
            <h2 id="question"></h2>
            <h3 id="theme"></h3>
            <div id="answer-buttons"></div>
            <button id="next-btn">Next</button>
            <button id="correction">Explanation</button>
        </div>
    </div>
        </div>
    <script>
        var NickName = <?php echo json_encode($_SESSION['NickName']); ?>;
    </script>
    <script src="../assets/js/script.js">
    </script>

</body>

</html>