<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>writeMessage function</title>
</head>
<body>
    <?php
        function addFunction($num1,$num2)
        {
            $sum = $num1 + $num2;
            return $sum;
        }
        $return_value = addFunction(10, 20);
        echo "the value of return from addFunction is $return_value"
    ?>
</body>
</html>