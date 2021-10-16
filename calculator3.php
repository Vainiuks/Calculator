<?php

$currentValue = 0;
$input = [];
$currentOperator = 0;


// function calculateDependingOnOperators($userInput)
// {
    
//    $arr = formatUserInput($userInput);

//     // calculate user input
//     $operatorCount = 0;
//     $action = null;
//     for($i = 0; $i <= count($arr)-1; $i++)
//     {
//         if(is_numeric($arr[$i]))
//         {
            
//             if($action)
//             {
//                 echo "1+";
//                 if($action == "+" || $action == "-" || $action == "/" || $action == "*")
//                 {
//                     if($operatorCount < 3)
//                     {
//                         $operatorCount++;
//                         $action = null;
//                     }
                    
//                 }
//             }
//         }
//         else 
//         {
//             $action = $arr[$i];
//         }
//     }
//     return $operatorCount;
// }


//Change number indicator plus or minus
function plusMinus($userInput)
{
    //format user input
    $arr = formatUserInput($userInput);
    
    $current = 0;

    //Multiply by -1 to change number indicator
    $current = $arr[0] * -1;

    return $current;
}

//Get input as string format
function getInputAsString($values)
{
    $o = "";
    foreach ($values as $value)
    {
        $o .= $value;
    }
    return $o;
}

//Get calculated value after pressing ClearEntry[CE] button
function calculateEntryValue($userInput)
{
    //format user input
    $arr = formatUserInput($userInput);

    $current = 0;
    $current = $arr[0];

    return $current;
}

//Calculate input
function calculateInput($userInput)
{
    //format user input
    $arr = formatUserInput($userInput);

    // calculate user input
    $current = 0;
    $action = null;
    for($i = 0; $i <= count($arr)-1; $i++)
    {
        if(is_numeric($arr[$i]))
        {
            if($action)
            {
                if($action == "+")
                {
                    $current = $current + $arr[$i];
                }
                if($action == "-")
                {
                    $current = $current - $arr[$i];
                }
                if($action == "*")
                {
                    $current = $current * $arr[$i];
                }
                if($action == "/")
                {
                    $current = $current / $arr[$i];
                }
                $action = null;
            }
            else 
            {
                if($current == 0)
                {
                    $current = $arr[$i];
                }
            }
        }
        else 
        {
            $action = $arr[$i];
        }
    }
    return $current;
}

function formatUserInput($userInput) 
{
  //format user input
  $arr = [];
  $char = "";
  foreach ($userInput as $num)
  {
      if(is_numeric($num) || $num == ".")
      {
          $char .= $num;
      } 
      elseif(!is_numeric($num)) 
      {
          if(!empty($char))
          {
              $arr[] = $char;
              $char = "";
          }
          $arr[] = $num;
      }
  }
  if(!empty($char))
  {
      $arr[] = $char;
  }

  return $arr;
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['input']))
    {
        $input = json_decode($_POST['input']);
    }

    if(isset($_POST))
    {
        
        foreach($_POST as $key=>$value)
        {
                      
            if ($key == '=') 
            {
                $currentValue = calculateInput($input);
                $input = [$currentValue];
            }
            elseif($key == "clearentry") 
            {
                $currentValue = calculateEntryValue($input);
                $input = [$currentValue];
            }
            elseif($key=="clear")
            {
                $input = [];
                $currentValue = 0;
            }
            elseif($key == "backspace")
            {
                $arrCount = count($input)-1;
                if(is_numeric($input[$arrCount]))
                {
                    array_pop($input);
                }
            }
            elseif($key == "plusminus")
            {
                $counter = 0;

                //counter how much elemens are in input
                foreach($input as $elements)
                {
                    $counter++;
                }

                if($counter == 1)
                {
                $changedValue = plusMinus($input);
                $input = [$changedValue];
                }
            }
           
            elseif($key != 'input')
            {
                $input[] = $value;
                //$counterValue = calculateDependingOnOperators($input);
            }
        }
    }
}

?>


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
<div style="border: 1px solid #ccc; border-radius: 3px; padding: 5px; display: inline-block"> 
    <form method="POST" name="Calculator" class="calculator">

    <input type="hidden" name="input" value='<?php echo json_encode($input);?>'/>
    
    <p style="padding: 3px; margin: 0; min-height: 20px"><?php
         echo getInputAsString($input);
     ?></p>

    <input type="text" value="<?php
        echo $currentValue;
    ?>"/>

         <table>
                <tr>
                <br>
                    <input type="submit" class="operator" name="clearentry" value="CE">
                    <input type="submit" class="operator" name="clear" value="C">
                    <button type="submit" class="operator" name="backspace" value="BACK">&#8592;</button>
                    <button type="submit" class="operator" name="/" value="/">&#247;</button>
                    <br>
                    <input type="submit" class="digit" name="7" value="7" >
                    <input type="submit" class="digit" name="8" value="8">
                    <input type="submit" class="digit" name="9" value="9" >
                    <input type="submit" class="operator" name="*" value="*">
                    <br>
                    <input type="submit" class="digit" name="4" value="4" >
                    <input type="submit" class="digit" name="5" value="5" >
                    <input type="submit" class="digit" name="6" value="6">
                    <input type="submit" class="operator" name="-" value="-">
                    <br>
                    <input type="submit" class="digit" name="1" value="1" >
                    <input type="submit" class="digit" name="2" value="2" >
                    <input type="submit" class="digit" name="3" value="3" >
                    <input type="submit" class="operator" name="+" value="+">
                    <br>
                    <button type="submit" class="operator" name="plusminus" value="-">&#177;</button>
                    <input type="submit" class="digit" name="0" value="0" >
                    <input type="submit" class="operator" name="." value="." >
                    <input type="submit" class="operator" name="=" value="="/>
                </tr>
            </table>
    </form>
</div>

<br>
<a href="calculator2.php">Previous calculator</a>
</body>
</html>