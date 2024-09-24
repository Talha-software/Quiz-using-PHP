<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>PHP Quiz</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $answers = array(
                "question1" => "C",
                "question2" => "B",
                "question3" => "A"
            );

            $score = 0;
            $feedback = array();

            foreach ($answers as $question => $correctAnswer) {
                if (isset($_POST[$question])) {
                    if ($_POST[$question] == $correctAnswer) {
                        $score++;
                        $feedback[$question] = "Correct";
                    } else {
                        $feedback[$question] = "Incorrect";
                    }
                } else {
                    $feedback[$question] = "No answer provided";
                }
            }

            echo "<h1>Quiz Results</h1>";
            echo "<p>Your score: $score/" . count($answers) . "</p>";

            foreach ($feedback as $question => $response) {
                echo "<div class='feedback'>$question: $response</div>";
            }
            echo "<form action='' method='GET'>";
            echo "<input type='submit' value='Go Back to Quiz'></input>";
            echo "</form>";
        } else {
        ?>

            <form action="" method="post">
                <div>
                    <p>1. What is the largest body part of human?</p>
                    <input type="radio" name="question1" value="A"> A. Liver<br>
                    <input type="radio" name="question1" value="B"> B. Brain<br>
                    <input type="radio" name="question1" value="C"> C. Skin<br>
                    <input type="radio" name="question1" value="D"> D. Intestine<br>
                </div>
                <div>
                    <p>2. Which conrty has most painfull torture?</p>
                    <input type="radio" name="question2" value="A"> A. Amarica<br>
                    <input type="radio" name="question2" value="B"> B. China<br>
                    <input type="radio" name="question2" value="C"> C. Japan<br>
                    <input type="radio" name="question2" value="D"> D. Russia<br>
                </div>
                <div>
                    <p>3. Captin on Pakistan T20 Cricket team is?</p>
                    <input type="radio" name="question3" value="A"> A. Muhammad Hafiz<br>
                    <input type="radio" name="question3" value="B"> B. Younas Khan<br>
                    <input type="radio" name="question3" value="C"> C. Misbal Haq<br>
                    <input type="radio" name="question3" value="D"> D. Shahad Afridi<br>
                </div>
                <input type="submit" value="Submit Quiz">
            </form>

        <?php
        }
        ?>

    </div>
</body>

</html>