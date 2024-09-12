<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>writeMessage function</title>
</head>
<body>
    <?php
        function sayHello()
        {
            echo "Hello PHP";
        }
        $function_holder = "sayHello";
        $function_holder();
    ?>
</body>
</html>