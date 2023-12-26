<?php
session_start();

if (isset($_POST['submit'])) {
    $_SESSION['NickName'] = $_POST['nom'];
    header('Location: quiz.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="../assets/css/nickname.css">
    <title>Bienvenue</title>
</head>
<body>
<video autoplay muted loop id="myVideo">
        <source src="../assets/images/700_F_208412274_B2m3HznMo5uPYQulaweAwCXi3uFSnobo_ST.mp4" type="video/mp4">
        </video>
    
<section>
        <div class="form-box">
            <div class="form-value">
            <form action="nickname.php" method="post">
                <div class="logo">
                    <img src="../assets/images/aws-logo.png"  >
                </div>
                    <div class="inputbox">
                        <input type="text" name="nom" placeholder="Your Nickname" required>
                    </div>
                    <div class="button">
                     <a href=""><input type="submit" id="commencer" name="submit" value="Commencer"></a> 
                    </div>
                    
                </form>
            </div>
        </div>
    </section>

</body>
</html>
