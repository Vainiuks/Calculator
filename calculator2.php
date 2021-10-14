<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form name="Calculator">

    <input type="text" name="number1" placeholder="Enter number 1...">
    <br>
    <input type="text" name="number2" placeholder="Enter number 2...">
    <br>
    <br>
    <select name="arithmetic" id="action">
        <option value="Clear"></option>
        <option value="subtract">Subtract</option>
        <option value="add">Add</option>
        <option value="divide">Divide</option>
        <option value="multiplication">Multiplication</option>
    </select>

    <input type="submit" name="formSubmit">
    

</form>

<?php

    if(isset($_GET['formSubmit']))
    {
        $num1 = $_GET['number1'];
        $num2 = $_GET['number2'];
        $operator = $_GET['arithmetic'];

        switch ($operator) {
            case "Clear":
                echo "<h3 color:red>Choose arithmetic operator</h3>";
            break;
            case "subtract":
                $answer = $num1 - $num2;
                echo "Answer is: $answer <br>";
            break;
            case "add":
                $answer = $num1 + $num2;
                echo "Answer is: $answer <br>";
            break;
            case "divide":
                $answer = $num1 / $num2;
                $formattedNum = number_format($answer, 2);
                echo "Answer is: $formattedNum <br>";
            break;
            case "multiplication":
                $answer = $num1 * $num2;
                echo "Answer is: $answer <br>";
            break;
        }

        echo "<br> Arithmetical operator was: $operator <br>";
        echo "First entered number was: $num1 <br>";
        echo "Second entered number was: $num2 <br> <br> <br>";


    }

?>



<a href="index.php">Previous calculator</a>
<br>
<a href="calculator3.php">Next calculator</a>

</body>
</html>