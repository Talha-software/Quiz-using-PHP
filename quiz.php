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
    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<title>Quiz Results</title>";
    echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
    echo "</head>";
    echo "<body>";

    echo "<div class='container'>";
    echo "<h1>Quiz Results</h1>";
    echo "<p>Your score: $score/" . count($answers) . "</p>";

    foreach ($feedback as $question => $response) {
        echo "<div class='feedback'>$question: $response</div>";
    }
    echo "<form action='index.html' method='GET'>";
    echo "<input type='submit' value='Go Back to Quiz'></input>";
    echo "</form>";

    echo "</div>";

    echo "</body>";
    echo "</html>";
}
?>
