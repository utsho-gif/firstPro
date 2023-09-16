<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name='num1' placeholder='Number One'>
        <select name="operation">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="division">/</option>
        </select>
        <input type="text" name='num2' placeholder='Number Two'>
        <button type="submit">Calculate</button>

        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $num1 = filter_input(INPUT_POST, 'num1', FILTER_SANITIZE_NUMBER_FLOAT);
                $num2 = filter_input(INPUT_POST, 'num2', FILTER_SANITIZE_NUMBER_FLOAT);
                $operation = htmlspecialchars($_POST['operation']);


                // error handling
                $error = false;

                if(empty($num1) || empty($num2) || empty($operation)){
                    echo 'Please fill all the fields';
                    $error = true;
                }

                if(!is_numeric($num1) || !is_numeric($num2)){
                    echo 'Input must be a number';
                    $error = true;
                }

                if(!$error){
                    $value = 0;
                    switch($operation){
                        case 'add': 
                            $value = $num1 + $num2;
                            break;
                        case 'subtract':
                            $value = $num1 - $num2;
                            break;
                        case 'multiply':
                            $value = $num1 * $num2;
                            break;
                        case 'division':
                            $value = $num1 / $num2;
                            break;
                        default:
                            echo 'Something went wrong';
                    }
                    echo "Result = " . $value;
                }
            } 


        ?>
    </form>
</body>
</html>