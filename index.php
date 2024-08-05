<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP Quiz</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        h1 {
            color: #333;
        }

        p {
            font-size: 18px;
            color: #555;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #ae4c4c;
        }

        .feedback {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
            background-color: #e7f3fe;
            color: #31708f;
            border: 1px solid #bce8f1;
        }
    </style>
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