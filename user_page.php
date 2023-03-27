<?php //include_once 'dbc.php'; 
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <form method="POST">
        <input type="text" name="userid">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html> -->

<?php

//$data = 2;

//Create a template
//$sql = "SELECT * FROM users WHERE id=?;";

//Create preapared statement
//$stmt = mysqli_stmt_init($connect);

//Prepare the prepared statement

//if (!mysqli_stmt_prepare($stmt, $sql)) {
//echo "Error";
//} else {
//Bind the parameters to the placeholders
//mysqli_stmt_bind_param($stmt, "s", $data);
//}
//Run parameters inside database
//mysqli_stmt_execute($stmt);
//$result = mysqli_stmt_get_result($stmt);

//while ($row = mysqli_fetch_assoc($result)) {
//echo $row['firstName'] . "<br>";
//}

?>
//////////////////////////// Can use this also /////////////////////////

<?php
include_once 'dbc.php';

if (isset($_POST['submit'])) {
    // Get the user ID from the form
    $userid = $_POST['userid'];

    // Create the SQL query with a placeholder for the user ID
    $sql = "SELECT * FROM users WHERE id = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($connect, $sql);
    if (!$stmt) {
        echo "Error: " . mysqli_error($connect);
        exit();
    }

    // Bind the user ID parameter to the statement
    mysqli_stmt_bind_param($stmt, "s", $userid);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    // Loop through the result set and display the first name of the user
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['firstName'] . "<br>";
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <form method="POST">
        <input type="text" name="userid">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>