<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .operator {
            border-radius: 50%;
            height: 50px;
            width: 50px;
            border: 0px;
            background-color: #32AAAA;
        }

        .digit {
            border-radius: 50%;
            height: 50px;
            width: 50px;
            border: 0px;
            background-color: #F7F2EB;
        }

        .display{
            width: 200px;
            height: 50px;
            background-color: #F7F2EB;
            border: 0px;
        }

        .line{
            display: block;
            height: 1px;
            border: 0;
            border-top: 2px solid #ccc;
            margin: 10 1665 -10 0;
        }
    </style>
</head>
<body>

<form name="Calculator" class="calculator">

         <table>
             <tr>
                 <input type="text" name="Input" class="display" disabled="disabled" readonly>
                </tr>
                <div class="line"></div>
                <tr>
                    <br>
                    <input type="button" class="digit" name="seven" value="7" onClick="Calculator.Input.value += '7'">
                    <input type="button" class="digit" name="eight" value="8" onClick="Calculator.Input.value += '8'">
                    <input type="button" class="digit" name="nine" value="9" onClick="Calculator.Input.value += '9'">
                    <input type="button" class="operator" name="multiplication" value="*" onClick="Calculator.Input.value += '*'">
                    <br>
                    <input type="button" class="digit" name="four" value="4" onClick="Calculator.Input.value += '4'">
                    <input type="button" class="digit" name="five" value="5" onClick="Calculator.Input.value += '5'">
                    <input type="button" class="digit" name="six" value="6" onClick="Calculator.Input.value += '6'">
                    <input type="button" class="operator" name="subract" value="-" onClick="Calculator.Input.value += '-'">
                    <br>
                    <input type="button" class="digit" name="one" value="1" onClick="Calculator.Input.value += '1'">
                    <input type="button" class="digit" name="two" value="2" onClick="Calculator.Input.value += '2'">
                    <input type="button" class="digit" name="three" value="3" onClick="Calculator.Input.value += '3'">
                    <input type="button" class="operator" name="add" value="+" onClick="Calculator.Input.value += '+'">
                    <br>
                    <input type="button" class="operator" name="clear" value="C" onClick="Calculator.Input.value = ''">
                    <input type="button" class="digit" name="zero" value="0" onClick="Calculator.Input.value += '0'">
                    <input type="button" class="operator" name="result" value="=" onClick="Calculator.Input.value = eval(Calculator.Input.value)">
                    <input type="button" class="operator" name="divide" value="/" onClick="Calculator.Input.value += '/'">
                </tr>
            </table>
</form>

<a href="calculator2.php">Next calculator</a>

</body>
</html>