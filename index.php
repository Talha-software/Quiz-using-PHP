<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Quiz</title>
    <link rel="stylesheet" href="styles.css">
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
                <p>1. What is the capital of France?</p>
                <input type="radio" name="question1" value="A"> A. Berlin<br>
                <input type="radio" name="question1" value="B"> B. Madrid<br>
                <input type="radio" name="question1" value="C"> C. Paris<br>
                <input type="radio" name="question1" value="D"> D. Rome<br>
            </div>
            <div>
                <p>2. What is the largest planet in our solar system?</p>
                <input type="radio" name="question2" value="A"> A. Earth<br>
                <input type="radio" name="question2" value="B"> B. Jupiter<br>
                <input type="radio" name="question2" value="C"> C. Mars<br>
                <input type="radio" name="question2" value="D"> D. Venus<br>
            </div>
            <div>
                <p>3. Who wrote "To Kill a Mockingbird"?</p>
                <input type="radio" name="question3" value="A"> A. Harper Lee<br>
                <input type="radio" name="question3" value="B"> B. J.K. Rowling<br>
                <input type="radio" name="question3" value="C"> C. Mark Twain<br>
                <input type="radio" name="question3" value="D"> D. George Orwell<br>
            </div>
            <input type="submit" value="Submit Quiz">
        </form>
        
        <?php
        }
        ?>

    </div>
</body>
</html>
