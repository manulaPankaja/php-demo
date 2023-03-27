<?php
include_once 'dbc.php'; //Including the database file 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST" action="register.php">
        <input type="text" name="firstName" placeholder="First Name"></br>
        <input type="text" name="lastName" placeholder="Last Name"></br>
        <input type="email" name="email" placeholder="Email"></br>
        <input type="password" name="password" placeholder="Password"></br>
        <button type="submit" name="submit"> Register </button>
    </form>
    <?php
    $sql1 = "SELECT * FROM users;"; //declares a variable $sql and assigns it a string containing a SQL statement that selects all columns from a table called "users"

    $result = mysqli_query($connect, $sql1); //executes the SQL statement using the mysqli_query() function, passing in a connection object $connect and the SQL query string $sql. The mysqli_query() function returns a result set object, which is stored in the variable $result.
    $checkResult = mysqli_fetch_row($result); //fetches the first row from the result set as an enumerated array using the mysqli_fetch_row() function and stores it in $checkResult. This is not necessary since it does not serve any purpose in this code.

    if ($checkResult > 0) { //checks if the number of rows in the result set is greater than zero. If there are one or more rows in the result set, the if statement evaluates to true and the code inside the curly braces is executed.
        while ($row = mysqli_fetch_assoc($result)) { //Inside the if block, a while loop is used to iterate over each row in the result set. The mysqli_fetch_assoc() function is used to retrieve each row as an associative array, with the column names as keys and the column values as values. The while loop continues until there are no more rows in the result set.
            echo $row['email'] . "<br>"; //Inside the while loop, the email value from the current row is displayed on the webpage using the echo statement.
        }
    }



    ?>
</body>

</html>