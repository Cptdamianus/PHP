<!DOCTYPE html>
<html>
<head>
    <title>Test Generator</title>
</head>
<body>
    <h1> Test</h1>
    
    <?php
  
    $questions = [
        "Jak nazwya się stolica Polski" => ["Paris", "Warszawa", "Madrid"],
        "Króra z tych planet jest planetom czerwoną?" => ["Jupiter", "Venus","Mars"],
        "Kto napisał  'Romeo and Juliet'?" => [ "Charles Dickens","William Shakespeare", "Mark Twain"],
        "Kiedy został stworzony PHP?" => ["1993", "1994" , "1995"],
        "Kto jako pierwszy zaproponował  css?" => ["Tim Berners-Lee","Håkon Wium Lie","Bjarne Stroustrup"]
    ];
    

    $randomQuestions = array_keys($questions);
    shuffle($randomQuestions);
    
   
    foreach ($randomQuestions as $index => $question) {
        echo "<p><strong>Question " . ($index + 1) . ":</strong> " . $question . "</p>";
        $options = $questions[$question];
        
        foreach ($options as $optionIndex => $option) {
            echo '<label><input type="radio" name="answer' . $index . '" value="' . $option . '"> ' . $option . '</label><br>';
        }
    }
    ?>
    
    <br>
    <button onclick="checkAnswers()">Submit Answers</button>
    
    <script>
    function checkAnswers() {
        var questions = <?php echo json_encode($randomQuestions); ?>;
        var correctAnswers = [
            "<?php echo $questions[$randomQuestions[0]][1]; ?>",
            "<?php echo $questions[$randomQuestions[1]][2]; ?>",
            "<?php echo $questions[$randomQuestions[2]][1]; ?>",
            "<?php echo $questions[$randomQuestions[3]][0]; ?>",
            "<?php echo $questions[$randomQuestions[4]][1]; ?>"
        ]
        var score = 0;
        
        for (var i = 0; i < questions.length; i++) {
            var selectedAnswer = document.querySelector('input[name="answer' + i + '"]:checked');
            if (selectedAnswer) {
                if (selectedAnswer.value === correctAnswers[i]) {
                    score++;
                }
            }
        }
        
        alert("Your score: " + score + " out of " + questions.length);
    }
    </script>
</body>
</html>